<?php

namespace App\Http\Controllers;

use App\Models\Joblisting;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;



class EmployerJoblistingController extends Controller

{
     public function getJobs(Request $request){   
       if(Auth::guard('employer')->check()){
         //pages offset
         $offset = $request -> header('offset');
         if($request->header('jobstatus') == 'active'){
            $status = 'active';
            $employer = Auth::guard('employer')-> user();
            return Joblisting::select('companyname','role','created_at')->ByEmployerId($employer->id,$status)->skip($offset)->take(8)->get();
         }
         else if($request->header('jobstatus') == 'inactive'){
            $status = 'inactive';
            $employer = Auth::guard('employer')-> user();
            return Joblisting::select('companyname','role','created_at')->ByEmployerId($employer->id,$status)->skip($offset)->take(8)->get();
         }
        }
   }
}
