@extends('layouts.admin-dashboard')

@section('content')
<div class="container">
    <h1>Edit Job Listing</h1>
    <form action="{{ route('job_listings.update', $jobListing->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $jobListing->title) }}">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="company_id" class="form-label">Company</label>
            <select class="form-control @error('company_id') is-invalid @enderror" id="company_id" name="company_id">
                <option value="">Select a Company</option>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}" {{ old('company_id', $jobListing->company_id) == $company->id ? 'selected' : '' }}>
                        {{ $company->name }}
                    </option>
                @endforeach
            </select>
            @error('company_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', $jobListing->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $jobListing->location) }}">
        </div>

        <div class="mb-3">
            <label for="salary_range" class="form-label">Salary Range</label>
            <input type="text" class="form-control" id="salary_range" name="salary_range" value="{{ old('salary_range', $jobListing->salary_range) }}">
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
            <input type="date" class="form-control @error('posted_date') is-invalid @enderror" id="posted_date" name="posted_date" value="{{ old('posted_date', $jobListing->posted_date) }}">
            @error('posted_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="application_deadline" class="form-label">Application Deadline</label>
            <input type="date" class="form-control" id="application_deadline" name="application_deadline" value="{{ old('application_deadline', $jobListing->application_deadline) }}">
        </div>

        <!-- New Field: Application Link -->
        <div class="mb-3">
            <label for="application_link" class="form-label">Application Link</label>
            <input type="url" class="form-control @error('application_link') is-invalid @enderror" id="application_link" name="application_link" value="{{ old('application_link', $jobListing->application_link) }}">
            @error('application_link')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- New Field: Tags -->
        <div class="mb-3">
            <label for="tags" class="form-label">Tags (comma separated)</label>
            <input type="text" class="form-control @error('tags') is-invalid @enderror" id="tags" name="tags" value="{{ old('tags', is_array($jobListing->tags) ? implode(',', $jobListing->tags) : $jobListing->tags) }}">
            @error('tags')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
