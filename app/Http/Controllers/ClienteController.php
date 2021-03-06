<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;
use App\Empresa;
use App\Pessoa;
use App\Cliente;
use App\TipoDocumento;
use App\TipoTelefone;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ClienteController extends Controller
{
	protected $attr = array();
	
    public function __construct(){
        $this->middleware('auth');
		
		$this->attr = $this->carregaDadosIniciais();
    }
	
	public function lista(){
		//Retornar clientes cadastrados da empresa (Ativos e inativos)
		$clientes = DB::table('pessoa')->select('pessoa.id', 'pessoa.nome', 'pessoa.email', 'pessoa.nascimento', 'pessoa.sexo', 'pessoa.imagem', 'pessoa.created_at', 'pessoa.updated_at', 'pessoa.deleted_at')
						->join('cliente', 'cliente.id_pessoa', '=', 'pessoa.id')
						->where('cliente.id_empresa', '=', $this->attr['empresa']->id)
						->orderBy('pessoa.nome')->get();
		
		$this->attr['clientes'] = $clientes;
		
		//return redirect()->route('cliente.lista', compact('attr'));
		$attr = $this->attr;
		return view('clientes.lista', compact('attr'));
	}
	
	public function novo(){
		$attr = $this->attr;
		
		//Carregar os tipos de documentos
		$tpDocumentos = TipoDocumento::all();
		$tpTelefones = TipoTelefone::all();
		
		$attr['tipo_documento'] = $tpDocumentos;
		$attr['tipo_telefone'] = $tpTelefones;
		
		return view('clientes.novo', compact('attr'));
	}
	
	public function salvar(Request $request){
		$nome = $request->input('nome');
		$email = $request->input('email');
		$nascimento = $request->input('nascimento');
		$sexo = $request->input('sexo');
		$tipoPessoa = $request->input('tipoPessoa');
		$cpf_cnpj = $request->input('cpf_cnpj');
		$existe = false;
		$erro = false;
		
		//Validação redundante de campos
		
		
		//Validação redundante de cpf/cnpj
		
		
		if(!$erro){
			//Verificar se pessoa existe na empresa
			$pessoa = Pessoa::where('cpf_cnpj', $cpf_cnpj)->get();
			if(!$pessoa){
				$pessoa = new Pessoa;
				$pessoa->nome = $nome;
				$pessoa->email = $email;
				$pessoa->nascimento = $nascimento;
				$pessoa->sexo = $sexo;
				$pessoa->cpf_cnpj = $cpf_cnpj;
				$pessoa->tipoPessoa = $tipoPessoa;
				$pessoa->save();
			}
			
			$cliente = Cliente::where('id_pessoa', $pessoa->id)->where('id_empresa', 1)->get();
			if(!$cliente){
				$cliente = new Cliente;
				$cliente->id_pessoa = $pessoa->id;
				$cliente->id_empresa = 1;
				$cliente->save();
			}else{
				$existe = true;
			}
		}else{
			
		}
		
		return $this->lista();
	}
	
	public function editar(Request $request){
		
		return $this->lista();
	}
}