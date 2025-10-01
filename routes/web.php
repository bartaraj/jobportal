<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobListingController;
use App\Http\Controllers\JobTypeController;
use App\Http\Controllers\PageController; // Import the controller
use App\Http\Controllers\CompanyTypeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;

Route::get('/dashboard', function () {
    return view('users.home');
})->middleware(['auth'])->name('dashboard');

// Route::get('/', function () {
//     return view('homepage');
// })->name('homepage');
Route::get('/', [PageController::class, 'homepage'])->name('homepage');


Route::get('/job_listing', [PageController::class, 'jobListings'])->name('job_listing');
Route::get('/job_listings/{jobListing}', [PageController::class, 'jobDetails'])->name('job_details.show');


Route::get('/job_details', function () {
    return view('job_details');
})->name('job_details');

Route::get('/about_us', function () {
    return view('about');
})->name('about_us');

Route::get('/contact', function () {
    return view('contact');
})->name('contact_us');



Route::middleware(['auth','role:Admin'])->group(function () {

Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');

// Route to show the form for creating a new company
Route::get('/companies/create', [CompanyController::class, 'create'])->name('companies.create');

// Route to store a new company in the database
Route::post('/companies', [CompanyController::class, 'store'])->name('companies.store');

// Route to display a single company
Route::get('/companies/{company}', [CompanyController::class, 'show'])->name('companies.show');

// Route to show the form for editing a company
Route::get('/companies/{company}/edit', [CompanyController::class, 'edit'])->name('companies.edit');

// Route to update a company
Route::put('/companies/{company}', [CompanyController::class, 'update'])->name('companies.update');

// Route to delete a company
Route::delete('/companies/{company}', [CompanyController::class, 'destroy'])->name('companies.destroy');




// Route to display all job listings
Route::get('/job-listings', [JobListingController::class, 'index'])->name('job_listings.index');
// Route to show the form for creating a new job listing
Route::get('/job-listings/create', [JobListingController::class, 'create'])->name('job_listings.create');

// Route to store a new job listing in the database
Route::post('/job-listings', [JobListingController::class, 'store'])->name('job_listings.store');

// Route to display a single job listing
Route::get('/job-listings/{jobListing}', [JobListingController::class, 'show'])->name('job_listings.show');

// Route to show the form for editing a job listing
Route::get('/job-listings/{jobListing}/edit', [JobListingController::class, 'edit'])->name('job_listings.edit');

// Route to update a job listing
Route::put('/job-listings/{jobListing}', [JobListingController::class, 'update'])->name('job_listings.update');

// Route to delete a job listing
Route::delete('/job-listings/{jobListing}', [JobListingController::class, 'destroy'])->name('job_listings.destroy');





// Route to display all job types
Route::get('/job-types', [JobTypeController::class, 'index'])->name('job_types.index');

// Route to show the form for creating a new job type
Route::get('/job-types/create', [JobTypeController::class, 'create'])->name('job_types.create');

// Route to store a new job type in the database
Route::post('/job-types', [JobTypeController::class, 'store'])->name('job_types.store');

// Route to display a single job type
Route::get('/job-types/{jobType}', [JobTypeController::class, 'show'])->name('job_types.show');

// Route to show the form for editing a job type
Route::get('/job-types/{jobType}/edit', [JobTypeController::class, 'edit'])->name('job_types.edit');

// Route to update a job type
Route::put('/job-types/{jobType}', [JobTypeController::class, 'update'])->name('job_types.update');

// Route to delete a job type
Route::delete('/job-types/{jobType}', [JobTypeController::class, 'destroy'])->name('job_types.destroy');





// List all company types
Route::get('/company-types', [CompanyTypeController::class, 'index'])->name('company-types.index');

// Show form to create a new company type
Route::get('/company-types/create', [CompanyTypeController::class, 'create'])->name('company-types.create');

// Store new company type
Route::post('/company-types', [CompanyTypeController::class, 'store'])->name('company-types.store');

// Show form to edit a company type
Route::get('/company-types/{companyType}/edit', [CompanyTypeController::class, 'edit'])->name('company-types.edit');

// Update existing company type
Route::put('/company-types/{companyType}', [CompanyTypeController::class, 'update'])->name('company-types.update');

// Delete a company type
Route::delete('/company-types/{companyType}', [CompanyTypeController::class, 'destroy'])->name('company-types.destroy');
// Route::get('/jobs/search', [PageController::class, 'search'])->name('jobs.search');

Route::resource('roles', RoleController::class);
Route::resource('permissions', PermissionController::class);
});

require __DIR__.'/auth.php';