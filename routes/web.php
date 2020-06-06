<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@index')->name('home');

//dashboard
Route::get('/admin', function () {
    return view('admin.dashboard');
});


// Datatable experiment
 Route::resource('users','UserController');
 Route::get('users/{id}/edit/','UserController@edit');

// Technical QC 
 Route::resource('tqcs','TqcController');
 Route::get('tqcs/{id}/edit/','TqcController@edit');

// Content Acquistion
Route::resource('acquistions','AcquistionController');
Route::get('acquistions/{id}/edit/','AcquistionController@edit');