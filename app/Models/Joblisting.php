<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
           $query -> where('role','like','%'.request('search').'%');
        }
      }
}