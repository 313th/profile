<?php

namespace sahifedp\Profile;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use sahifedp\Profile\Console\Commands\RegisterMenus;
use sahifedp\Profile\Views\Components\Login\Login;

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

        $this->loadViewsFrom(__DIR__.'/Views', 'profile');
        $this->loadViewComponentsAs('profile', [
            Login::class
        ]);

        Blade::componentNamespace('sahifedp\\Profile\\Views\\Components','profile');
    }
}
