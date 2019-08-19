<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

// Courses
Route::resource('courses', 'CourseController'); 

// Lectureres
Route::resource('lecturers', 'LecturerController'); 

// Contact Us
Route::resource('contactus', 'ContactusController');

// Services
Route::resource('services', 'ServicesController');

// About Us
Route::resource('aboutus', 'AboutusController');