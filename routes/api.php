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

$api = $app->make(Dingo\Api\Routing\Router::class);

$api->version('v1', function ($api) {

    $api->post('/auth/login', [
        'as' => 'api.auth.login',
        'uses' => 'App\Http\Controllers\Api\AuthController@login',
    ]);

    $api->group([
         'middleware' => [ 'jwt.auth' ]
    ], function ($api) {

        $api->get('/auth/user', [
            'uses' => 'App\Http\Controllers\Api\AuthController@getUser',
            'as' => 'api.auth.user'
        ]);

        $api->patch('/auth/refresh', [
            'uses' => 'App\Http\Controllers\Api\AuthController@refreshToken',
            'as' => 'api.auth.refresh'
        ]);

        $api->delete('/auth/invalidate', [
            'uses' => 'App\Http\Controllers\Api\AuthController@invalidateToken',
            'as' => 'api.auth.invalidate'
        ]);
    });

    $api->group([
        'middleware' => 'jwt.auth',
    ], function ($api) {

        $api->get('/messages/{id}', [
            'uses' => 'App\Http\Controllers\Api\MessageController@get',
            'as' => 'api.messages.id'
        ]);

        $api->get('/messages', [
            'uses' => 'App\Http\Controllers\Api\MessageController@getAll',
            'as' => 'api.messages.all'
        ]);

        $api->post('/messages', [
            'uses' => 'App\Http\Controllers\Api\MessageController@create',
            'as' => 'api.messages.create'
        ]);

        $api->put('/messages', [
            'uses' => 'App\Http\Controllers\Api\MessageController@update',
            'as' => 'api.messages.update'
        ]);

        $api->delete('/messages/{id}', [
            'uses' => 'App\Http\Controllers\Api\MessageController@delete',
            'as' => 'api.messages.delete'
        ]);

    });

});
