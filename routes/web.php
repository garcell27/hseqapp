<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return 'Gracias';
});
//acceso
$app->post('/login','LoginController@index');

//Usuarios
$app->get('/users',['uses'=>'UsersController@index']);

//Galerias


//Cursos
$app->get('/cursos', 'CursosController@index');
$app->post('/curso', 'CursosController@create');
$app->get('/curso/{id}', 'CursosController@show');
$app->put('/curso/{id}', 'CursosController@update');
$app->delete('/curso/{id}', 'CursosController@destroy');

//Banners
$app->get('/banners', 'BannersController@index');
$app->post('/banner', 'BannersController@create');
$app->get('/banner/{id}', 'BannersController@show');
$app->put('/banner/{id}', 'BannersController@update');
$app->delete('/banner/{id}', 'BannersController@destroy');
$app->post('/banner/orden', 'BannersController@orden');
// Monedas
$app->get('/monedas', 'MonedasController@index');
