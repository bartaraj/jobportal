@extends('layouts.admin-dashboard')

@section('content')
<div class="container">
    <h1>Edit Company</h1>
    <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
          <!-- Current logo -->
        @if($company->logo)
        <div class="mb-3">
            <label class="form-label">Current Logo</label>
            <div>
                <img src="{{ asset($company->logo) }}" alt="{{ $company->name }}" width="120">
            </div>
        </div>
        @endif

        <!-- Upload new logo -->
        <div class="mb-3">
            <label for="logo" class="form-label">Replace Logo</label>
            <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo">
            @error('logo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="company_type" class="form-label">Company Type</label>
            <select name="company_type_id" id="company_type" 
                    class="form-control @error('company_type_id') is-invalid @enderror">
                <option value="">Select Type</option>
                @foreach($companyTypes as $type)
                    <option value="{{ $type->id }}" 
                        {{ old('company_type_id', $company->company_type_id) == $type->id ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
            @error('company_type_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Company Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $company->name) }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $company->email) }}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="website" class="form-label">Website</label>
            <input type="url" class="form-control @error('website') is-invalid @enderror" id="website" name="website" value="{{ old('website', $company->website) }}">
            @error('website')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', $company->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection