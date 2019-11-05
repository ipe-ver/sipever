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

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});
//Route::get('/directorio', function () { return view('directorio.index'); });

//Route::get('/directorio/get_extension','Directorio\ExtensionController@getExtensiones');
/*Route::group(['middleware' => ['role:admin']], function () {

});*/

//REGISTRAR UN USUARIO EN LA TABLA DE USER
Route::post('registro', 'Auth\RegisterController@registro')->name('registro');

/*Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('/', function() { return view('admin.index'); })->name('index');
	Route::get('/users', function () { return view('admin.user.index'); });



});*/

/*******************************************************************************************************
											MIDDLEWARE DE ALMACÉN
 ******************************************************************************************************/

Route::group(['middleware' => ['auth'], 'prefix' => 'almacen', 'as' => 'almacen.'], function() {
    Route::get('/', function() { return view('almacen.index'); })->name('index');
    Route::get('/articulos/page/{no_index}','Almacen\ArticuloController@page')->name('articulos.next_page');
    Route::post('/articulos/actualizar','Almacen\ArticuloController@update')->name('articulos.actualizarArticulo');
    Route::post('/articulos/buscar','Almacen\ArticuloController@buscarPorPartida')->name('articulos.buscarPartida');
    Route::post('/articulos/buscarNombre','Almacen\ArticuloController@buscarPorNombre')->name('articulos.buscarArticulo');
    Route::get('/articulos/baja/{clave}','Almacen\ArticuloController@destroy')->name('articulos.darBaja');
    Route::post('/articulos/crear','Almacen\ArticuloController@create')->name('articulos.nuevoArticulo');
    Route::post('/partidas/crear','Almacen\PartidaController@create')->name('partidas.nuevaPartida');
    Route::get('/partidas/actualizar/{id}','Almacen\PartidaController@update')->name('partidas.actualizar');
    Route::get('/partidas/eliminar/{id}','Almacen\PartidaController@destroy')->name('partidas.eliminar');
    Route::post('/departamentos/buscaroficina', 'Almacen\ReporteController@getOficinas');
    Route::post('/facturas/buscarArticulo', 'Almacen\FacturaController@getArticulos');
    Route::post('/factura/registrar','Almacen\FacturaController@registrarFactura')->name('facturas.registrar');
    Route::post('/reportes/generar', 'Almacen\ReporteController@generarReporte')->name('reportes.generar');
    Route::post('/polizas/generar', 'Almacen\PolizaController@generarPoliza')->name('polizas.generar');
    Route::post('/periodo/cerrar','Almacen\PeriodoController@cerrar_mes')->name('periodo.cerrar');
    Route::post('/vales/getDetalles', 'Almacen\ValeController@getDetalles');
    Route::post('/vales/validarOrden', 'Almacen\ValeController@validarOrden')->name('vales.validarOrden');
    Route::resource('periodo','Almacen\PeriodoController');
    Route::resource('articulos', 'Almacen\ArticuloController');
    Route::resource('partidas', 'Almacen\PartidaController');
    Route::resource('reportes', 'Almacen\ReporteController');
    Route::resource('vales','Almacen\ValeController');
    Route::resource('polizas', 'Almacen\PolizaController');
    Route::resource('facturas', 'Almacen\FacturaController');

});

/*******************************************************************************************************
											MIDDLEWARE DE CATALOGOS
 ******************************************************************************************************/
