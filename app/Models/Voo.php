<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voo extends Model
{
    use HasFactory;

    public function destino(){
        return $this->belongsTo('App\Models\Aeroporto');
    }

    public function origem(){
        return $this->belongsTo('App\Models\Aeroporto');
    }

    public function frota(){
        return $this->belongsTo('App\Models\Frota');
    }
    
    public function tarifas(){
        return $this->belongsToMany('App\Models\Tarifa');
    }

    public function lugares(){
        return $this->belongsToMany('App\Models\Lugar');
    }
   
}
