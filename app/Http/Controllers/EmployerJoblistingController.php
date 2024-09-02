<?php

namespace App\Http\Controllers;

use App\Models\Joblisting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;



class EmployerJoblistingController extends Controller

{
     public function getJobs(Request $request){   
       if(Auth::guard('employer')->check()){
           
         if($request->header('jobstatus') == 'active'){
            $status = 'active';
            $employer = Auth::guard('employer')-> user();
            return Joblisting::select('companyname','role','created_at')->ByEmployerId($employer->id,$status)->paginate(8);
         }
         else if($request->header('jobstatus') == 'inactive'){
            $status = 'inactive';
            $employer = Auth::guard('employer')-> user();
            return Joblisting::select('companyname','role','created_at')->ByEmployerId($employer->id,$status)->paginate(8);
         }
        }
   }
}
