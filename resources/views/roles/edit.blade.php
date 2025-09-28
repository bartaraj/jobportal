@extends('layouts.admin-dashboard')

@section('content')
<div class="container">
    <h1 class="mb-4 fw-bold text-primary">Manage Permissions for Role: {{ $role->name }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger shadow-sm rounded">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="accordion" id="permissionAccordion">
            @foreach($permissions->groupBy(function ($permission) {
                return explode(' ', $permission->name)[1] ?? $permission->name;
            }) as $module => $perms)
                <div class="card mb-3 shadow-sm border rounded">
                    <!-- Make entire header clickable -->
                    <div class="card-header d-flex justify-content-between align-items-center bg-light cursor-pointer" 
                         id="heading-{{ $module }}" 
                         data-bs-toggle="collapse" 
                         data-bs-target="#collapse-{{ $module }}" 
                         aria-expanded="true" 
                         aria-controls="collapse-{{ $module }}">
                        <h5 class="mb-0 text-capitalize text-dark">
                            <i class="bi bi-folder me-2 text-secondary"></i> {{ ucfirst($module) }}
                        </h5>
                        <span class="badge bg-secondary">{{ $perms->count() }} permissions</span>
                    </div>

                    <div id="collapse-{{ $module }}" class="collapse" 
                         aria-labelledby="heading-{{ $module }}" 
                         data-bs-parent="#permissionAccordion">
                        <div class="card-body bg-white rounded">
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" 
                                       id="select_all_{{ $module }}" 
                                       onclick="toggleModule('{{ $module }}')">
                                <label class="form-check-label fw-bold text-primary" for="select_all_{{ $module }}">
                                    Select All
                                </label>
                            </div>
                            <div class="row">
                                @foreach($perms as $permission)
                                    <div class="col-md-4 mb-2">
                                        <div class="form-check">
                                            <input 
                                                type="checkbox" 
                                                name="permissions[]" 
                                                value="{{ $permission->name }}" 
                                                id="permission_{{ $permission->id }}" 
                                                class="form-check-input perm-{{ $module }}"
                                                {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}
                                            >
                                            <label for="permission_{{ $permission->id }}" class="form-check-label">
                                                {{ ucfirst($permission->name) }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary mt-4 px-4 shadow-sm">Update Permissions</button>
    </form>
</div>

<script>
    function toggleModule(module) {
        let selectAll = document.getElementById(`select_all_${module}`);
        let checkboxes = document.querySelectorAll(`.perm-${module}`);
        checkboxes.forEach(cb => cb.checked = selectAll.checked);
    }
</script>

<style>
    /* Change cursor on header hover */
    .cursor-pointer {
        cursor: pointer;
    }
</style>
@endsection
