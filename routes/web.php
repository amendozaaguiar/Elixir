<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
	//Users
	Route::get('users', 'UserController@index')->name('users.index')
		->middleware('permission:users.index');

	Route::get('users/create', 'UserController@create')->name('users.create')
		->middleware('permission:users.create');

	Route::post('users/store', 'UserController@store')->name('users.store')
		->middleware('permission:users.create');

	Route::get('users/{user}', 'UserController@show')->name('users.show')
		->middleware('permission:users.show');

	Route::get('users/{user}/edit','UserController@edit')->name('users.edit')
		->middleware('permission:users.edit');

	Route::put('users/{user}', 'UserController@update')->name('users.update')
		->middleware('permission:users.edit');

	Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')
		->middleware('permission:users.destroy');	

	//ROLES
	Route::get('roles', 'RoleController@index')->name('roles.index')
		->middleware('permission:roles.index');

	Route::get('roles/create', 'RoleController@create')->name('roles.create')
		->middleware('permission:roles.create');

	Route::post('roles/store', 'RoleController@store')->name('roles.store')
		->middleware('permission:roles.create');

	Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
		->middleware('permission:roles.show');

	Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
		->middleware('permission:roles.edit');	

	Route::put('roles/{role}/', 'RoleController@update')->name('roles.update')
		->middleware('permission:roles.edit');	

	Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
		->middleware('permission:roles.destroy');


	//CONVOCATORIAS
	Route::get('convocatorias', 'ConvocatoriaController@index')->name('convocatorias.index')
		->middleware('permission:convocatorias.index');

	Route::get('convocatorias/create', 'ConvocatoriaController@create')->name('convocatorias.create')
		->middleware('permission:convocatorias.create');

	Route::post('convocatorias/store', 'ConvocatoriaController@store')->name('convocatorias.store')
		->middleware('permission:convocatorias.create');

	Route::get('convocatorias/{convocatoria}', 'ConvocatoriaController@show')->name('convocatorias.show')
		->middleware('permission:convocatorias.show');

	Route::get('convocatorias/{convocatoria}/edit', 'ConvocatoriaController@edit')->name('convocatorias.edit')
		->middleware('permission:convocatorias.edit');	

	Route::put('convocatorias/{convocatoria}/', 'ConvocatoriaController@update')->name('convocatorias.update')
		->middleware('permission:convocatorias.edit');	

	Route::delete('convocatorias/{convocatoria}', 'ConvocatoriaController@destroy')->name('convocatorias.destroy')
		->middleware('permission:convocatorias.destroy');

	//CURSOS
	Route::get('cursos', 'CursoController@index')->name('cursos.index')
		->middleware('permission:cursos.index');

	Route::get('cursos/create', 'CursoController@create')->name('cursos.create')
		->middleware('permission:cursos.create');

	Route::post('cursos/store', 'CursoController@store')->name('cursos.store')
		->middleware('permission:cursos.create');

	Route::get('cursos/{curso}', 'CursoController@show')->name('cursos.show')
		->middleware('permission:cursos.show');

	Route::get('cursos/{curso}/edit', 'CursoController@edit')->name('cursos.edit')
		->middleware('permission:cursos.edit');	

	Route::put('cursos/{curso}/', 'CursoController@update')->name('cursos.update')
		->middleware('permission:cursos.edit');	

	Route::delete('cursos/{curso}', 'CursoController@destroy')->name('cursos.destroy')
		->middleware('permission:cursos.destroy');

	//Ruta para consultar cursos dependiendo del programa
	Route::get('cursos/todos/programa/{id}', 'CursoController@getCursos')->name('cursos.getCursos');



	//CAT
	Route::get('cats', 'CatController@index')->name('cats.index')
		->middleware('permission:cat.index');

	Route::get('cats/create', 'CatController@create')->name('cats.create')
		->middleware('permission:cat.create');

	Route::post('cats/store', 'CatController@store')->name('cats.store')
		->middleware('permission:cat.create');

	Route::get('cats/{cat}', 'CatController@show')->name('cats.show')
		->middleware('permission:cat.show');

	Route::get('cats/{cat}/edit', 'CatController@edit')->name('cats.edit')
		->middleware('permission:cat.edit');	

	Route::put('cats/{cat}/', 'CatController@update')->name('cats.update')
		->middleware('permission:cat.edit');	

	Route::delete('cats/{cat}', 'CatController@destroy')->name('cats.destroy')
		->middleware('permission:cat.destroy');




	//Ruta para consultar municipios dependiendo del departamento
	Route::get('municipios/todos/departamento/{id}', 'MunicipioController@getMunicipios')->name('municipios.getMunicipios');

	
});
