<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class EmployerSiteController extends Controller
{

    public function index(){    
       //checks if employer is authenticated 
        if (Auth::guard('employer')->check()) {
            $joblisting = Auth::guard('employer')->user()->joblistings()->get();
            echo($joblisting);
            return view('employerhome');
        }  
          return redirect('/employer/login_employer');
    }

}