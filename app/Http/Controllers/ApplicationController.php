<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Application;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ApplicationController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()) {
            $applications = Application::with('company');
            return DataTables::of($applications)->addIndexColumn()
                ->editColumn('company_id', function ($data) {
                    return $data->company ? $data->company->name : '-';
                })
                // ->filterColumn('intern_id', function($query, $keyword) {
                //     $query->whereHas('intern', function($qry) use ($keyword) {
                //         $qry->where('name', 'like','%'. $keyword .'%');
                //     });
                // })
                // ->editColumn('company_id', function ($data) {
                //     return $data->company ? $data->company->name : '-';
                // })
                // ->filterColumn('company_id', function($query, $keyword) {
                //     $query->whereHas('company', function($qry) use ($keyword) {
                //         $qry->where('name', 'like','%'. $keyword .'%');
                //     });
                // })
                ->addColumn('action', 'backend.application.action')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.application.index');
    }

    public function create()
    {
        // $interns = Intern::all();
        $companies = Company::all();
        return view('backend.application.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'title' => 'required',
            'position' => 'required',
            'department' => 'required',
            'company_id' => 'required',
            'gender' => 'required',
            'intern_male' => 'required',
            'intern_female' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
            'salary' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'type' => 'required',
            'description' => 'required',
            'requirement' => 'required',
            'benefit' => 'nullable',
            'highlight' => 'nullable',
            'opportunity' => 'nullable',
            'image' => 'required|mimes:png',
            // 'pdf_01' => 'required|mimes:pdf',
            // 'pdf_02' => 'required|mimes:pdf',
            // 'pdf_03' => 'required|mimes:pdf',
            // 'pdf_04' => 'required|mimes:pdf',
            // 'pdf_05' => 'required|mimes:pdf',
            // 'pdf_06' => 'required|mimes:pdf',
            // 'pdf_07' => 'required|mimes:pdf',
            // 'pdf_08' => 'required|mimes:pdf',
            // 'pdf_09' => 'required|mimes:pdf',
            // 'pdf_10' => 'required|mimes:pdf',
            // 'pdf_11' => 'required|mimes:pdf',
            // 'pdf_12' => 'required|mimes:pdf',
            // 'pdf_13' => 'required|mimes:pdf',
            // 'image_url' => 'required|mimes:png',
        ],
        [
        'user_id.required' => 'The user field is required.',
        'title.required' => 'The title field is required.',
        'position.required' => 'The position field is required.',
        'department.required' => 'The department field is required.',
        'company_id.required' => 'The company field is required.',
        'gender.required' => 'The gender field is required.',
        'intern_male.required' => 'The male field is required.',
        'intern_female.required' => 'The female field is required.',
        'from_date.required' => 'The start date field is required.',
        'to_date.required' => 'The end date field is required.',
        'salary.required' => 'The salary field is required.',
        'email.required' => 'The email field is required.',
        'phone.required' => 'The phone field is required.',
        'type.required' => 'The type field is required.',
        'description.required' => 'The description field is required.',
        'requirement.required' => 'The requirement field is required.',
        'image.required' => 'The image file is required.',
            // 'company_id.required' => 'လုပ်ငန်းရှင်အမည်ထည့်ရန်လိုအပ်ပါသည်။',
        //     'thai_agency_id.required' => 'ထိုင်းအေဂျင်စီအမည်ထည့်ရန်လိုအပ်ပါသည်။',
        //     'mm_agency_id.required' => 'မြန်မာအေဂျင်စီအမည်ထည့်ရန်လိုအပ်ပါသည်။',
        //     'job_call_no.required' => 'အလုပ်ခေါ်စာအမည်ထည့်ရန်လိုအပ်ပါသည်။',
        //     'business_id.required' => 'အလုပ်ငန်းအမျိုးအစားထည့်ရန်လိုအပ်ပါသည်။',
        //     'factory_address.required' => 'စက်ရုံတည်နေရာထည့်ရန်လိုအပ်ပါသည်။',
        //     'male_female.required' => 'ခေါ်ယူလိုသည့်အလုပ်သမားအရေအတွက်(ကျား/မ ပေါင်း) ထည့်ရန်လိုအပ်ပါသည်။',
        //     'pdf_01.required' => 'ကုမ္ပဏီအပေါ်စာ pdf ဖိုင်ထည့်ရန်လိုပါသည်။',
        //     'pdf_02.required' => 'မြန်မာအေဂျင်စီ၏ ဝန်ခံကတိပြုချက် pdf ဖိုင်ထည့်ရန်လိုပါသည်။',
        //     'pdf_03.required' => 'မြန်မာ၊ ထိုင်းအေဂျင်စီနှင့် အလုပ်ရှင်မှဝန်ခံချက် pdf ဖိုင်ထည့်ရန်လိုပါသည်။',
        //     'pdf_04.required' => 'အလုပ်ခေါ်စာ pdf ဖိုင်ထည့်ရန်လိုပါသည်။',
        //     'pdf_05.required' => 'လုပ်ငန်းအမျိုးအစား၊ နေရာ၊ အရေအတွက် pdf ဖိုင်ထည့်ရန်လိုပါသည်။',
        //     'pdf_06.required' => 'ကိုယ်စားလှယ်လွှဲစာ pdf ဖိုင်ထည့်ရန်လိုပါသည်။',
        //     'pdf_07.required' => 'ကိုယ်စားလှယ်မှတ်ပုံတင်စာရွက် pdf ဖိုင်ထည့်ရန်လိုပါသည်။',
        //     'pdf_08.required' => 'Application Form pdf ဖိုင်ထည့်ရန်လိုပါသည်။',
        //     'pdf_09.required' => 'လာရောက်ခေါ်ဆောင်ရွက်မည့်သူ၏ ကိုယ်စားလှယ် pdf ဖိုင်ထည့်ရန်လိုပါသည်။',
        //     'pdf_10.required' => 'အလုပ်ရှင်အလုပ်သမား သဘောတူစာချုပ် pdf ဖိုင်ထည့်ရန်လိုပါသည်။',
        //     'pdf_11.required' => 'ထိုင်း‌အေဂျင်စီလိုင်စင်မိတ္တူ pdf ဖိုင်ထည့်ရန်လိုပါသည်။',
        //     'pdf_12.required' => ' မြန်မာအေဂျင်စီလိုင်စင်မိတ္တူ pdf ဖိုင်ထည့်ရန်လိုပါသည်။',
        //     'pdf_13.required' => ' Profile DBD ဘာသာပြန်မူရင်း pdf ဖိုင်ထည့်ရန်လိုပါသည်။',
        //     'image_url.required' => 'Imageဖိုင်ထည့်ရန်လိုပါသည်။',
        ]);



        $save = new Application();
        $save->user_id = $request->user_id;
        $save->title = $request->title;
        $save->position = $request->position;
        $save->department = $request->department;
        $save->company_id = $request->company_id;
        $save->gender = $request->gender;
        $save->male = $request->intern_male;
        $save->female = $request->intern_female;
        $save->from_date = $request->from_date;
        $save->to_date = $request->to_date;
        $save->education = $request->education;
        $save->salary = $request->salary;
        $save->email = $request->email;
        $save->phone = $request->phone;
        $save->type = $request->type;
        $save->description = $request->description;
        $save->requirement = $request->requirement;
        $save->benefit = $request->benefit;
        $save->highlight = $request->highlight;
        $save->opportunity = $request->opportunity;

        if (!empty($request->file('image'))) {
            $ext = $request->file('image')->getClientOriginalName();
            $file = $request->file('image');
            $randomStr = Str::random(20);
            $path = strtolower($randomStr) . '.' . $ext;
            $file->storeAs('public/', $path);
            $file->move(public_path('storage/applications/'), $path);
            $save->image = $path;
        }

        $save->save();
        return redirect()->route('application.index')->with('success', 'Successfully Created!');

    }
    public function edit($id)
    {
        $application = Application::findOrFail($id);
        // dd($application);
        $companies = Company::all();

        return view('backend.application.edit', compact('application', 'companies'));
    }
    public function update(Request $request, $id)
    {
        $save = Application::findOrFail($id);
        $save->user_id = $request->user_id;
        $save->title = $request->title;
        $save->position = $request->position;
        $save->department = $request->department;
        $save->company_id = $request->company_id;
        $save->gender = $request->gender;
        $save->male = $request->intern_male;
        $save->female = $request->intern_female;
        $save->from_date = $request->from_date;
        $save->to_date = $request->to_date;
        $save->education = $request->education;
        $save->salary = $request->salary;
        $save->email = $request->email;
        $save->phone = $request->phone;
        $save->type = $request->type;
        $save->description = $request->description;
        $save->requirement = $request->requirement;
        $save->benefit = $request->benefit;
        $save->highlight = $request->highlight;
        $save->opportunity = $request->opportunity;

        if ($request->hasFile('image')) {
            // Delete the old file if exists
            if (!empty($save->image)) {
                Storage::delete('public/' . $save->image);
                unlink(public_path('storage/applications/' . $save->image));
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(20);
            $path = strtolower($randomStr) . '.' . $ext;
            $file->storeAs('public/', $path);
            $file->move(public_path('storage/applications/'), $path);
            $save->image = $path;
        }

        $save->save();
        return redirect()->route('application.index')->with('success', 'Successfully Updated!');
    }

    public function destroy(Request $request)
    {
        $application = Application::findOrFail($request->id)->delete();

        return response()->json($application);
    }

}
