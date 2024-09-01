<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class EmployerJoblistingController extends Controller

{
     public function getActiveJobs(Request $request){   
      return '$recievedCookie = $request->header('token')';
   }
}
