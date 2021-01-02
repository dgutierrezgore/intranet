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
    route::get('/Partes', 'DocumentosInternosController@oficina_partes');

    Route::get('/CentralDocumentacion', 'CentralDocumentacion@home');

    route::post('/FichaDocsInt', 'DocumentosInternosController@ficha_docs_interno');
    Route::post('/GuardarObsBit', 'DocumentosInternosController@guarda_obs_pers');
    Route::post('/NotErrorPartes', 'DocumentosInternosController@notifica_error_partes');


    Route::post('/Ideas', 'DocumentosInternosController@ideas');
    Route::post('/GenTags', 'DocumentosInternosController@creatag');
    Route::post('/AggTagDoc', 'DocumentosInternosController@agrega_tag_doc');

    Route::get('/DocsTags', 'DocumentosInternosController@busq_tags');

    Route::get('/Versiones', 'DocumentosInternosController@versiones');

    Route::post('/GrillaTags', 'DocumentosInternosController@listado_tags');

    Route::get('/Documentos2020', 'DocumentosInternosController@archivo2020');


});


