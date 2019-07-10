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

	//EVALUACIONES
	Route::get('evaluacionesAspirantes/{convocatoria}', 'EvaluacionAspiranteController@index')
		->name('evaluacionesAspirantes.index')
		->middleware('permission:evaluacionesAspirantes.index');

	Route::get('evaluacionesAspirantes/{evaluacion}/show', 'EvaluacionAspiranteController@show')
		->name('evaluacionesAspirantes.show')
		->middleware('permission:evaluacionesAspirantes.show');

	Route::get('evaluacionesAspirantes/{evaluacion}/edit/{convocatoria}/convocatoria', 'EvaluacionAspiranteController@edit')
		->name('evaluacionesAspirantes.edit')
		->middleware('permission:evaluacionesAspirantes.edit');	

	Route::put('evaluacionesAspirantes/{evaluacion}/{convocatoria}', 'EvaluacionAspiranteController@update')
		->name('evaluacionesAspirantes.update')
		->middleware('permission:evaluacionesAspirantes.edit');	

	/**REPORTES*/	
	Route::get('convocatorias/report/one/{convocatoria}', 'ConvocatoriaController@reportOne')
		->name('convocatorias.report.one')
		->middleware('permission:convocatorias.report');

	Route::get('convocatorias/report/two/{convocatoria}', 'ConvocatoriaController@reportTwo')
		->name('convocatorias.report.two')
		->middleware('permission:convocatorias.report');

	Route::get('convocatorias/report/three/{convocatoria}', 'ConvocatoriaController@reportThree')
		->name('convocatorias.report.three')
		->middleware('permission:convocatorias.report');


	/**RUTA ESPECIAL DE AUDITORIA*/
	Route::get('audits', 'AuditController@index')
		->name('audits.index')
		->middleware('permission:audits.index');
});
