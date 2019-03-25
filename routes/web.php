<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Auth::routes();

Route::get('/', 'WelcomeController@index');

Route::get('/home', 'HomeController@index')
	->name('home');

/*RUTAS ESPECIALES PARA USUARIOS EXTERNOS DEL SISTEMA*/
Route::get('users/create/external', 'UserController@createExternal')
	->name('users.create.external');

Route::post('users/store', 'UserController@store')
	->name('users.store');


/*GRUPO DE RUTA PARA EL MIDDLEWARE AUTH (AUTENTIFICACION) */
Route::middleware(['auth'])->group(function () {

	//USERS
	Route::get('users', 'UserController@index')
		->name('users.index')
		->middleware('permission:users.index');

	Route::get('users/create', 'UserController@create')
		->name('users.create')
		->middleware('permission:users.create');	

	Route::get('users/{user}', 'UserController@show')
		->name('users.show')
		->middleware('permission:users.show');

	Route::get('users/{user}/edit','UserController@edit')
		->name('users.edit')
		->middleware('permission:users.edit');

	Route::put('users/{user}', 'UserController@update')
		->name('users.update')
		->middleware('permission:users.edit');

	Route::delete('users/{user}', 'UserController@destroy')
		->name('users.destroy')
		->middleware('permission:users.destroy');	

	//ROLES
	Route::get('roles', 'RoleController@index')
		->name('roles.index')
		->middleware('permission:roles.index');

	Route::get('roles/create', 'RoleController@create')
		->name('roles.create')
		->middleware('permission:roles.create');

	Route::post('roles/store', 'RoleController@store')
		->name('roles.store')
		->middleware('permission:roles.create');

	Route::get('roles/{role}', 'RoleController@show')
		->name('roles.show')
		->middleware('permission:roles.show');

	Route::get('roles/{role}/edit', 'RoleController@edit')
		->name('roles.edit')
		->middleware('permission:roles.edit');	

	Route::put('roles/{role}/', 'RoleController@update')
		->name('roles.update')
		->middleware('permission:roles.edit');	

	Route::delete('roles/{role}', 'RoleController@destroy')
		->name('roles.destroy')
		->middleware('permission:roles.destroy');

	//CONVOCATORIAS
	Route::get('convocatorias', 'ConvocatoriaController@index')
		->name('convocatorias.index')
		->middleware('permission:convocatorias.index');

	Route::get('convocatorias/create', 'ConvocatoriaController@create')
		->name('convocatorias.create')
		->middleware('permission:convocatorias.create');

	Route::post('convocatorias/store', 'ConvocatoriaController@store')
		->name('convocatorias.store')
		->middleware('permission:convocatorias.create');

	Route::get('convocatorias/{convocatoria}', 'ConvocatoriaController@show')
		->name('convocatorias.show')
		->middleware('permission:convocatorias.show');

	Route::get('convocatorias/{convocatoria}/edit', 'ConvocatoriaController@edit')
		->name('convocatorias.edit')
		->middleware('permission:convocatorias.edit');	

	Route::put('convocatorias/{convocatoria}/', 'ConvocatoriaController@update')
		->name('convocatorias.update')
		->middleware('permission:convocatorias.edit');	

	Route::delete('convocatorias/{convocatoria}', 'ConvocatoriaController@destroy')
		->name('convocatorias.destroy')
		->middleware('permission:convocatorias.destroy');

	//DETALLE DE CONVOCATORIAS
	Route::get('convocatorias/{convocatoria}/detalle', 'DetalleConvocatoriaController@index')
		->name('detalleConvocatorias.index')
		->middleware('permission:detalleConvocatorias.index');

	Route::get('convocatorias/{convocatoria}/detalle/create', 'DetalleConvocatoriaController@create')
		->name('detalleConvocatorias.create')
		->middleware('permission:detalleConvocatorias.create');

	Route::post('convocatorias/detalle/store', 'DetalleConvocatoriaController@store')
		->name('detalleConvocatorias.store')
		->middleware('permission:detalleConvocatorias.create');

	Route::get('convocatorias/detalle/{detalle_convocatoria}', 'DetalleConvocatoriaController@show')
		->name('detalleConvocatorias.show')
		->middleware('permission:detalleConvocatorias.show');

	Route::get('convocatorias/detalle/{detalle_convocatoria}/edit', 'DetalleConvocatoriaController@edit')
		->name('detalleConvocatorias.edit')
		->middleware('permission:detalleConvocatorias.edit');	

	Route::put('convocatorias/detalle/{detalle_convocatoria}/', 'DetalleConvocatoriaController@update')
		->name('detalleConvocatorias.update')
		->middleware('permission:detalleConvocatorias.edit');	

	Route::delete('convocatorias/detalle/{detalle_convocatoria}', 'DetalleConvocatoriaController@destroy')
		->name('detalleConvocatorias.destroy')
		->middleware('permission:detalleConvocatorias.destroy');

	//CURSOS
	Route::get('cursos', 'CursoController@index')
		->name('cursos.index')
		->middleware('permission:cursos.index');

	Route::get('cursos/create', 'CursoController@create')
		->name('cursos.create')
		->middleware('permission:cursos.create');

	Route::post('cursos/store', 'CursoController@store')
		->name('cursos.store')
		->middleware('permission:cursos.create');

	Route::get('cursos/{curso}', 'CursoController@show')
		->name('cursos.show')
		->middleware('permission:cursos.show');

	Route::get('cursos/{curso}/edit', 'CursoController@edit')
		->name('cursos.edit')
		->middleware('permission:cursos.edit');	

	Route::put('cursos/{curso}/', 'CursoController@update')
		->name('cursos.update')
		->middleware('permission:cursos.edit');	

	Route::delete('cursos/{curso}', 'CursoController@destroy')
		->name('cursos.destroy')
		->middleware('permission:cursos.destroy');

	/*RUTA ESPECIAL PARA CONSULTAR LOS CURSOS DEPENDIENDO DEL PROGRAMA*/
	Route::get('cursos/todos/programa/{id}', 'CursoController@getCursos')
		->name('cursos.getCursos');

	/**CAT*/
	Route::get('cats', 'CatController@index')
		->name('cats.index')
		->middleware('permission:cat.index');

	Route::get('cats/create', 'CatController@create')
		->name('cats.create')
		->middleware('permission:cat.create');

	Route::post('cats/store', 'CatController@store')
		->name('cats.store')
		->middleware('permission:cat.create');

	Route::get('cats/{cat}', 'CatController@show')
		->name('cats.show')
		->middleware('permission:cat.show');

	Route::get('cats/{cat}/edit', 'CatController@edit')
		->name('cats.edit')
		->middleware('permission:cat.edit');	

	Route::put('cats/{cat}/', 'CatController@update')
		->name('cats.update')
		->middleware('permission:cat.edit');	

	Route::delete('cats/{cat}', 'CatController@destroy')
		->name('cats.destroy')
		->middleware('permission:cat.destroy');


	/**PROGRAMAS*/
	Route::get('programas', 'ProgramaController@index')
		->name('programas.index')
		->middleware('permission:programas.index');

	Route::get('programas/create', 'ProgramaController@create')
		->name('programas.create')
		->middleware('permission:programas.create');

	Route::post('programas/store', 'ProgramaController@store')
		->name('programas.store')
		->middleware('permission:programas.create');

	Route::get('programas/{programa}', 'ProgramaController@show')
		->name('programas.show')
		->middleware('permission:programas.show');

	Route::get('programas/{programa}/edit', 'ProgramaController@edit')
		->name('programas.edit')
		->middleware('permission:programas.edit');	

	Route::put('programas/{programa}/', 'ProgramaController@update')
		->name('programas.update')
		->middleware('permission:programas.edit');	

	Route::delete('programas/{programa}', 'ProgramaController@destroy')
		->name('programas.destroy')
		->middleware('permission:programas.destroy');

	/**CURSOS*/
	Route::get('cursos', 'CursoController@index')
		->name('cursos.index')
		->middleware('permission:cursos.index');

	Route::get('cursos/create', 'CursoController@create')
		->name('cursos.create')
		->middleware('permission:cursos.create');

	Route::post('cursos/store', 'CursoController@store')
		->name('cursos.store')
		->middleware('permission:cursos.create');

	Route::get('cursos/{curso}', 'CursoController@show')
		->name('cursos.show')
		->middleware('permission:cursos.show');

	Route::get('cursos/{curso}/edit', 'CursoController@edit')
		->name('cursos.edit')
		->middleware('permission:cursos.edit');	

	Route::put('cursos/{curso}/', 'CursoController@update')
		->name('cursos.update')
		->middleware('permission:cursos.edit');	

	Route::delete('cursos/{curso}', 'CursoController@destroy')
		->name('cursos.destroy')
		->middleware('permission:cursos.destroy');

	//RUTA ESPECIAL PARA CONSULTAR LOS MINICIPIOS DEPENDIENDO DEL DEPARTAMENTO
	Route::get('municipios/todos/departamento/{id}', 'MunicipioController@getMunicipios')
		->name('municipios.getMunicipios');


	//APLICANTES A CONVOCATORIASCONVOCATORIAS
	Route::post('aplicantesConvocatorias/store', 'AplicantesConvocatoriaController@store')
		->name('aplicantesConvocatorias.store')
		->middleware('permission:aplicantesConvocatorias.create');

	//Ruta para preseleccionar aplicantes
	Route::post('aplicantesConvocatorias/preseleccion', 'AplicantesConvocatoriaController@updatePreSelected')
		->name('aplicantesConvocatorias.update.preselected')
		->middleware('permission:aplicantesConvocatorias.edit.preselected');
});
