<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JoblistingController;
use App\Http\Controllers\EmployerSiteController;

//Seeker index
Route::get('/', [JoblistingController::class, 'index']);

//Seeker registration view 
Route::get('/sign-up_seeker', [UserController::class, 'create']);

//Create new Seeker
Route::post('/user', [UserController::class, 'store']);

//Employer index
Route::get('/employer', [EmployerSiteController::class, 'index']);

//Listing forms
Route::get('/employer/create/{form}', [FormController::class, 'create']);

//Store Pending Form
Route::post('/create', [FormController::class, 'store']);

