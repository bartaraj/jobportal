<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/homepage', function () {
    return view('homepage');
});

Route::get('/job_listing', function () {
    return view('job_listing');
})->name('job_listing');

Route::get('/job_details', function () {
    return view('job_details');
})->name('job_details');