<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    protected $table = 'usuario';
    use SoftDeletes;
    protected $fillable = [
        'email', 'nome', 'data_nascimento', 'nivel_id'];

        //relacionamentos
        public function nivel()
        {
            return $this->belongsTo('App\Nivel');
        }
}
