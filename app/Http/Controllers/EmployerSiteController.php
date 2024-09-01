<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Joblisting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;


class EmployerSiteController extends Controller
{

    public function index(){    
       //checks if employer is authenticated 
        if (Auth::guard('employer')->check()) {
          return redirect('employer/listings');
        }  
        return self::routeToLoginEmployer();
    }


    public function listings(Request $request){
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


 

    