<?php

use App\Http\Controllers\Api\FullJobDescriptionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/fulljobdesc',[FullJobDescriptionController::class,'getJobDescription']);
