<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    protected $table = 'Nivel';
    protected $fillable = ['nome'];

    //relacionamentos

    public function usuarios()
    {
        return $this->hasMany('App/Usuario');
    }
}
