<?php

namespace App\Http\Controllers;

use App\Models\Joblisting;
use Illuminate\Http\Request;

class JoblistingController extends Controller
{
  
    public function index(Request $request){
      return view('homepage',[
      'joblistings' =>self::getSearchJobs($request),
      'joblistingFullDesc' => self::getFullJobDesc(),
      ]);
  }
 
  public static function getFullJobDesc(){
    if(!empty(request('id'))){
      return Joblisting::select('*')->filter(request(['id']))->get();
    }  
    else{
      return [];
    }
  } 

  public static function getSearchJobs($request){
     if(!empty(request('search') || !empty(request('tag'))))
      return Joblisting::select('hashId','role','companyname','jobaddress')->filter(request(['search','tag']))->paginate(4)->appends($request->query());
  }
}