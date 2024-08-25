<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JoblistingController;
use App\Http\Controllers\EmployerSiteController;

//Seeker index
Route::get('/', [JoblistingController::class, 'index']);

//Seeker registration view 
Route::get('/sign-up_seeker', [UserController::class, 'create']) ->middleware('guest');

//Create new Seeker
Route::post('/user', [UserController::class, 'store']);

//Seeker login view 
Route::get('/login_seeker', [UserController::class, 'login'])->middleware('guest');

//Login User
Route::post('/user/authenticate', [UserController::class, 'authenticate']);

//Logout seeker
Route::post('/user/logout', [UserController::class, 'logout']);

//Employer index
Route::get('/employer', [EmployerSiteController::class, 'index']);

//Listing forms
Route::get('/employer/create/{form}', [FormController::class, 'create']);

//Store Pending Form
Route::post('/create', [FormController::class, 'store']);

