<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FullJobDescription extends Model
{
    protected $table = 'joblisting';

    public function scopeFilter($query, $id){
        if(!empty($id)){
           $query -> where('id','=',$id);
        }
    }
}
