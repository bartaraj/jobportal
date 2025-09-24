@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Company Types</h2>
    <a href="{{ route('company-types.create') }}" class="btn btn-primary mb-3">Add New</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($companyTypes as $type)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $type->name }}</td>
                <td>{{ $type->description }}</td>
                <td>
                    <a href="{{ route('company-types.edit', $type->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('company-types.destroy', $type->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
