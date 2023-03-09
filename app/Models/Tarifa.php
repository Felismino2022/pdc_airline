<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarifa extends Model
{
    public function regalia(){
        return $this->belongsTo('App\Models\Regalia');
    }

    public function voos(){
        return $this->belongsToMany('App\Models\Voo');
    }
    use HasFactory;
}
