<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use App\Models\Intern;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;
use Yajra\Datatables\Datatables;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:project-list|intern-create|project-show|project-edit|project-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:project-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:project-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:project-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        if($request->ajax()) {
            $projects = Project::query();// $projects = Project::with('leaders', 'members');
            return DataTables::of($projects)->addIndexColumn()
            ->editColumn('description', function ($each) {
                return Str::limit($each->description, 150);
            })
            ->addColumn('leader', function ($each) {
                $output = '<div style="width:160px;">';
               foreach ($each->leaders as $leader) {
                    $output .= '<img src="' . $leader->profile_img_path() . '" alt="" class="profile-thumbnail2">';
                }

                return $output . '</div>';
            })
            ->addColumn('member', function ($each) {
                $output = '<div style="width:160px;">';
                foreach ($each->members as $member) {
                    $output .= '<img src="' . $member->profile_img_path() . '" alt="" class="profile-thumbnail2">';
                }

                return $output . '</div>';
            })
            ->editColumn('priority', function ($each) {
                if ($each->priority == 'high') {
                    return '<span class="badge badge-pill badge-danger">High</span>';
                } else if ($each->priority == 'middle') {
                    return '<span class="badge badge-pill badge-info">Middle</span>';
                } else if ($each->priority == 'low') {
                    return '<span class="badge badge-pill badge-dark">Low</span>';
                }
            })
            ->editColumn('status', function ($each) {
                if ($each->status == 'pending') {
                    return '<span class="badge badge-pill badge-warning">Pending</span>';
                } else if ($each->status == 'in_progress') {
                    return '<span class="badge badge-pill badge-info">In Progress</span>';
                } else if ($each->status == 'low') {
                    return '<span class="badge badge-pill badge-success">Complete</span>';
                }
            })
                ->addColumn('action', 'backend.projects.action')
                ->rawColumns(['leaders', 'members', 'priority', 'status', 'action'])
                ->make(true);
        }
        return view('backend.projects.index');
    }

    public function create()
    {
        
        $interns =Intern::all();
        return view('backend.projects.create', compact('interns'));
    }

    public function store(Request $request)
    {
       //if (!auth()->user()->can('create_project')) {
        //    abort(403, 'Unauthorized Action');
        //}

        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'leader' => 'required',
            'member' => 'required',
            'members' => 'nullable|array',
            'images' => 'nullable|array',
            'images.*' => 'image|max:2048',
            'files' => 'nullable|array',
            'files.*' => 'file|max:10240',
            'start_date' => 'nullable|date',
            'deadline_date' => 'nullable|date',
            'priority' => 'required|in:high,middle,low',
            'status' => 'required|in:pending,in_progress,complete',
            'members' => 'nullable|array',
        ]);

        $image_names = null;
        if ($request->hasFile('images')) {
            $image_names = [];
            $images_file = $request->file('images');
            foreach ($images_file as $image_file) {
                $image_name = uniqid() . '_' . time() . '.' . $image_file->getClientOriginalExtension();
                Storage::disk('public')->put('projects/' . $image_name, file_get_contents($image_file));
                $image_names[] = $image_name;
            }
        }

        $file_names = null;
        if ($request->hasFile('files')) {
            $file_names = [];
            $files = $request->file('files');
            foreach ($files as $file) {
                $file_name = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
                Storage::disk('public')->put('projects/' . $file_name, file_get_contents($file));
                $file_names[] = $file_name;
            }
        }

        $project = new Project();
        $project->title = $request->input('title');
        $project->description = $request->input('description');
        $project->image = $request->input('images'); 
        $project->files = $request->input('files');
        $project->start_date = $request->input('start_date');
        $project->deadline_date = $request->input('deadline_date');
        $project->priority = $request->input('priority');
        $project->status =$request->input('status');
        $project->save();

        $project->leaders()->sync($request->leaders);
        $project->members()->sync($request->members);
        $project->members()->sync($request->input('members', []));

        return redirect()->route('projects.index')->with('create', 'Project is successfully created.');
    }

    public function edit($id)
    {
        
        $project = Project::findOrFail($id);
        $interns = Intern::all();
        return view('backend.projects.edit', compact('project', 'interns'));
    }

    public function update($id, Request $request)
    {
        $project = Project::findOrFail($id);
        $image_names = $project->images;
        if ($request->hasFile('images')) {
            $image_names = [];
            $images_file = $request->file('images');
            foreach ($images_file as $image_file) {
                $image_name = uniqid() . '_' . time() . '.' . $image_file->getClientOriginalExtension();
                Storage::disk('public')->put('project/' . $image_name, file_get_contents($image_file));
                $image_names[] = $image_name;
            }
        }

        $file_names = $project->files;
        if ($request->hasFile('files')) {
            $file_names = [];
            $files = $request->file('files');
            foreach ($files as $file) {
                $file_name = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
                Storage::disk('public')->put('project/' . $file_name, file_get_contents($file));
                $file_names[] = $file_name;
            }
        }

        $project->title = $request->title;
        $project->description = $request->description;
        $project->image = $image_names;
        $project->files = $file_names;
        $project->start_date = $request->start_date;
        $project->deadline_date = $request->deadline_date;
        $project->priority = $request->priority;
        $project->status = $request->status;
        $project->update();

        $project->leaders()->sync($request->leaders);
        $project->members()->sync($request->members);

        return redirect()->route('backend.projects.index')->with('update', 'Project is successfully updated.');
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);
        return view('backend.projects.show', compact('project'));
    }

    public function destroy($id)
    {
       
        $project = Project::findOrFail($id);

        $project->leaders()->detach();
        $project->members()->detach();

        $project->delete();

        return 'success';
    }
}
