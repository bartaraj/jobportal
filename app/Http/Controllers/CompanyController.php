<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\CompanyType;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
       $companies = Company::with('companyType')->get();
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
             $companyTypes = CompanyType::all(); // Pass all company types
        return view('companies.create', compact('companyTypes'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'website' => 'nullable|url|max:255',
            'email' => 'required|email|unique:companies,email',
            'description' => 'nullable|string',
            'company_type_id' => 'nullable|exists:company_types,id',

        ]);

        Company::create($validatedData);

        return redirect()->route('companies.index')
            ->with('success', 'Company created successfully.');
    }

     public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        $companyTypes = CompanyType::all(); // Pass all company types
        return view('companies.edit', compact('company', 'companyTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'website' => 'nullable|url|max:255',
            'email' => 'required|email|unique:companies,email,' . $company->id,
            'description' => 'nullable|string',
            'company_type_id' => 'nullable|exists:company_types,id',

        ]);

        $company->update($validatedData);

        return redirect()->route('companies.index')
            ->with('success', 'Company updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('companies.index')
            ->with('success', 'Company deleted successfully.');
    }
}
