<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\Intern;
use App\Models\Company;
use App\Models\CompanySupervisor;
use App\Models\UniversitySupervisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Mpdf\Mpdf;
use Yajra\DataTables\DataTables;

class EvaluationController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:evaluation-list|evaluation-create|evaluation-show|evaluation-edit|evaluation-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:evaluation-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:evaluation-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:evaluation-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $user = Auth::user();
        $admin = $user->hasRole('admin');
        $companySupervisor = $user->companySupervisor;
        $universitySupervisor = $user->universitySupervisor;
        if ($request->ajax()) {
            $evaluations = Evaluation::with(['intern', 'company']);
            if ($admin) {
                // Fetch all evaluations for admin
                // No additional filtering needed for admin
            } elseif ($companySupervisor) {
                // Fetch only evaluations for the company supervisor's associated company
                $evaluations->whereHas('company', function ($query) use ($companySupervisor) {
                    $query->where('id', $companySupervisor->company_id);
                });
            } elseif ($universitySupervisor) {
                // Fetch only evaluations for the university supervisor's associated university
                $evaluations->whereHas('intern', function ($query) use ($universitySupervisor) {
                    $query->where('university_id', $universitySupervisor->university_id);
                });
            }

            // Retrieve evaluations
            $evaluations = $evaluations->get();

            return DataTables::of($evaluations)
                ->addIndexColumn()
                ->editColumn('intern_id', function ($data) {
                    return $data->intern ? $data->intern->name : '-';
                })
                ->editColumn('company_id', function ($data) {
                    return $data->company ? $data->company->name : '-';
                })
                ->addColumn('action', 'backend.evaluations.action')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.evaluations.index');
    }
    public function create()
    {
        $user = Auth::user();
        $companySupervisor = $user->companySupervisor;
        $interns = Intern::with(['internship']);
        if ($companySupervisor) {
            $interns->whereHas('internship', function ($query) use ($companySupervisor) {
                $query->where('company_id', $companySupervisor->company_id);
            });
        }
        $interns = $interns->get();
        $companySupervisors = CompanySupervisor::all();
        return view('backend.evaluations.create', compact('interns', 'companySupervisors'));
    }
    public function store(Request $request)
    {
        $user = Auth::user();
        $companySupervisor = $user->companySupervisor;
        $data = $request->validate([
            'intern_id' => ['required'],
            'period' => ['required'],
            'leaves_day' => ['required'],
            'contact_supervisor' => ['nullable'],
            'punctual' => ['nullable'],
            'reliably_performed_assignments' => ['nullable'],
            'ability_solve_problem' => ['nullable'],
            'organization_skills' => ['nullable'],
            'communication_skills' => ['nullable'],
            'ability_work_independently' => ['nullable'],
            'willingness_learn_new_tasks' => ['nullable'],
            'eagerness_to_learn' => ['nullable'],
            'basic_skill' => ['nullable'],
            'professional_appearance' => ['nullable'],
            'overall_assessment_work_quality' => ['nullable'],
            'professional_viewpoint' => ['nullable'],
            'comments_student' => ['nullable'],
            'comments_intership' => ['nullable'],
            'comments' => ['nullable'],
            'discuss_intern' => ['nullable'],
            'signature' => ['nullable'],
            'company_supervisor_id' => ['required'],
            'title' => ['required'],
            'address' => ['required'],
            'contact' => ['required']
        ]);
        $data['company_id'] = $companySupervisor->company_id;
        Evaluation::create($data);
        return redirect()->route('evaluations.index')->with('success', 'Successfully Created!');
    }
    public function show($id)
    {
        $evaluation = Evaluation::findOrFail($id);
        $user = Auth::user();
        $companySupervisor = $user->companySupervisor;
        $universitySupervisor = $user->universitySupervisor;
        $interns = Intern::with(['internship']);

        if ($companySupervisor) {
            $interns->whereHas('internship', function ($query) use ($companySupervisor) {
                $query->where('company_id', $companySupervisor->company_id);
            });
        } elseif ($universitySupervisor) {
            $interns->whereHas('internship', function ($query) use ($universitySupervisor) {
                $query->where('university_id', $universitySupervisor->university_id);
            });
        }

        // $evaluations = Evaluation::all();
        $interns = $interns->get();
        $interns = Intern::all();
        $companySupervisors = CompanySupervisor::all();
        return view('backend.evaluations.show', compact('evaluation', 'interns', 'companySupervisors'));
        // return view('backend.evaluations.show')->with('evaluation', 'intern','companySupervisor');
    }
    public function edit($id)
    {
        $evaluation = Evaluation::findOrFail($id);
        $user = Auth::user();
        $companySupervisor = $user->companySupervisor;
        // $universitySupervisor = $user->universitySupervisor;
        $interns = Intern::with(['internship']);
        if ($companySupervisor) {
            $interns->whereHas('internship', function ($query) use ($companySupervisor) {
                $query->where('company_id', $companySupervisor->company_id);
            });
        }
        // $evaluations = Evaluation::get();
        $interns = $interns->get();
        $companySupervisors = CompanySupervisor::all();
        return view('backend.evaluations.edit', compact('evaluation', 'interns', 'companySupervisors'));
    }
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $companySupervisor = $user->companySupervisor;

        $evaluation = Evaluation::findOrFail($id);
        $data = $request->validate([
            'intern_id' => ['required'],
            'period' => ['required'],
            'leaves_day' => ['required'],
            'contact_supervisor' => ['nullable'],
            'punctual' => ['nullable'],
            'reliably_performed_assignments' => ['nullable'],
            'ability_solve_problem' => ['nullable'],
            'organization_skills' => ['nullable'],
            'communication_skills' => ['nullable'],
            'ability_work_independently' => ['nullable'],
            'willingness_learn_new_tasks' => ['nullable'],
            'eagerness_to_learn' => ['nullable'],
            'basic_skill' => ['nullable'],
            'professional_appearance' => ['nullable'],
            'overall_assessment_work_quality' => ['nullable'],
            'professional_viewpoint' => ['nullable'],
            'comments_student' => ['nullable'],
            'comments_intership' => ['nullable'],
            'comments' => ['nullable'],
            'discuss_intern' => ['nullable'],
            'signature' => ['nullable'],
            'company_supervisor_id' => ['required'],
            'title' => ['required'],
            'address' => ['required'],
            'contact' => ['required']

        ]);

        $data['company_id'] = $companySupervisor->company_id;
        $evaluation->update($data);
        return redirect()->route('evaluations.index')->with('success', 'Successfully Created!');
    }
    public function destroy(Request $request)
    {
        $evaluation = Evaluation::findOrFail($request->id)->delete();

        return response()->json($evaluation);
    }
    public function exportEvaluationPdf($id)
    {
        $evaluation = Evaluation::with([
            'intern.university',
            'company_supervisor'
        ])->findOrFail($id);
        $universityName = optional($evaluation->intern->university)->name;
        $internName = optional($evaluation->intern)->name;
        // $rollNo = optional($evaluation->intern)->roll_no;
        // $supervisor = $evaluation->companySupervisor->name;
        $supervisor = $evaluation->company_supervisor ? $evaluation->company_supervisor->name : '--';
        $title = $evaluation->company_supervisor ? $evaluation->company_supervisor->position : '--';
        // Load the view and pass the data
        $pdf = new Mpdf();
        $html = View::make('backend.exports.evaluation_form', compact('evaluation', 'universityName', 'internName', 'supervisor', 'title'))->render();
        $pdf->WriteHTML($html);

        // Output the PDF as a download
        return $pdf->Output("Evaluation_Form_{$internName}.pdf", 'D');
    }
}
