@extends('layouts.admin-dashboard')

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

        {{-- ✅ New Application Link field --}}
        <div class="mb-3">
            <label for="application_link" class="form-label">Application Link</label>
            <input type="url" class="form-control @error('application_link') is-invalid @enderror" id="application_link" name="application_link" value="{{ old('application_link') }}">
            @error('application_link')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- ✅ New Tags field --}}
        <div class="mb-3">
            <label for="tags" class="form-label">Tags (comma separated)</label>
            <input type="text" class="form-control @error('tags') is-invalid @enderror" id="tags" name="tags" value="{{ old('tags') }}">
            <small class="form-text text-muted">Example: Laravel, PHP, Remote</small>
            @error('tags')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
<script>
    // 3. Initialize CKEditor on the textarea with ID 'description'
    ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( 'There was an error initializing the CKEditor:', error );
        } );
</script>
@endsection
