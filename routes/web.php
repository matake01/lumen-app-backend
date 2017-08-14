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
    return view('index');
});

$app->group(['prefix' => 'api/v1/'], function () use ($app) {
  // User functions
  $app->get('users/{id}', 'UserController@get');

  // Message functions
  $app->get('messages/{id}', 'MessageController@get');
  $app->get('messages', 'MessageController@getAll');
  $app->post('messages', 'MessageController@create');
  $app->put('messages', 'MessageController@update');
  $app->delete('messages/{id}', 'MessageController@delete');
});
