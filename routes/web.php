<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JoblistingController;
use App\Http\Middleware\AuthenticateWithToken;
use App\Http\Controllers\EmployerSiteController;
use App\Http\Controllers\EmployerJoblistingController;

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



                 //Employer Routes
Route::get('/employer', [EmployerSiteController::class, 'index']);

Route::get('/employer/listings', [EmployerSiteController::class, 'listings']);
//Listing forms
Route::get('/employer/create/{form}', [FormController::class, 'create']);
//Store Pending Form
Route::post('/create', [FormController::class, 'store']);


              //Employer Authentication Routes
    Route::prefix('employer')->group(function(){
    Route::get('/sign-up_employer', [EmployerController::class, 'create']);
    Route::post('/create_employer', [EmployerController::class, 'store']);
    Route::get('/login_employer', [EmployerController::class, 'login']);

    Route::post('/authenticate', [EmployerController::class, 'authenticate']);
    Route::post('/logout', [EmployerController::class, 'logout']);


});
                 //AsyncRoutes
 //Employer active and inactive listings
 Route::get('/activeInactive', [EmployerJoblistingController::class,'getJobs']);

