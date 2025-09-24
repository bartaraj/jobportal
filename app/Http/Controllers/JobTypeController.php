<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobType; 

class JobTypeController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobTypes = JobType::all();
        return view('job_types.index', compact('jobTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('job_types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:job_types,name',
        ]);

        JobType::create($request->all());

        return redirect()->route('job_types.index')
                         ->with('success', 'Job type created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(JobType $jobType)
    {
        return view('job_types.show', compact('jobType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobType $jobType)
    {
        return view('job_types.edit', compact('jobType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobType $jobType)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:job_types,name,' . $jobType->id,
        ]);

        $jobType->update($request->all());

        return redirect()->route('job_types.index')
                         ->with('success', 'Job type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobType $jobType)
    {
        $jobType->delete();

        return redirect()->route('job_types.index')
                         ->with('success', 'Job type deleted successfully.');
    }
}
