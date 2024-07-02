<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Intern;
use App\Models\Internship;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class InternshipController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:internship-list|internship-create|internship-show|internship-edit|internship-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:internship-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:internship-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:internship-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        if($request->ajax()) {
            $internships = Internship::query();
            return DataTables::of($internships)->addIndexColumn()
                ->editColumn('intern_id', function ($data) {
                    return $data->intern ? $data->intern->name : '-';
                })
                ->filterColumn('intern_id', function($query, $keyword) {
                    $query->whereHas('intern', function($qry) use ($keyword) {
                        $qry->where('name', 'like','%'. $keyword .'%');
                    });
                })
                ->editColumn('company_id', function ($data) {
                    return $data->company ? $data->company->name : '-';
                })
                ->filterColumn('company_id', function($query, $keyword) {
                    $query->whereHas('company', function($qry) use ($keyword) {
                        $qry->where('name', 'like','%'. $keyword .'%');
                    });
                })
                ->addColumn('action', 'backend.internships.action')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.internships.index');
    }

    public function create()
    {
        $interns = Intern::all();
        $companies = Company::all();
        return view('backend.internships.create', compact('interns', 'companies'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'intern_id' => ['required', 'unique:internships,intern_id'],
            'company_id' => ['required'],
            'start_date' => ['nullable'],
            'end_date' => ['nullable'],
            'description' => ['nullable']
        ]);
        Internship::create($data);
        return redirect()->route('internships.index')->with('success', 'Successfully Created!');

    }

    public function edit($id)
    {
        $internship = Internship::findOrFail($id);
        $interns = Intern::all();
        $companies = Company::all();

        return view('backend.internships.edit', compact('internship', 'interns', 'companies'));
    }

    public function update(Request $request, $id)
    {

        $internship = Internship::findOrFail($id);
        $data = $request->validate([
            'intern_id' => ['required', 'unique:internships,intern_id,' . $internship->id],
            'company_id' => ['required'],
            'start_date' => ['nullable'],
            'end_date' => ['nullable'],
            'description' => ['nullable']
        ]);

        $internship->update($data);
        return redirect()->route('internships.index')->with('success', 'Successfully Updated!');
    }

    public function destroy(Request $request)
    {
        $internship = Internship::findOrFail($request->id)->delete();

        return response()->json($internship);
    }
}
