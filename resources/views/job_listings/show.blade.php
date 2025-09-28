@extends('layouts.admin-dashboard')

@section('content')
<div class="container">
    <h1>{{ $jobListing->title }}</h1>
    <p><strong>Company:</strong> {{ $jobListing->company->name }}</p>
    <p><strong>Location:</strong> {{ $jobListing->location }}</p>
    <p><strong>Salary Range:</strong> {{ $jobListing->salary_range }}</p>
    <p><strong>Employment Type:</strong> {{ $jobListing->employment_type }}</p>
    <p><strong>Posted Date:</strong> {{ $jobListing->posted_date }}</p>
    <p><strong>Application Deadline:</strong> {{ $jobListing->application_deadline }}</p>
    <hr>
    <h3>Description</h3>
    <p>{{ $jobListing->description }}</p>

    <a href="{{ route('job_listings.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection