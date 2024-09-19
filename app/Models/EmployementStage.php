<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployementStage extends Model
{
    use HasFactory;

    protected $table = 'employementstage';
 
    public function scopeById($query, $id){
        if(!empty($id)){
           $query -> where('employer_id','=',$id);
        }
    }

}
