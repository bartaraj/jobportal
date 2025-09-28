@extends('layouts.admin-dashboard')

@section('content')
<div class="container">
    <h2>Edit Company Type</h2>

    <form action="{{ route('company-types.update', $companyType->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label>Name</label>
            <input type="text" name="name" value="{{ $companyType->name }}" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ $companyType->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('company-types.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
