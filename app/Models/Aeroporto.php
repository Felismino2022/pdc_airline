<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aeroporto extends Model
{
    use HasFactory;

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function getNome()
    {
        return $this->attributes['nome'];
    }

    public function voos(){
        return $this->hasMany('App\Models\Voo');
    }
    
}
