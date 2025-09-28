@extends('layouts.admin-dashboard')

@section('content')
    <h1>Create Role</h1>
    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Role Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
       
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
