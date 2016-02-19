<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>@yield('titulo')</title>
		<!-- Fonts -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
		<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
		<!-- Styles -->
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
		<link href="/css/estilos.css" rel="stylesheet">
		<link href="/css/simple-sidebar.css" rel="stylesheet">
		{{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
		<style>
			body {
				font-family: 'Lato';
			}

			.fa-btn {
				margin-right: 6px;
			}
		</style>
		<!-- JavaScripts -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
		<script src="/js/scripts.js"></script>
		<script src="/js/maskedinput.js"></script>
	</head>
	<body id="app-layout">
		<nav class="navbar navbar-inverse visible-xs barraCima" data-spy="affix" data-offset-top="197">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					</button>
					<a class="navbar-brand" href="#">JudPlus</a>
				</div>
				@if (!Auth::guest())
				<div class="tituloEmpresa">Barbosa e Santos Advocacia</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav">
						@include('layouts.links')
					</ul>
				</div>
				@endif
			</div>
		</nav>
		<nav class="bartitulo navbar navbar-inverse visible-md visible-lg visible-sm barraCima" data-spy="affix" data-offset-top="197">
			<div class="container-fluid">
				<div class="navbar-header">
				<a class="navbar-brand" href="/">JudPlus</a>
				</div>
				@if (!Auth::guest())
				<ul class="nav navbar-nav navMenu">
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">{{ $attr['pessoa']->nome }}
						<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="{{ url('usuario/editar') }}"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Editar perfil</a></li>
							<li class="divider"></li>
							<li><a href="{{ url('/logout') }}"><span class="glyphicon glyphicon-off"></span>&nbsp;&nbsp;Sair</a></li> 
						</ul>
					</li>
				</ul>
				@endif
			</div>
		</nav>
		<div class="row prcDiv">
			@if (!Auth::guest())
			<div class="col-md-2 barraLateral visible-md visible-lg">
				<a href="#"><img class="img-responsive" src="img/logos/{{ $attr['empresa']->imagem }}" /></a>
				<div class="tituloEmpresa">{{ $attr['empresa']->nome }}</div>
				<ul class="sidebar-nav">
					@include('layouts.links')
				</ul>
				<button type="button" class="btn btn-link">Suporte</button>
			</div>
			<div class="col-md-10 row content">
				@yield('content')
			</div>
			@else
			<div class="col-md-12 row content">
				@yield('content')
			</div>
			@endif
		</div>
	</body>
</html>