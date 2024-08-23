<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JoblistingController;
use App\Http\Controllers\EmployerSiteController;

//Employer index
Route::get('/', [JoblistingController::class, 'index']);

Route::get('/sign-up_seeker', [UserController::class, 'create']);

//Employer index
Route::get('/employer', [EmployerSiteController::class, 'index']);

//Listing forms
Route::get('/employer/create/{form}', [FormController::class, 'create']);

//Store Pending Form
Route::post('/create', [FormController::class, 'store']);

