@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Job Listings</h1>
    <a href="{{ route('job_listings.create') }}" class="btn btn-primary mb-3">Add New Job</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Company</th>
                <th>Location</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jobListings as $jobListing)
            <tr>
                <td>{{ $jobListing->title }}</td>
                <td>{{ $jobListing->company->name }}</td>
                <td>{{ $jobListing->location }}</td>
                <td>
                    <a href="{{ route('job_listings.show', $jobListing->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('job_listings.edit', $jobListing->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('job_listings.destroy', $jobListing->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection