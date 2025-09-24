@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Job Listing</h1>
    <form action="{{ route('job_listings.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="company_id" class="form-label">Company</label>
            <select class="form-control @error('company_id') is-invalid @enderror" id="company_id" name="company_id">
                <option value="">Select a Company</option>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                @endforeach
            </select>
            @error('company_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ old('location') }}">
        </div>
        <div class="mb-3">
            <label for="salary_range" class="form-label">Salary Range</label>
            <input type="text" class="form-control" id="salary_range" name="salary_range" value="{{ old('salary_range') }}">
        </div>
        <div class="mb-3">
    <label for="job_type_id" class="form-label">Employment Type</label>
    <select class="form-control @error('job_type_id') is-invalid @enderror" id="job_type_id" name="job_type_id">
        <option value="">Select a Job Type</option>
        @foreach($jobTypes as $jobType)
            <option value="{{ $jobType->id }}" {{ old('job_type_id', $jobListing->job_type_id ?? '') == $jobType->id ? 'selected' : '' }}>
                {{ $jobType->name }}
            </option>
        @endforeach
    </select>
    @error('job_type_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
        <div class="mb-3">
            <label for="posted_date" class="form-label">Posted Date</label>
            <input type="date" class="form-control @error('posted_date') is-invalid @enderror" id="posted_date" name="posted_date" value="{{ old('posted_date') }}">
            @error('posted_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="application_deadline" class="form-label">Application Deadline</label>
            <input type="date" class="form-control" id="application_deadline" name="application_deadline" value="{{ old('application_deadline') }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection