@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Job Type: {{ $jobType->name }}</h1>
    <a href="{{ route('job_types.index') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>
@endsection