<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\UploadFileService;

class UploadFileProvider extends ServiceProvider
{
    protected $defer = false;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
    public function register()
    {
        $this->app->bind('App\Services\UploadFileService', function ($app) {
            return new UploadFileService();
        });
    }
}
