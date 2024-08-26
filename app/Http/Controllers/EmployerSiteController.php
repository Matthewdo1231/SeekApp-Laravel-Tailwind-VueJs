<?php

namespace App\Http\Controllers;

use App\Models\PendingForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployerSiteController extends Controller
{

    public function index(){
       //checks if employer is authenticated 
        if (Auth::guard('employer')->check()) {
            return view('employerhome');
        }  
          return redirect('/employer/login_employer');
    }

}