@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $company->name }}</h1>
    <p><strong>Email:</strong> {{ $company->email }}</p>
    <p><strong>Website:</strong> <a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a></p>
    <p><strong>Description:</strong> {{ $company->description }}</p>

    <a href="{{ route('companies.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection