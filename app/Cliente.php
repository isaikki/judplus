<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
	public $timestamps = false;
    protected $table = 'cliente';
	protected $fillable = ['id_pessoa', 'id_empresa'];
}
