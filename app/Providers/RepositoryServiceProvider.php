<?php

namespace App\Providers;

use App\Repositories\UserMeasurements;
use App\Repositories\Interfaces\UserMeasurementsRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Http\Requests\UserMeasurementsPostForm;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            UserMeasurementsRepositoryInterface::class,
            UserMeasurements::class
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
