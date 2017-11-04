<?php

/*
|--------------------------------------------------------------------------
| Register The Composer Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader
| for our application. We just need to utilize it! We'll require it
| into the script here so that we do not have to worry about the
| loading of any our classes "manually". Feels great to relax.
|
*/

require_once __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Load your environment file
|--------------------------------------------------------------------------
|
| You know, to load your environment file.
*/

try {
    (new Dotenv\Dotenv(__DIR__.'/../'))->load();
} catch (Dotenv\Exception\InvalidPathException $e) {
    //
}

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| Here we will load the environment and create the application instance
| that serves as the central piece of this framework. We'll use this
| application as an "IoC" container and router for this framework.
|
*/

$app = new Laravel\Lumen\Application(
    realpath(__DIR__.'/../')
);

$app->withFacades();

$app->withEloquent();

/*
|--------------------------------------------------------------------------
| Register Container Bindings
|--------------------------------------------------------------------------
|
| Now we will register a few bindings in the service container. We will
| register the exception handler and the console kernel. You may add
| your own bindings here if you like or you can make another file.
|
*/

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

/*
|--------------------------------------------------------------------------
| Register Middleware
|--------------------------------------------------------------------------
|
| Next, we will register the middleware with the application. These can
| be global middleware that run before and after each request into a
| route or middleware that'll be assigned to some specific routes.
|
*/

$app->middleware([
    App\Http\Middleware\CORSMiddleware::class
]);

// $app->middleware([
//    App\Http\Middleware\ExampleMiddleware::class
// ]);

$app->routeMiddleware([
     'auth' => App\Http\Middleware\Authenticate::class,
      'jwt.auth' => 'Tymon\JWTAuth\Middleware\GetUserFromToken',
     // 'jwt.refresh' => 'Tymon\JWTAuth\Middleware\RefreshToken',
     'sentry' => App\Http\Middleware\SentryContext::class,
]);

/*
|--------------------------------------------------------------------------
| Register Service Providers
|--------------------------------------------------------------------------
|
| Here we will register all of the application's service providers which
| are used to bind services into the container. Service providers are
| totally optional, so you are not required to uncomment this line.
|
*/

$app->register(Illuminate\Redis\RedisServiceProvider::class);
// $app->register(App\Providers\AppServiceProvider::class);
$app->register(App\Providers\AuthServiceProvider::class);
// $app->register(App\Providers\GuardServiceProvider::class);
// $app->register(App\Providers\EventServiceProvider::class);
$app->register(Zeek\LumenDingoAdapter\Providers\LumenDingoAdapterServiceProvider::class);
$app->register(Flipbox\LumenGenerator\LumenGeneratorServiceProvider::class);
$app->register(Tymon\JWTAuth\Providers\JWTAuthServiceProvider::class);
$app->register(Sentry\SentryLaravel\SentryLumenServiceProvider::class);

/*
|--------------------------------------------------------------------------
| Load The Application Routes
|--------------------------------------------------------------------------
|
| Next we will include the routes file so that they can all be added to
| the application. This will provide all of the URLs the application
| can respond to, as well as the controllers that may handle them.
|
*/

$app->group(['namespace' => 'App\Http\Controllers'], function ($app) {
    require __DIR__.'/../routes/api.php';
});

/*
|--------------------------------------------------------------------------
| Configure Monolog logging
|--------------------------------------------------------------------------
|
*/

$app->configureMonologUsing(function($monolog) {
    $monolog->pushHandler((new Monolog\Handler\RotatingFileHandler(storage_path("logs/lumen-info.log"), 0, Monolog\Logger::INFO))->setFormatter(new Monolog\Formatter\LineFormatter(null, null, true, true)));
    $monolog->pushHandler((new Monolog\Handler\RotatingFileHandler(storage_path("logs/lumen-warning.log"), 0, Monolog\Logger::WARNING))->setFormatter(new Monolog\Formatter\LineFormatter(null, null, true, true)));
    $monolog->pushHandler((new Monolog\Handler\RotatingFileHandler(storage_path("logs/lumen-debug.log"), 0, Monolog\Logger::DEBUG))->setFormatter(new Monolog\Formatter\LineFormatter(null, null, true, true)));
    $monolog->pushHandler((new Monolog\Handler\RotatingFileHandler(storage_path("logs/lumen-error.log"), 0, Monolog\Logger::ERROR))->setFormatter(new Monolog\Formatter\LineFormatter(null, null, true, true)));
    $monolog->pushHandler((new Monolog\Handler\RotatingFileHandler(storage_path("logs/lumen-critical.log"), 0, Monolog\Logger::CRITICAL))->setFormatter(new Monolog\Formatter\LineFormatter(null, null, true, true)));

    return $monolog;
});

return $app;
