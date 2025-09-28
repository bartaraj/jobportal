@extends('layouts.admin-dashboard')

@section('content')
<div class="container">
    <h1>Job Types</h1>
    <a href="{{ route('job_types.create') }}" class="btn btn-primary mb-3">Add New Job Type</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jobTypes as $jobType)
            <tr>
                <td>{{ $jobType->id }}</td>
                <td>{{ $jobType->name }}</td>
                <td>
                    <a href="{{ route('job_types.show', $jobType->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('job_types.edit', $jobType->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('job_types.destroy', $jobType->id) }}" method="POST" style="display:inline;">
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