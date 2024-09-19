<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployementStage;
use Illuminate\Support\Facades\Auth;

class ApplicantController extends Controller
{
    public function applicants(){    
        //checks if employer is authenticated 
        $employer = Auth::guard('employer') -> user();
        $stages = EmployementStage::select('employement_stage') -> byId($employer -> id) -> get();
         if (Auth::guard('employer')->check()) {
           return view('components.applicants.applicantsview', ['stages' => $stages]);
         }  
         return redirect('/employer/login_employer');
     }
 
}
