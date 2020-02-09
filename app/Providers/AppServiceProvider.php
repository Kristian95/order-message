<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;
use App\Repositories\MessageRepository;
use App\Interfaces\MessageInterface;
use App;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        App::bind(MessageInterface::class, MessageRepository::class);

        Schema::defaultStringLength(191);
    }
}
