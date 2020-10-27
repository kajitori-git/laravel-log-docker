<?php

namespace LaravelLogDocker;

use Illuminate\Support\ServiceProvider as ServiceProviderBase;
use Illuminate\Contracts\Http\Kernel;

class ServiceProvider extends ServiceProviderBase
{
    protected $middleware = [
        \LaravelLogDocker\Middleware\AddConfig::class,
    ];

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // register global middleware.
        $kernel = $this->app->make(Kernel::class);
        foreach ($this->middleware as $middleware) {
            $kernel->pushMiddleware($middleware);
        }
    }
}
