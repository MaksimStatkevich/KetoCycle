<?php

namespace App\Providers;

use App\Repositories\ConvertImMe;
use App\Repositories\Interfaces\ConvertImMeInterface;
use Illuminate\Support\ServiceProvider;

class ConvertImMeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ConvertImMeInterface::class,
            ConvertImMe::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
