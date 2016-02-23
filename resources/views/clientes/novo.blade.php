@extends('layouts.app')

@section('titulo')
J+ 
@stop

@section('content')
		<div class="container">
            <h1>Novo Cliente</h1><br/>
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
						<!--input type="date" class="form-control" id="nascimento" name="nascimento"/-->
						<input type="text" id="nascimento" name="nascimento" class="form-control dataForm">
					</div>
					<div class="col-sm-2">
						<label for="sexo">Sexo</label><br/>
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
						<h3>Outros documentos</h3>
						<div class="row">
							<div class="col-sm-4">
								<label for="outroDocumento">Documento</label>
								<input type="text" name="outroDocumento" id="outroDocumento" class="form-control"/>
							</div>
							<div class="col-sm-4">
								<label for="tipoDocumento">Tipo de documento</label>
								<select class="form-control" id="tipoDocumento" name="tipoDocumento">
									<option value="">:: Selecione ::</option>
									@foreach($attr['tipo_documento'] as $tpDocumento)
									<option value="{{ $tpDocumento->id }}">{{ $tpDocumento->nome }}</option>
									@endforeach
								</select>
							</div>
							<div class="col-sm-1">
								<button type="button" class="btn btn-primary">+</button>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-body">
						<h3>Telefone</h3>
						<div class="row">
							<div class="col-sm-2">
								<label for="ddd">DDD</label>
								<input type="text" name="ddd" id="ddd" class="form-control"/>
							</div>
							<div class="col-sm-4">
								<label for="telefone">Telefone</label>
								<input type="text" name="telefone" id="telefone" class="form-control"/>
							</div>
							<div class="col-sm-4">
								<label for="tipoTelefone">Tipo de telefone</label>
								<select class="form-control" id="tipoTelefone" name="tipoTelefone">
									<option value="">:: Selecione ::</option>
									@foreach($attr['tipo_telefone'] as $tpTelefone)
									<option value="{{ $tpTelefone->id }}">{{ $tpTelefone->tipo }}</option>
									@endforeach
								</select>
							</div>
							<div class="col-sm-1">
								<button type="button" class="btn btn-primary">+</button>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-body pnlEnderecos">
						<h3>Endereço</h3>
						<div class="row">
							<div class="col-sm-11">
								<div class="row rowInput">
									<div class="col-sm-6">
										<label for="endereco">Endereço</label>
										<input type="text" class="form-control" id="endereco" name="endereco"/>
									</div>
									<div class="col-sm-2">
										<label for="numero">Número</label>
										<input type="text" class="form-control" id="numero" name="numero"/>
									</div>
									<div class="col-sm-4">
										<label for="complemento">Complemento</label>
										<input type="text" class="form-control" id="complemento" name="complemento"/>
									</div>
								</div>
								<div class="row rowInput">
									<div class="col-sm-2">
										<label for="cep">CEP</label>
										<input type="text" class="form-control" id="cep" name="cep"/>
									</div>
									<div class="col-sm-4">
										<label for="bairro">Bairro</label>
										<input type="text" class="form-control" id="bairro" name="bairro"/>
									</div>
									<div class="col-sm-4">
										<label for="cidade">Cidade</label>
										<select class="form-control" name="cidade" id="cidade">
											<option value='33'>Rio de Janeiro</option>
											<option value='27'>São Paulo</option>
										</select>
									</div>
									<div class="col-sm-2">
										<label for="uf">UF</label>
										<select class="form-control" name="uf" id="uf">
											<option value='33'>RJ</option>
											<option value='27'>SP</option>
											<option value='27'>MG</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-sm-1">
								<button type="button" class="btn btn-primary">+</button>
							</div>
						</div>
						<div class="row rowInput">
							<ul class="list-group">
								<li class="list-group-item listasCadastro">
									<div class="row">
										<div class="col-sm-11">
											<div class="row">
												<div class="col-sm-4">Rua Martins Figueira, 35</div>
												<div class="col-sm-4">Copacabana</div>
												<div class="col-sm-2">23585-819</div>
												<div class="col-sm-2">Rio de Janeiro</div>
											</div>
										</div>
										<div class="col-sm-1">
											<button type="button" class="btn btn-default">-</button>
										</div>
									</div>
								</li>
							</ul>
						</div>
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