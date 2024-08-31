<?php

namespace App\Http\Controllers;

use App\Models\Joblisting;
use Illuminate\Support\Facades\Auth;

class EmployerSiteController extends Controller
{

    public function index(){    
       //checks if employer is authenticated 
        if (Auth::guard('employer')->check()) {

          return redirect('employer/listings');
        }  
        return self::routeToLoginEmployer();
    }


    public function listings(){
        if (Auth::guard('employer')->check()) {
                $employer = Auth::guard('employer')->user();
                $joblistings = Joblisting::select('companyname','role','created_at')->ByEmployerId($employer->id)->get();
             return view('employerhome',['joblistings' => $joblistings]);
        } 
        return self::routeToLoginEmployer();
    }

    public function routeToLoginEmployer(){
      return redirect('/employer/login_employer');
    }   
   
}


 

    