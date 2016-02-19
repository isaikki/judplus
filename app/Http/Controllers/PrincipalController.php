<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Empresa;
use App\Cliente;
use App\Pessoa;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PrincipalController extends Controller
{
	private $attr = array();
	
	public function __construct(){
        $this->middleware('auth');
    }
	
	public function carregaDadosIniciais(){
		$usuario = Auth::user();
		$empresa = Empresa::find($usuario->id_empresa);
		$pessoa = Pessoa::find($usuario->id);
		
		$this->attr['empresa']=$empresa;
		$this->attr['pessoa']=$pessoa;
		
		return $this->attr;
	}
	
	public function home(){
		$attr = $this->carregaDadosIniciais();
		
		$cliente = Cliente::where('id_empresa', $attr['empresa']->id)->first();
		$clientes = Cliente::where('id_empresa', $attr['empresa']->id)->count();
		//$processos = 
		//$compromissos = 
		//$recados = 
		
		$attr['clientes'] = $clientes;
		$attr['cliente'] = $cliente;
		
		return view('home', compact('attr'));
	}
}
