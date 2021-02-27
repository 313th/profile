<?php

namespace sahifedp\Profile;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use sahifedp\Profile\Console\Commands\Register;
use sahifedp\Profile\Views\Components\Login\Login;
use sahifedp\Profile\Views\Components\Actions\Actions;

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
        $this->mergeConfigFrom(
            __DIR__.'/../config/permissions.php',
            'profile.permissions'
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
                Register::class
            ]);
        }

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/Migrations');
        $this->loadViewsFrom(__DIR__.'/Views', 'profile');
        $this->loadViewComponentsAs('profile', [
            Login::class,
            Actions::class
        ]);

        Blade::componentNamespace('sahifedp\\Profile\\Views\\Components','profile');
    }
}
