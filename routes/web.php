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
    return redirect()->route('login');
});

Auth::routes();

Route::group(['middleware' => ['auth', 'status']], function(){
		    Route::get('dashboard', 'DashboardController@index');
		    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
		    
			Route::get('/find/findue/{ue}/{select}', 'CertificadoController@findue');
			Route::get('/find/findej_gasto/{secuencia}/{select}', 'RegistroController@getregistro2');

			Route::get('/find/finddoc/{select}/{tip}', 'RegistroController@getdoc');
			Route::get('/find/findtipogasto/{select}/{clas_gasto}', 'RegistroController@getgasto');
			Route::get('/find/findfuente/{select}/{ff}', 'RegistroController@getff');
			Route::get('/find/findorg/{select}/{org}', 'RegistroController@getorg');

			Route::get('/find/findgast/{gast}', 'CertificadoController@findgast');
			Route::get('/findnombre/{da}/{ue}/{prog}/{act}/{proy}', 'CertificadoController@findnombre');

			Route::get('/getcertifi/{year}', 'CertificadoController@getcertifi');

			Route::post('/new_das', 'DasController@new');
			Route::post('/update_das', 'DasController@update');
			Route::post('/new_estructura', 'EstructuraController@new');
			Route::post('/update_estructura', 'EstructuraController@update');
			Route::post('/new_documentos', 'DocumentosController@new');
			Route::post('/update_documentos', 'DocumentosController@update');
			Route::post('/new_fuente', 'FuenteController@new');
			Route::post('/update_fuente', 'FuenteController@update');
			Route::post('/new_categoria', 'CategoriaController@new');
			Route::post('/update_categoria', 'CategoriaController@update');

			Route::post('/new', 'CertificadoController@new');
			Route::get('/cert2/{id}', 'CertificadoController@getcert2');
			Route::post('/cert2/create', 'CertificadoController@addcert2');
			Route::delete('/cert2/delete/{id}', 'CertificadoController@destroy2');
			
			Route::get('/cert/edit/{secuencia}', 'CertificadoController@getedit')->name('certifi.edit');
			Route::get('/reg/edit/{secuencia}', 'RegistroController@getedit')->name('regis.edit');

			Route::get('/getedit/{secuencia}/{gestion}', 'CertificadoController@getcerti');
			Route::get('/getregistroedit/{secuencia}/{gestion}', 'RegistroController@getregis');

			Route::get('/geteditdas/{cod}', 'DasController@getcod');
			Route::get('/geteditestructura/{cod}', 'EstructuraController@getcod');
			Route::get('/geteditdocumentos/{cod}', 'DocumentosController@getcod');
			Route::get('/geteditfuente/{cod}', 'FuenteController@getcod');
			Route::get('/geteditcategoria/{cod}', 'CategoriaController@getcod');

			Route::resource('certificado', 'CertificadoController');
			Route::resource('registro', 'RegistroController');
			Route::resource('usuario', 'UsuarioController');
			Route::get('/getregistro/{year}', 'RegistroController@getregistro');
			Route::get('/getusuario/', 'UsuarioController@getuser');
			
			Route::resource('das', 'DasController');
			Route::get('/getdas/{year}', 'DasController@getdas');
			Route::resource('estructura', 'EstructuraController');
			Route::get('/getestructura/{year}', 'EstructuraController@getestructura');
			Route::resource('documentos', 'DocumentosController');
			Route::get('/getdocumentos/{year}', 'DocumentosController@getdocumentos');
			Route::resource('fuentes', 'FuenteController');
		   Route::get('/getfuentes/{year}', 'FuenteController@getfuentes');
			Route::resource('categoria', 'CategoriaController');
			Route::get('/getcategoria/{year}', 'CategoriaController@getcategoria');

			//Usuarios
        Route::get('/user/main', 'UserController@main')->name('user.main');
        Route::apiResource('user', 'UserController');
        Route::post('/user/status', 'UserController@status')->name('user.status');
        Route::post('/user/verifica', 'UserController@verifica')->name('user.verifica');
        Route::post('/user/delete/role', 'UserController@deleteRole')->name('user.deleteRole');
        Route::post('/user/add/role', 'UserController@addRole')->name('user.addRole');
        Route::get('/user/config/administrator', 'UserController@config')->name('user.config');
        Route::post('/user/update/admin', 'UserController@updateAdmin')->name('user.updateadmin');



		Route::get ('print/{id}', 'PdfController@print');


});
