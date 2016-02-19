<?php
	// Rotas de autenticação
	Route::get('login', 'Auth\AuthController@getLogin');
	Route::post('login', 'Auth\AuthController@postLogin');
	Route::get('logout', 'Auth\AuthController@getLogout');
	
	// Rotas de registro
	Route::get('register', 'Auth\AuthController@getRegister');
	Route::post('register', 'Auth\AuthController@postRegister');
	
	// Principal - todos os views que precisem de autenticação
	Route::group(['middleware' => 'web'], function () {
		Route::auth();
		
		Route::get('/home', 'PrincipalController@home');
		Route::get('/', 'PrincipalController@home');
		
		//Clientes 
		Route::get('/cliente/lista', 'ClienteController@lista');
		Route::get('/cliente/novo', 'ClienteController@novo');
		Route::post('/cliente/novo', 'ClienteController@salvar');
		
		Route::get('/cliente/editar', 'ClienteController@editar');
	});
	
	Route::group(['middleware' => ['web']], function () {
		//
	});