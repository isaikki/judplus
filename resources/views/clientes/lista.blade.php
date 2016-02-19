@extends('layouts.app')

@section('titulo')
J+ 
@stop

@section('content')
		<div class="container">
			<h1 class="titPaginas">Clientes</h1><br/>
			<div class="row dvSeparar">
				<div class="col-sm-10">
					<form action="procurarcliente" method="POST">
						<div class="row">
							<div class="col-sm-11">
								<input type="text" class="form-control" id="procura" name="procura" placeholder="Procure clientes por nome, email, CPF ou CNPJ">
							</div>
							<div class="col-sm-1">
								<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
							</div>
						</div>
					</form>
				</div>
				<div class="col-sm-2">
					<form action="/cliente/novo" method="GET">
						<div class="row">
							<div class="col-sm-12">
								<button type="submit" class="btn btn-primary botoes">Novo Cliente</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr><th>Nome</th><th>Email</th><th>Nascimento</th><th>Próximo compromisso</th><th>Processos</th><th></th></tr>
				</thead>
				<tbody>
					@foreach($attr['clientes'] as $cliente)
					<tr>
						<td class='tdNormal'>{{ $cliente->nome }}</a></td>
						<td class='tdNormal'>{{ $cliente->email }}</td>
						<td class='tdNormal'>{{ explode(" ", $cliente->nascimento)[0] }}</td>
						<td class='tdNormal'></td>
						<td class='tdNormal'>0</td>
						<td>
							<button type="button" class="btn btn-default btn-xs editarcliente" id="{{ $cliente->id }}">Editar</button>
						</td>
					</tr>
					@endforeach
				<tbody>
			</table>
		</div>
@stop