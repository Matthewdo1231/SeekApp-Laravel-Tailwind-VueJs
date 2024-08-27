<?php

namespace App\Http\Controllers;

use App\Models\Joblisting;
use App\Models\PendingForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{
    public function create($form){
        if($form == 'form1'){
            return view($form,[
                'jobinfos' => self::getForm1Info(),
            ]);
        }
        if($form == 'form2'){
            return view($form,[
                'jobinfos' => self::getForm2Info(),
            ]);
        }
        
    }

    public function getForm1Info(){ 
        if((Auth::guard('employer')->id())){
         return PendingForm::select('jobtitle','companyname','requirements','jobaddress','jobtype','niche')->filter(Auth::guard('employer')->id())->get();
        }
        else{
            return collect([(object)[
                'hashId' => null,
                'jobtitle' => '',
                'companyname' => '',
                'jobaddress' => '',
                'jobtype' => '',
                'niche' => ''
            ]]);
        }
    }


    public function getForm2Info(){
            if(Auth::guard('employer')->id()){
            return PendingForm::select('about','aboutRole','requirements','benefits')->filter(Auth::guard('employer')->id())->get();
            }
          else{
            return collect([(object)[
                'about' => '',
                'aboutRole' => '',
                'requirements' => '',
                'benefits' => '',
            ]]);
         }
    }
    
    public function store(Request $request){
        //If form submission is coming from form1
       if($request -> header('formNumber') == 'form1'){

        //If userId do not matches in any column in database create new one else overwrite the existing one
            if(count(self::getForm1Info()) == 0){

            $validatedData = $request -> validate([
                'jobtitle' => 'required',
                'companyname' => 'required',
                'jobaddress' => 'required',
                'jobtype' => 'required',
                'niche' => 'required',
            ]);
            $validatedData['id'] = Auth::guard('employer')->id();     

            PendingForm::create($validatedData);
            }

            else{
                PendingForm::where('id', Auth::guard('employer')->id())
                ->update([
                'jobtitle' => $request-> jobtitle,
                'companyname' => $request -> companyname,
                'jobaddress' => $request -> jobaddress,
                'jobtype' => $request -> jobtype,
                'niche' => $request -> niche,
                ]);
         }

     }

           //If form submission is coming from form2
     if($request -> header('formNumber') == 'form2'){

            //updates after submission
            PendingForm::where('id', Auth::guard('employer')->id())
                ->update([
                'about' => $request-> about,
                'aboutRole' => $request -> aboutRole,
                'requirements' => $request -> benefits, 
                'benefits' => $request -> benefits,
                ]);


        //If request -> header 'button; is equals to  'publish button' then send to joblisting db
            $data = PendingForm::select('jobtitle','companyname','requirements','jobaddress','jobtype','niche','about','aboutRole','requirements','benefits')->
                    filter(Auth::guard('employer')->id())->get();
            
            $joblistingData = [
                'employer_id'=> Auth::guard('employer')->id(),
                'jobtitle' => $data[0]-> jobtitle,
                'companyname' => $data[0] -> companyname,
                'jobaddress' => $data[0]-> jobaddress,
                'jobtype' => $data[0] -> jobtype,
                'niche' => $data[0] -> niche,
                'about' => $data[0]-> about,
                'aboutRole' => $data[0] -> aboutRole,
                'requirements' => $data[0] -> benefits,
                'benefits' => $data[0] -> benefits,
            ];

            Joblisting::create($joblistingData);
            PendingForm::where('id', Auth::guard('employer')->id()) -> delete(); 
     }
  }
    

}
