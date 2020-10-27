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
            'handler' => StreamHandler::class,
            'formatter' => env('LOG_FORMATTER_DOCKER'),
            'with' => [
                'stream' => 'php://stdout',
                'level' => env('LOG_LEVEL_DOCKER', 'error'),
            ],
        ]);

        return $next($request);
    }
}
