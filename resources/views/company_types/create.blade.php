@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Company Type</h2>

    <form action="{{ route('company-types.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('company-types.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
