<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendingForm extends Model
{
    use HasFactory;

    protected $table = 'pendingform';

    public function scopeFilter($query, $filters){
        if(!empty($filters)){
           $query -> where('hashId','=',$filters);
        }
    }
}
