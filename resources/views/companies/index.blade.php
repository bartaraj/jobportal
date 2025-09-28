@extends('layouts.admin-dashboard')

@section('content')
<div class="container">
    <h1>Companies</h1>
    <a href="{{ route('companies.create') }}" class="btn btn-primary mb-3">Add New Company</a>

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
                <th>Email</th>
                <th>Company Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($companies as $company)
            <tr>
                <td>{{ $company->id }}</td>
                <td>{{ $company->name }}</td>
                <td>{{ $company->email }}</td>
                <td>{{$company->companyType->name}}</td>
                <td>
                    <a href="{{ route('companies.show', $company->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display:inline;">
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