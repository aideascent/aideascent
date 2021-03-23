<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Job;
use App\Models\Admin\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $job = Job::orderByRaw('LENGTH(job_order)', 'asc')->get();
        return view('admin.job.index', compact('job'));
    }

    public function create()
    {
        return view('admin.job.create');
    }

    public function store(Request $request)
    {
        $job = new Job();
        $data = $request->only($job->getFillable());

        $request->validate([
            'job_title' => 'required',
            'job_description_short' => 'required',
            'job_responsibility' => 'required',
            'job_deadline' => 'required',
            'job_vacancy' => 'required',
            'job_location' => 'required',
            'job_salary' => 'required'
        ]);

        if(empty($data['job_slug'])) {
            $data['job_slug'] = Str::slug($request->job_title);
        }

        $job->fill($data)->save();
        return redirect()->route('admin.job.index')->with('success', 'Job is added successfully!');
    }

    public function edit($id)
    {
        $job = Job::findOrFail($id);
        return view('admin.job.edit', compact('job'));
    }

    public function update(Request $request, $id)
    {
        $job = Job::findOrFail($id);
        $data = $request->only($job->getFillable());

        $request->validate([
            'job_title' => 'required',
            'job_description_short' => 'required',
            'job_responsibility' => 'required',
            'job_deadline' => 'required',
            'job_vacancy' => 'required',
            'job_location' => 'required',
            'job_salary' => 'required'
        ]);

        $job->fill($data)->save();
        return redirect()->route('admin.job.index')->with('success', 'Job is updated successfully!');
    }

    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();

        // Deleting data from "job_applications" table
        $all_data = DB::table('job_applications')->where('job_id', $id)->get();
        foreach($all_data as $row)
        {
            unlink(public_path('uploads/'.$row->applicant_cv));
        }
        DB::table('job_applications')->where('job_id',$id)->delete();

        return Redirect()->back()->with('success', 'Job is deleted successfully!');
    }

    public function view_application()
    {
        $job_application = JobApplication::orderBy('id', 'asc')->get();
        return view('admin.job.view_application', compact('job_application'));
    }

    public function delete_application($id)
    {
        $job_application = JobApplication::findOrFail($id);
        unlink(public_path('uploads/'.$job_application->applicant_cv));
        $job_application->delete();
        return Redirect()->back()->with('success', 'Job Application is deleted successfully!');
    }
}
