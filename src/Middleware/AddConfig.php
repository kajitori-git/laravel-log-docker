<?php

namespace LaravelLogDocker\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Monolog\Handler\StreamHandler;

class AddConfig
{
    public function handle(Request $request, \Closure $next)
    {
        if(Config::has('logging.channels.docker')){
            return $next($request);
        }

        Config::set('logging.channels.docker', [
            'driver' => 'monolog',
            'level' => env('LOG_LEVEL', 'error'),
            'handler' => StreamHandler::class,
            'formatter' => env('LOG_FORMATTER'),
            'with' => [
                'stream' => 'php://stdout',
            ],
        ]);

        return $next($request);
    }
}