Route::group(['middleware' => ['auth'], 'prefix' => 'catalogos', 'as' => 'catalogos.'], function() {

	// CATALOGO DE USUARIOS
	Route::get('/', function() { return view('catalogos.index'); })->name('index'); //Carga la vista de catalogos

	Route::get('/users', function() { return view('catalogos.user'); }); //Carga la vista de usuarios
	Route::get('/get_users','Catalogos\UsersController@get_users'); //Obtiene los usuarios
	Route::get('/add_user', 'Catalogos\UsersController@create'); //LLeva al formulario de Guardar

	// CATALOGO DE ROLES
	Route::get('/roles', function() { return view('catalogos.roles'); }); //Carga la vista de roles
	Route::get('/get_roles','Catalogos\RolesController@get_roles'); //Obtiene los roles
	Route::get('/add_rol', 'Catalogos\RolesController@create'); //LLeva al formulario de Guardar 
	Route::post('/save_rol', 'Catalogos\RolesController@store'); //Guarda la información del rol

	// CATALOGO DE PERMISOS
	Route::get('/permisos', function() { return view('catalogos.permisos'); }); //Carga la vista de permisos
	Route::get('/get_permisos','Catalogos\PermisosController@get_permisos'); //Obtiene los permisos
	Route::post('/add_permisos', 'Catalogos\PermisosController@store'); //Guarda la información del permiso

	// CATALOGO DE EMPLEADOS	
	Route::get('/empleados', function() { return view('catalogos.empleado'); }); //Carga la vista de empleados
	Route::get('/get_empleados','Catalogos\EmpleadoController@get_empleados');	//Obtiene los empleados
	Route::get('/add_empleado', 'Catalogos\EmpleadoController@create');//LLeva al formulario de Guardar
	Route::post('/empleado', 'Catalogos\EmpleadoController@store'); //Guarda la información del empleado
	Route::get('/empleados/edit/{id}','Catalogos\EmpleadoController@edit'); //LLeva al formulario de Editar
	Route::put('/empleados/update/{id}', 'Catalogos\EmpleadoController@update'); //Edita la información del empleado
	
});


/*******************************************************************************************************
											MIDDLEWARE DE EXPEDIENTE
 ******************************************************************************************************/

Route::group(['middleware' => ['auth'], 'prefix' => 'expediente', 'as' => 'expediente.'], function(){

	// MOSTRAR LA PAGINA PRINCIPAL DEL EXPEDIENTE ELECTRONICO
	Route::get('/', function () { return view('expediente.index'); })->name('index');

	// DIRECCIONA PARA AGREGAR FORMULARIO DEL ACTIVO O PENSIONADO
	Route::get('add', 'Expediente\ExpedienteController@create');

	// INSERTAR VALORES EN EL FORMULARIO
	Route::post('/actpen', 'Expediente\ExpedienteController@store');

	// MOSTRAR LA INFORMACION DE LOS ACTIVOS Y PENSIONADOS EN LA TABLA DE LA PAGINA PRINCIPAL
	Route::get('get_expediente','Expediente\ExpedienteController@getExpedientes');

	// MOSTRAR EL DETALLE DEL ACTIVO O PENSIONADO DESDE LA TABLA DE LA PAGINA PRINCIPAL
	Route::get('/{id}', 'Expediente\ExpedienteController@show');

	//EDITAR REGISTRO
	Route::get('/edit/{id}','Expediente\ExpedienteController@edit'); //LLeva al formulario
	Route::put('/update/{id}', 'Expediente\ExpedienteController@update'); //Edita la información

	//Route::get('/organismos/{idOrganismo}', 'Expediente\ExpedienteController@getDependencias');

	Route::get('{id}/plaza','Expediente\ExpedienteController@plaza'); //LLeva al formulario


});

	/*******************************************************************************************************
											MÓDULO DE NOSOTROS
 	******************************************************************************************************/
	//Módulo de Nosotros
	Route::get('/mision', function () { return view('nosotros.mision'); });
	Route::get('/informacion', function () { return view('nosotros.informacion'); });
	Route::get('/organigrama', function () { return view('nosotros.organigrama'); });

	/*******************************************************************************************************
											DEPARTAMENTO DE TECNOLOGÍAS
 	******************************************************************************************************/
	//Departamento de tecnologías
	Route::get('/tecnologias', function () { return view('areas.tecnologias'); });
	Route::get('/tecnologias/infraestructura', function () { return view('areas.soporte'); });
	Route::get('/tecnologias/desarrollo', function () { return view('areas.desarrollo'); });
	Route::get('/descargar_informacion', function () { return view('descargar.informacion'); });

	/*******************************************************************************************************
											DEPARTAMENTO DE RECURSOS HUMANOS
 	******************************************************************************************************/
	//Departamento de recursos humanos
	Route::get('/recursos_humanos', function () { return view('areas.recursos_humanos'); });
	Route::get('/recursos_humanos/nomina', function () { return view('areas.nomina'); });
	Route::get('/recursos_humanos/personal', function () { return view('areas.personal'); });


	// MOSTRAR LA INFORMACION DE LOS ACTIVOS Y PENSIONADOS EN LA TABLA DE LA PAGINA PRINCIPAL
	//Route::get('get_usuarios','Expediente\ExpedienteController@getExpedientes');

	//Route::get('search', 'AutoCompleteController@index');
 	//Route::get('autocomplete', 'AutoCompleteController@search');












