<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobListing;
use App\Models\JobType;

class PageController extends Controller
{
    //
//   public function jobListings(Request $request)
// {
//     $request->validate([
//         'keyword' => 'nullable|string|max:255',
//         'location' => 'nullable|string|max:255',
//     ]);
//         $jobTypes = JobType::all();

//     $query = JobListing::with('company', 'jobType');

//     if ($request->filled('keyword')) {
//         $query->where('title', 'like', '%' . $request->keyword . '%');
//     }

//     if ($request->filled('location')) {
//         $query->where('location', 'like', '%' . $request->location . '%');
//     }

//     $jobListings = $query->paginate(10);

//     return view('pages.job_listing', compact('jobListings','jobTypes'));
// }

public function jobListings(Request $request)
{
    $request->validate([
        'keyword' => 'nullable|string|max:255',
        'location' => 'nullable|string|max:255',
        'job_types' => 'nullable|array',
        'job_types.*' => 'integer|exists:job_types,id',
        'posted_within' => 'nullable|integer|in:1,7,30',
    ]);

    $jobTypes = JobType::all();

    $query = JobListing::with('company', 'jobType');

    // Keyword filter
    // if ($request->filled('keyword')) {
    //     $query->where('title', 'like', '%' . $request->keyword . '%');
    // }
if ($request->filled('keyword')) {
    $keyword = $request->keyword;

    $query->where(function ($q) use ($keyword) {
        $q->where('title', 'like', '%' . $keyword . '%')
          ->orWhereJsonContains('tags', $keyword);
    });
}

    // Location filter
    if ($request->filled('location')) {
        $query->where('location', 'like', '%' . $request->location . '%');
    }

    // Job type filter
    if ($request->filled('job_types')) {
        $query->whereIn('job_type_id', $request->job_types);
    }

    // Posted within filter
    if ($request->filled('posted_within')) {
        $days = (int) $request->posted_within;
        $query->where('posted_date', '>=', now()->subDays($days));
    }

    $jobListings = $query->paginate(10)->appends($request->all());

    return view('pages.job_listing', compact('jobListings','jobTypes'));
}


    public function jobDetails(JobListing $jobListing)
    {
        $jobListing->load('company', 'jobType');
        return view('pages.job_details', compact('jobListing'));
    }
//     public function search(Request $request)
// {
//     $request->validate([
//     'keyword' => 'nullable|string|max:255',
//     'location' => 'nullable|string|max:255',
// ]);

//     $query = JobListing::query();

//     if ($request->filled('keyword')) {
//         $query->where('title', 'like', '%' . $request->keyword . '%');
//     }

//     if ($request->filled('location')) {
//         $query->where('location', 'like', '%' . $request->location . '%');
//     }

// $jobListings = $query->with('company', 'jobType')->paginate(10); // 10 per page

//     return view('pages.job_listing', compact('jobListings'));
// }

}
