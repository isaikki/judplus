<?php

namespace App\Http\Controllers;

use Auth;
use App\Empresa;
use App\Pessoa;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	public function carregaDadosIniciais(){
		$usuario = Auth::user();
		$empresa = Empresa::find($usuario->id_empresa);
		$pessoa = Pessoa::find($usuario->id);
		
		$this->attr['empresa']=$empresa;
		$this->attr['pessoa']=$pessoa;
		
		return $this->attr;
	}
}
