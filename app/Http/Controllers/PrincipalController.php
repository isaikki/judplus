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
	protected $attr = array();
	
	public function __construct(){
        $this->middleware('auth');
		
		$this->attr = $this->carregaDadosIniciais();
    }
	
	public function home(){
		//$cliente = Cliente::where('id_empresa', $this->attr['empresa']->id)->first();
		$clientes = Cliente::where('id_empresa', $this->attr['empresa']->id)->count();
		//$processos = 
		//$compromissos = 
		//$recados = 
		
		$this->attr['clientes'] = $clientes;
		//$this->attr['cliente'] = $cliente;
		
		$attr = $this->attr;
		
		return view('home', compact('attr'));
	}
}
