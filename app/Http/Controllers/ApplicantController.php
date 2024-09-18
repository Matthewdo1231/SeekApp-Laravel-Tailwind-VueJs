<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EmployerSiteController;

class ApplicantController extends Controller
{
    public function applicants(){    
        //checks if employer is authenticated 
         if (Auth::guard('employer')->check()) {
           return view('components.applicants.applicantsview');
         }  
         return redirect('/employer/login_employer');
     }
 
}
