<?php

namespace App\Http\Controllers;

use App\Models\Joblisting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FullJobDescription;
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

   public function getListingFullDescription(Request $request){
      $jobId = $request -> header('id');
      if(Auth::guard('employer') -> check()){
       $employer = Auth::guard('employer') -> user();
       $allListingsId = Joblisting::select('id') -> EmployerIdListings($employer->id) -> pluck('id');
       if($allListingsId -> contains($jobId)){
         $data = FullJobDescription::find($jobId);
         if (!$data) {
            return 'Job description not found';
         }

        return '
        <header>
            <h1 data-job-editable class="text-4xl mb-4 font-bold text-gray-700">' . htmlspecialchars($data->role) . '</h1>
            <h2 data-job-editable class="text-2xl mb-4 text-gray-700">' . htmlspecialchars($data->companyname) . '</h2>
            <h3 data-job-editable class="text-base mb-4 text-gray-700"><i class="fa-solid fa-location-dot"></i>&#160;' . htmlspecialchars($data->jobaddress) . '</h3>
            <h4 data-job-editable class="text-sm mb-4 text-gray-700"><i class="fa-solid fa-building"></i> &#160;Programming/Technology</h4>
            <h4 data-job-editable class="text-sm mb-4 text-gray-700"><i class="fa-regular fa-clock"></i>&#160;' . htmlspecialchars($data->jobtype) . '</h4>
        </header>

        <section class="w-[500px]">
            <ul class="text-2xl mb-6 text-gray-700">About
                <li data-job-editable class="text-base ml-4 mb-4 text-gray-700">' . nl2br(htmlspecialchars($data->about)) . '</li>
            </ul>

            <ul class="text-2xl mb-6 text-gray-700">About the role
                <li data-job-editable class="text-base ml-4 mb-4 text-gray-700">' . nl2br(htmlspecialchars($data->aboutRole)) . '</li>
            </ul>

            <ul class="text-2xl mb-6 text-gray-700">Requirements
                <li data-job-editable class="text-base ml-4 mb-4 text-gray-700">' . nl2br(htmlspecialchars($data->requirements)) . '</li>
            </ul>

            <ul class="text-2xl mb-6 text-gray-700">Benefits
                <li data-job-editable class="text-base ml-4 mb-4 text-gray-700">' . nl2br(htmlspecialchars($data->benefits)) . '</li>
            </ul>
        </section>
        <button id="edit-button" class="bg-blue-400 text-white rounded-lg p-4">Edit Description
        <i class="fa-regular fa-pen-to-square"></i></button>
        
        <div id="editing-buttons" class="hidden gap-4">
            <button id="discard-button" class="bg-gray-400 hover:bg-gray-300 text-white rounded-lg p-4">Discard Changes
            <i class="fa-solid fa-xmark"></i></button>
            <button id="save-button" class="bg-blue-400 hover:bg-blue-300 text-white rounded-lg p-4">Save Changes
            <i class="fa-regular fa-pen-to-square"></i></button>
        </div>
        ';
        
         }
       }  
      }
      
}
