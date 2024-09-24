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
}
