<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company; 
use App\Models\JobListing;
use App\Models\JobType; 

class JobListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobListings = JobListing::with('company', 'jobType')->get();
        return view('job_listings.index', compact('jobListings'));
    }

    /**
     * Show the form for creating a new resource.
     */
   public function create()
    {
        $companies = Company::all();
        $jobTypes = JobType::all(); // Fetch all job types
        return view('job_listings.create', compact('companies', 'jobTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
  public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
            'description' => 'required|string',
            'location' => 'nullable|string|max:255',
            'salary_range' => 'nullable|string|max:255',
            'job_type_id' => 'required|exists:job_types,id',
            'posted_date' => 'required|date',
            'application_deadline' => 'nullable|date',
            'application_link' => 'nullable|url',
            'tags' => 'nullable|string', // will split into array later
        ]);

        $jobListing = new JobListing($validated);

        // Convert comma separated tags into array
        if ($request->filled('tags')) {
            $jobListing->tags = array_map('trim', explode(',', $request->tags));
        }

        $jobListing->application_link = $request->application_link;
        $jobListing->save();

        return redirect()->route('job_listings.index')->with('success', 'Job listing created successfully.');
    }

    /**
     * Display the specified resource.
     */
   public function show(JobListing $jobListing)
    {
        $jobListing->load('company', 'jobType');
        return view('job_listings.show', compact('jobListing'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobListing $jobListing)
    {
        $companies = Company::all();
        $jobTypes = JobType::all(); // Fetch all job types
        return view('job_listings.edit', compact('jobListing', 'companies', 'jobTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
     public function update(Request $request, JobListing $jobListing)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
            'description' => 'required|string',
            'location' => 'nullable|string|max:255',
            'salary_range' => 'nullable|string|max:255',
            'job_type_id' => 'required|exists:job_types,id',
            'posted_date' => 'required|date',
            'application_deadline' => 'nullable|date',
            'application_link' => 'nullable|url',
            'tags' => 'nullable|string',
        ]);

        $jobListing->fill($validated);

        if ($request->filled('tags')) {
            $jobListing->tags = array_map('trim', explode(',', $request->tags));
        } else {
            $jobListing->tags = null;
        }

        $jobListing->application_link = $request->application_link;
        $jobListing->save();

        return redirect()->route('job_listings.index')->with('success', 'Job listing updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobListing $jobListing)
    {
        $jobListing->delete();

        return redirect()->route('job_listings.index')
            ->with('success', 'Job listing deleted successfully.');
    }
}
