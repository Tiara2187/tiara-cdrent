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
use Illuminate\Http\Request;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post("/register", "AuthController@register");
$router->post("/login", "AuthController@login");

$router->get('/cd', 'CdController@index');
$router->get('/cd/{id}', 'CdController@show');
$router->post('/cd', 'CdController@store');
$router->put('/cd/{id}', 'CdController@update');
$router->delete('/cd/{id}', 'CdController@destroy');   

$router->group(['middleware' => 'auth'], function() use ($router) {
    $router->get('/user', function() {
        return Auth::user();
    });

    $router->post('/rent/start', 'RentController@startRent');
    $router->post('/rent/end', 'RentController@endRent');
});
