@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Job Type</h1>
    <form action="{{ route('job_types.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Job Type Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection