<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyType;

class CompanyTypeController extends Controller
{
      public function index()
    {
        $companyTypes = CompanyType::all();
        return view('company_types.index', compact('companyTypes'));
    }

    public function create()
    {
        return view('company_types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        CompanyType::create($request->all());

        return redirect()->route('company-types.index')
                         ->with('success', 'Company Type created successfully.');
    }

    public function edit(CompanyType $companyType)
    {
        return view('company_types.edit', compact('companyType'));
    }

    public function update(Request $request, CompanyType $companyType)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $companyType->update($request->all());

        return redirect()->route('company-types.index')
                         ->with('success', 'Company Type updated successfully.');
    }

    public function destroy(CompanyType $companyType)
    {
        $companyType->delete();

        return redirect()->route('company-types.index')
                         ->with('success', 'Company Type deleted successfully.');
    }
}
