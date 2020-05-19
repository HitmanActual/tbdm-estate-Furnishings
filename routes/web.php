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
$router->group(['prefix' => 'v1', 'namespace' => 'Api\v1'], function() use($router)
{

    $router->get('estate_furnishings','EstateFurnishingController@index');
    $router->post('estate_furnishings','EstateFurnishingController@store');
    $router->get('estate_furnishings/{type}','EstateFurnishingController@show');
    $router->put('estate_furnishings/{type}','EstateFurnishingController@update');
    $router->patch('estate_furnishings/{type}','EstateFurnishingController@update');
    $router->delete('estate_furnishings/{type}','EstateFurnishingController@destroy');
});
