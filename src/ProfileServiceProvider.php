<?php

namespace sahifedp\Profile;

use Illuminate\Support\ServiceProvider;

class ProfileServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register() {
        $this->mergeConfigFrom(
            __DIR__.'/../config/menu.php',
            'profile.menu'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                RegisterMenus::class
            ]);
        }

//        $this->publishes([
//            __DIR__.'/../config/menu.php' => config_path('profile.php')
//        ], 'config');
    }
}
