<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
})->name('homepage');


Route::get('/job_listing', function () {
    return view('job_listing');
})->name('job_listing');

Route::get('/job_details', function () {
    return view('job_details');
})->name('job_details');

Route::get('/about_us', function () {
    return view('about');
})->name('about_us');

Route::get('/contact', function () {
    return view('contact');
})->name('contact_us');