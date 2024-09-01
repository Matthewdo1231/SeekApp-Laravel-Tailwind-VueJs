<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EmployerJoblistingController;
use App\Http\Controllers\Api\FullJobDescriptionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//fetch full description in seeker side
Route::get('/fulljobdesc',[FullJobDescriptionController::class,'getJobDescriptionHtml']);




