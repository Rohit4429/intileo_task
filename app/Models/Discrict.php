<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discrict extends Model
{
    use HasFactory;

    public function state(){
        return $this->hasOne(Satate::class,'id','state_id');
    }
}
