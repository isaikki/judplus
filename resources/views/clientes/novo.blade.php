@extends('layouts.app')

@section('titulo')
J+ 
@stop

@section('content')
		<div class="container contCadastro">
            <!--h1>Novo Cliente</h1><br/-->
			<form role="form" data-toggle="validator" action="/cliente/novo" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="row rowInput">
					<div class="col-sm-4">
						<label for="tipoPessoa">Tipo</label>
						<select class="form-control" name="tipoPessoa" id="tipoPessoa">
							<option value='0'>Pessoa física</option>
							<option value='1'>Pessoa jurídica</option>
						</select>
					</div>
					<div class="col-sm-8">
						<label for="nome">Nome</label>
						<input type="text" class="form-control" id="nome" name="nome" required />
					</div>
				</div>
				<div class="row rowInput">
					<div class="col-sm-6">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email"/>
					</div>
					<div class="col-sm-4">
						<label for="nascimento">Nascimento</label>
						<input type="date" class="form-control" id="nascimento" name="nascimento"/>
					</div>
					<div class="col-sm-2">
						<label>Sexo</label><br/>
						<select class="form-control" name="sexo" id="sexo">
							<option value="">: Selecione :</option>
							<option value="m">Masculino</option>
							<option value="f">Feminino</option>
						</select>
					</div>
				</div>
				<div class="row rowInput rowInputFinal">
					<div class="col-sm-4">
						<label for="cpf_cnpj">CPF / CNPJ</label>
						<input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj" required />
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-body">
						<label>Outros documentos</label>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-body">
						<label>Endereço</label>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-body">
						<label>Telefone</label>
					</div>
				</div>
				<div class="row rowInputFinal">
					<div class="col-sm-2">
						<button type="submit" class="btn btn-success">Salvar</button>
					</div>
				</div>
			</form>
		</div>
@stop