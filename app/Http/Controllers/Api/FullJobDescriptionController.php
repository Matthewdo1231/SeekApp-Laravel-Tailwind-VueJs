<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FullJobDescription;

class FullJobDescriptionController extends Controller
{
    public function getJobDescription(){
        return FullJobDescription::select('*')->filter('dolorem7')->get();
    }
}
