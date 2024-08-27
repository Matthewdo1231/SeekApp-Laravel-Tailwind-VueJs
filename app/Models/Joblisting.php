<?php

namespace App\Models;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Joblisting extends Model
{
   use HasFactory;

   protected $table = 'joblisting';

   public function scopeFilter($query, array $filters){
        if(!empty($filters['id'])){
           $query -> where('hashId','=',request('id'));
        }
        if(!empty($filters['tag'])){
           $query ->where('companyname','like','%'.request('tag').'%')
                  ->orWhere('jobtype','like','%'.request('tag').'%');
        }
        if(!empty($filters['search'])){
           $query -> where('role','like','%'.request('search').'%')
                  -> orWhere('jobtitle','like','%'.request('search').'%');
        }
      }

   //relation with user  
   public function employer(){
      return $this->belongsTo(Employer::class,'employer_id');
   }   
}