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

$api = app('Dingo\Api\Routing\Router');

$api->version('v1.0.0', function ($api) {
    $api->group(['namespace' => 'App\Http\Controllers', 'prefix' => 'v1.0.0'], function ($api)
    {
        $api->post('users/sessions', ['as' => 'users.login', 'uses' => 'AuthController@postLogin']);
        $api->delete('users/sessions/current', ['as' => 'users.logout', 'uses' => 'AuthController@deleteLogout']);
    });

    $api->group(['namespace' => 'App\Http\Controllers', 'prefix' => 'v1.0.0', 'middleware' => 'jwt.auth'], function ($api)
    {
        $api->get('/', ['as' => 'api.index', 'uses' => 'ApiController@index']);
        $api->get('/users/{id}', ['as' => 'users.show', 'uses' => 'UserController@show']);
        $api->get('/users', ['as' => 'users.index', 'uses' => 'UserController@index']);
    });
});
