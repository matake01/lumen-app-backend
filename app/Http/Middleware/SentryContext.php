<?php

namespace App\Http\Middleware;

use Tymon\JWTAuth\Facades\JWTAuth;

use Log;
use Closure;

class SentryContext
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Log::debug('SentryContext middleware');

        if (app()->bound('sentry')) {

           $sentry = app('sentry');

           // Add user context
           $token = JWTAuth::parseToken();

           if ($token->authenticate()) {
               $sentry->user_context([
                 'token' => $token
               ]);

               Log::debug('Sets token \'$token\' to \'user_context\'');
           } else {
               $sentry->user_context(
                 ['token' => 'not_authenticated']
               );

               Log::debug('Failed JWT authentication');
           }

           // Add tags context
           // $sentry->tags_context([...]);
           
       } else {
         Log::debug('Skips SentryContext');
       }

       return $next($request);
    }
}
