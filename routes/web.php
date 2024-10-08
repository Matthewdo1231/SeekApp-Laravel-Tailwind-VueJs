<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\JoblistingController;
use App\Http\Controllers\EmployerSiteController;
use App\Http\Controllers\EmployementStageController;
use App\Http\Controllers\EmployerJoblistingController;
use App\Http\Controllers\UserProfileController;

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


//User Routes 
Route::prefix('user')->group(function(){
    Route::get('/profile', [UserProfileController::class, 'profile']);
});



                 //Employer Routes
Route::get('/employer', [EmployerSiteController::class, 'index']);

Route::get('/employer/listings', [EmployerSiteController::class, 'listings']);

Route::get('/employer/applicants', [ApplicantController::class, 'applicants']);

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
                 //Asynchronous API for EmployerSide

 //Employer active and inactive listings
 Route::get('/activeInactive', [EmployerJoblistingController::class,'getJobs']);
//Dynamically perform different actions on each listings
 Route::post('/performAction',[EmployerJoblistingController::class,'performAction']);
//Fetch job listing description
Route::get('/getListingFullDescription',[EmployerJoblistingController::class,'getListingFullDescription']);
//Save joblisting changes
Route::post('/saveDescriptionChanges',[EmployerJoblistingController::class,'saveDescriptionChanges']);
//confirm new stage
Route::post('/confirmNewStage',[EmployementStageController::class,'addNewStage']);

Route::post('/removeSelectedStage',[EmployementStageController::class,'removeStage']);



