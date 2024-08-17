<?php

namespace App\Http\Controllers;

use App\Models\PendingForm;
use Illuminate\Http\Request;

class EmployerSiteController extends Controller
{
    public function index(){
        return view('employerhome');
    }


}