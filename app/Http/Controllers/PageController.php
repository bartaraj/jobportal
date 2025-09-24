<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobListing;

class PageController extends Controller
{
    //
    public function jobListings()
    {
        // Fetch all job listings with their company and job type
        $jobListings = JobListing::with('company', 'jobType')->get();
        return view('pages.job_listing', compact('jobListings'));
    }

    public function jobDetails(JobListing $jobListing)
    {
        $jobListing->load('company', 'jobType');
        return view('pages.job_details', compact('jobListing'));
    }
}
