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


Route::group(['middleware' => 'auth'], function () {

    route::get('/', 'HomeController@index');
    route::get('/Partes','DocumentosInternosController@oficina_partes');

    Route::get('/CentralDocumentacion', 'CentralDocumentacion@home');

    route::post('/FichaDocsInt', 'DocumentosInternosController@ficha_docs_interno');
    Route::post('/GuardarObsBit','DocumentosInternosController@guarda_obs_pers');
    Route::post('/NotErrorPartes','DocumentosInternosController@notifica_error_partes');

});


