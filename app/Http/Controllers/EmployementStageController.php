<?php

namespace App\Http\Controllers;

use App\Models\EmployementStage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployementStageController extends Controller
{
    public function addNewStage(Request $request){
        $employer = Auth::guard('employer') -> user();
        $newStage = "," . $request -> header('newStage');
        if(Auth::guard('employer')->check()){
            $matchedEmployer = EmployementStage::where('employer_id',$employer->id)->first();
            $matchedEmployer->employement_stage .= $newStage;
            $matchedEmployer  ->save();
        }
    }

    public function removeStage(Request $request){
        $employer = Auth::guard('employer') -> user();
        $removeStage = "," . $request -> header('selectedStage');
        if(Auth::guard('employer')->check()){
            $matchedEmployer = EmployementStage::where('employer_id',$employer->id)->first();
            $matchedEmployer->employement_stage = str_replace($removeStage, '', $matchedEmployer->employement_stage);
            $matchedEmployer->save();
        }
    }
}
