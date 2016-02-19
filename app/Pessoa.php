<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $table = "pessoa";
	protected $fillable = ['nome', 'email', 'nascimento', 'sexo', 'imagem'];
}
