<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;



class EmployerJoblistingController extends Controller

{
     public function getJobs(Request $request){   
       if(Auth::guard('employer')->check()){
           
         if($request->header('jobstatus') == 'active'){
            return 'active';
         }
         else if($request->header('jobstatus') == 'inactive'){
            return 'inactive';
         }
        }
   }
}
