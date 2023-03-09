<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membro extends Model
{
    protected $table = 'membros';
    protected $dates = ['birthday'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function preferencia(){
        return $this->belongsTo('App\Models\Preferencia');
    }
    public function regalia(){
        return $this->belongsTo('App\Models\Regalia');
    }
}
