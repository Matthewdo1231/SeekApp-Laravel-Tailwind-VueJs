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
         //pages offset
         $offset = $request -> header('offset');
         if($request->header('jobstatus') == 'active'){
            $status = 'active';
            $employer = Auth::guard('employer')-> user();
            return Joblisting::select('id','companyname','role','created_at')->ByEmployerId($employer->id,$status)->skip($offset)->take(8)->get();
         }
         else if($request->header('jobstatus') == 'inactive'){
            $status = 'inactive';
            $employer = Auth::guard('employer')-> user();
            return Joblisting::select('id','companyname','role','created_at')->ByEmployerId($employer->id,$status)->skip($offset)->take(8)->get();
         }
        }
   }

   public function performAction(Request $request){
      $jobId = $request -> header('id');
      $action = $request -> header('action');
      if(Auth::guard('employer') -> check()){
         $employer = Auth::guard('employer')-> user();
         $employerAllListingId = Joblisting::select('id') -> EmployerIdListings($employer->id) -> pluck('id');
            if($employerAllListingId -> contains($jobId) && $action == 'drafts'){
               Joblisting::where('id', $jobId)
               ->update([
                   'status' => $action,
               ]);
            }
            else if($employerAllListingId -> contains($jobId) && ($action == 'active' || $action == 'inactive')){
               Joblisting::where('id', $jobId)
               ->update([
                   'status' => $action,
               ]);
            }
            else if($employerAllListingId -> contains($jobId) && $action == 'deleted'){
               Joblisting::where('id', $jobId)
               ->update([
                   'status' => $action,
               ]);
            };

         };
       

   }
}
