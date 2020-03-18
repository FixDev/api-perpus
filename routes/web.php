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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

    $router->group(['prefix' => 'api'], function($router) {
        $router->get('/buku', 'BukuController@index');
        $router->post('/buku', 'BukuController@create');
        $router->get('/buku/{id}', 'BukuController@show');
        $router->put('/buku/{id}', 'BukuController@update');
        $router->delete('/buku/{id}', 'BukuController@destroy');

        $router->get('/kategori', 'KategoriController@index');
        $router->post('/kategori', 'KategoriController@create');
        $router->get('/kategori/{id}', 'KategoriController@show');
        $router->put('/kategori/{id}', 'KategoriController@update');
        $router->delete('/kategori/{id}', 'KategoriController@destroy');
    });