<?php

namespace App\Http\Controllers;

use App\Models\Joblisting;
use Illuminate\Http\Request;

class JoblistingController extends Controller
{
  
    public function index(Request $request){
      return view('homepage',[
      'joblistings' =>$this->getSearchJobs($request),
      'joblistingFullDesc' => $this->getFullJobDesc(),
      ]);
  }
 
  public function getFullJobDesc(){
    if(!empty(request('id'))){
      return Joblisting::select('*')->filter(request(['id']))->get();
    }  
    else{
      return [];
    }
  } 

  public function getSearchJobs($request){
     if(!empty(request('search') || !empty(request('tag'))))
      return Joblisting::select('id','role','companyname','jobaddress')->filter(request(['search','tag']))->paginate(6)->appends($request->query());
  }
}