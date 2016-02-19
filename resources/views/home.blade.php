@extends('layouts.app')

@section('titulo')
J+ 
@stop

@section('content')
		<div class="container">
			<div class="dvTelaPrincipal">
                <header class="hdPrincipal">
                    <h1>Olá, <strong class="marked"></strong> seja bem-vindo.</h1>
                </header>
				<ul class="infPrincipal">
					<li>
						<a href="cliente/lista">
							<strong class="value">{{ $attr['clientes'] }}</strong>
							<span class="name">Clientes</span>
						</a>
					</li>
					<li>
						<a href="#">
							<strong class="value">0</strong>
							<span class="name">Processos</span>
						</a>
					</li>
					<li>
						<a href="#">
							<strong class="value">0</strong>
							<span class="name">Compromissos</span>
						</a>
					</li>
					<li>
						<a href="#">
							<strong class="value">0</strong>
							<span class="name">Recados</span>
						</a>
					</li>
				</ul>
            </div>
		</div>
@stop