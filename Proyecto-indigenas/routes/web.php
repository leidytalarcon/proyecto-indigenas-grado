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

////////////LOGIN///////////////

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

Route::post('auth/register/', [
    'uses' =>'ApiController@register', 
   'as' => 'auth.register' 
]);

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

/////////SEGURIDAD//////////////

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
   
        

    /////////////COMUNIDAD////////////////

    Route::get('comunidad/index', [
        'uses' =>'comunidadController@index', 
    'as' => 'comunidad.index' 
    ]);

    Route::get('comunidad/', [
        'uses' =>'comunidadController@listar', 
        'as' => 'comunidad.listar' 
    ]);

    Route::get('comunidad/nuevo/', [
        'uses' =>'comunidadController@nuevo', 
        'as' => 'comunidad.nuevo' 
    ]);

    Route::post('/comunidad/guardar','comunidadController@guardar');

    Route::post('comunidad/actualizar/{id_comunidad}/', [
        'uses'=>'comunidadController@actualizar',
        'as'=>'comunidad.actualizar'
    ]);

    Route::get('comunidad/editar/{id_comunidad}/',[
        'uses'=> 'comunidadController@editar',
        'as'=> 'comunidad.editar'
    ]);

    /////////////// INDIGENA ////////
    Route::get('indigena/index', [
        'uses' =>'indigenaController@index', 
    'as' => 'indigena.index' 
    ]);

    Route::get('indigena/', [
        'uses' =>'indigenaController@listar', 
        'as' => 'indigena.listar' 
    ]);

    Route::get('indigena/nuevo/', [
        'uses' =>'indigenaController@nuevo',   
        'as' => 'indigena.nuevo'
    ]);

    Route::post('/indigena/guardar', 'indigenaController@guardar');

    Route::post('indigena/actualizar/{id_indigena}/', [
        'uses' =>'indigenaController@actualizar',   
        'as' => 'indigena.actualizar'
    ]);

    Route::get('indigena/editar/{id_indigena}/', [
        'uses' =>'indigenaController@editar',   
        'as' => 'indigena.editar'
    ]);

    ///////////// PDF-INDIGENAS /////////////

    Route::get('/pdf/indigena', 'PDFController@PDFindigena')->name('descargarPDFindigena');

    ////////////// COMUNIDAD-INDIGENA ///////

    Route::get('comunidad/indigenas/guardar/{id_comunidad}/{id_indigena}', [
        'uses' =>'comunidadController@indigenas_guardar',   
        'as' => 'comunidad.indigenas.guardar'
    ]);

    Route::post('/comunidad/indigenas/buscar', 'comunidadController@indigenas_buscar');

    Route::get('comunidad/indigenas/eliminar/{id_indigena}', [
        'uses' =>'comunidadController@indigenas_eliminar',   
        'as' => 'comunidad.indigenas.eliminar'
    ]);

    ///////////////////// USUARIOS /////////////////////////////
   
   

    Route::get('usuario/editar/{id_usuario}/',[
        'uses'=> 'usuarioController@editar',
        'as'=> 'usuario.editar'
    ]);    
    Route::post('usuario/actualizar/{id_usuario}/', [
        'uses'=>'usuarioController@actualizar',
        'as' => 'usuario.actualizar'
    ]); 

    //////////////// FOROS /////////////////

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

    ////////// FORO-COMENTARIO ////////////

    Route::get('foro/comentario/{id_foro}/', [
        'uses' =>'foroController@comentario',   
        'as' => 'foro.comentarios'
    ]);
    Route::get('foro/nuevo/{id_foro}/', [
        'uses' =>'foroController@nuevoComentario', 
        'as' => 'comentario.nuevo' 
    ]);
    Route::post('/foro/comentario/guardar','foroController@guardar_comentario');

    /////////// FORO-RESPUESTA ////////////////

    Route::post('/foro/respuesta/guardar','foroController@guardar_respuesta');

    Route::get('respuesta/eliminar/{id_respuesta}/', [
        'uses' =>'foroController@eliminar_respuesta',   
        'as' => 'respuesta.eliminar'
    ]);


});
