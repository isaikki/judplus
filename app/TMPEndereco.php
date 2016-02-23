<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TMPEndereco extends Model
{
    public $timestamps = false;
    protected $table = 'tmp_endereco';
	protected $fillable = ['id_usuario', 'endereco', 'numero', 'complemento', 'cep', 'bairro', 'id_cidade', 'horario'];
}
