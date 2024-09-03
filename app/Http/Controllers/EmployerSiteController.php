<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Employer;
use App\Models\Joblisting;
use Illuminate\Http\Request;  
use Illuminate\Support\Carbon;
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

 
    public function listings(Request $request){
      if (Auth::guard('employer')->check()) {
        $employer = Auth::guard('employer')->user();
        $joblisting = Joblisting::select('companyname', 'role', 'created_at')
            ->ByEmployerId($employer->id, null)
            ->skip(0)->take(8)->get();
        return view('employerhome', ['joblistings' => $joblisting]);
      }
    }

    public function routeToLoginEmployer(){
      return redirect('/employer/login_employer');
    } 


 
}



 

    