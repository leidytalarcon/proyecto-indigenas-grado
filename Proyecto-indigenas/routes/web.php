<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded



Route::post('register', 'ApiController@register');by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//////////////// LOGIN ////////////////

Route::get('/', [
    'uses' =>'ApiController@inicio_external', 
    'as' => 'welcome' 
]);

Route::get('auth/', [
    'uses' =>'ApiController@inicio_sesion', 
    'as' => 'auth.view' 
]);

Route::post('auth/login/', [
    'uses' =>'ApiController@login', 
   'as' => 'auth.login' 
]);

//////////////// SEGURIDAD ////////////////

Route::group(['middleware' => 'auth.jwt'], function () {
 
    Route::get('inicio/', [
        'uses' =>'ApiController@inicio', 
        'as' => 'inicio' 
    ]);

    Route::post('logout/', [
        'uses' =>'ApiController@logout', 
       'as' => 'logout' 
    ]);
 
    Route::post('auth/user', [
        'uses' =>'ApiController@getAuthUser', 
       'as' => 'auth.user' 
    ]);

    //////////////// FILTRO ////////////////

    Route::get('filtro/index', [
        'uses' =>'filtroController@index', 
    'as' => 'filtro.index' 
    ]);

    Route::get('filtro/mapa', [
        'uses' =>'filtroController@mapa', 
        'as' => 'filtro.mapa' 
    ]);

    Route::get('filtro/{id_dpto}', [
        'uses' =>'filtroController@listar', 
        'as' => 'filtro.listar' 
    ]);

    //////////////// REPORTE ////////////////

    Route::get('repote/generar/', [
        'uses' =>'reporteController@generar',   
        'as' => 'reporte.generar'
    ]);

    Route::get('repote/mapa/', [
        'uses' =>'reporteController@generarMapa',   
        'as' => 'reporte.mapa'
    ]);

    Route::get('reporte/mapa/{id_dpto}', [
        'uses' =>'reporteController@generarPowerBi', 
        'as' => 'reporte.powerbi' 
    ]);

    Route::get('reporte/factor/{id_factor}', [
        'uses' =>'reporteController@generarFactor', 
        'as' => 'reporte.factor' 
    ]);

    Route::get('reporte/volver/', [
        'uses' =>'reporteController@volver', 
        'as' => 'reporte.volver' 
    ]);

    //////////////// DESCARGAR-REPORTE ////////////////

    Route::get('repote/generar/pdf', [
        'uses' =>'descargarController@PDFreporte',   
        'as' => 'descarga.pdf'
    ]);

    Route::get('repote/generar/excel', [
        'uses' =>'descargarController@EXCELreporte',   
        'as' => 'descarga.excel'
    ]);

    //////////////// USUARIOS ////////////////
   
    Route::get('usuario/index', [
        'uses' =>'usuarioController@index', 
    'as' => 'usuario.index' 
    ]);
    
    Route::get('usuario/', [
        'uses'=>'usuarioController@listar',
        'as' => 'usuario.listar'
    ]);

    Route::get('usuario/nuevo/', [
        'uses' =>'usuarioController@nuevo', 
        'as' => 'usuario.nuevo' 
    ]);  
    
    Route::post('auth/register/', [
        'uses' =>'ApiController@register', 
       'as' => 'auth.register' 
    ]);
    
    Route::get('usuario/editar/{id_usuario}/',[
        'uses'=> 'usuarioController@editar',
        'as'=> 'usuario.editar'
    ]);    
    Route::post('usuario/actualizar/{id_usuario}/', [
        'uses'=>'usuarioController@actualizar',
        'as' => 'usuario.actualizar'
    ]); 

    //////////////// FOROS ////////////////

    Route::get('foro/index', [
        'uses' =>'foroController@index', 
    'as' => 'foro.index' 
    ]);

    Route::get('foro/', [
        'uses' =>'foroController@listar', 
    'as' => 'foro.listar' 
    ]);

    Route::get('foro/nuevo/', [
        'uses' =>'foroController@nuevo', 
        'as' => 'foro.nuevo' 
    ]);

    Route::post('/foro/guardar','foroController@guardar');

    Route::get('foro/editar/{id_foro}/', [
        'uses' =>'foroController@editar',   
        'as' => 'foro.editar'
    ]);
    Route::post('foro/actualizar/{id_foro}/', [
        'uses' =>'foroController@actualizar',   
        'as' => 'foro.actualizar'
    ]);

    //////////////// FORO-COMENTARIO ////////////////

    Route::get('foro/comentario/{id_foro}/', [
        'uses' =>'foroController@comentario',   
        'as' => 'foro.comentarios'
    ]);
    Route::get('foro/nuevo/{id_foro}/', [
        'uses' =>'foroController@nuevoComentario', 
        'as' => 'comentario.nuevo' 
    ]);
    Route::post('/foro/comentario/guardar','foroController@guardar_comentario');

    //////////////// FORO-RESPUESTA ////////////////

    Route::post('/foro/respuesta/guardar','foroController@guardar_respuesta');

    Route::get('respuesta/eliminar/{id_respuesta}/', [
        'uses' =>'foroController@eliminar_respuesta',   
        'as' => 'respuesta.eliminar'
    ]);

});
