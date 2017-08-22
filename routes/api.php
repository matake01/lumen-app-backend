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
        'uses' => 'App\Http\Controllers\Auth\AuthController@postLogin',
    ]);

    $api->group([
        'middleware' => 'api.auth',
    ], function ($api) {

        $api->get('/auth/user', [
            'uses' => 'App\Http\Controllers\Auth\AuthController@getUser',
            'as' => 'api.auth.user'
        ]);

        $api->patch('/auth/refresh', [
            'uses' => 'App\Http\Controllers\Auth\AuthController@patchRefresh',
            'as' => 'api.auth.refresh'
        ]);

        $api->delete('/auth/invalidate', [
            'uses' => 'App\Http\Controllers\Auth\AuthController@deleteInvalidate',
            'as' => 'api.auth.invalidate'
        ]);
    });

    $api->group([
        'middleware' => 'api.auth',
    ], function ($api) {

        $api->get('/messages/{id}', [
            'uses' => 'App\Http\Controllers\MessageController@get',
            'as' => 'api.messages.id'
        ]);

        $api->get('/messages', [
            'uses' => 'App\Http\Controllers\MessageController@getAll',
            'as' => 'api.messages.all'
        ]);

        $api->post('/messages', [
            'uses' => 'App\Http\Controllers\MessageController@create',
            'as' => 'api.messages.create'
        ]);

        $api->put('/messages', [
            'uses' => 'App\Http\Controllers\MessageController@update',
            'as' => 'api.messages.update'
        ]);

        $api->delete('/messages/{id}', [
            'uses' => 'App\Http\Controllers\MessageController@delete',
            'as' => 'api.messages.delete'
        ]);

    });

});
