<?php

namespace sahifedp\Profile;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use sahifedp\Profile\Console\Commands\Register;
use sahifedp\Profile\Views\Components\Charity\Charity;
use sahifedp\Profile\Views\Components\Devotion\Devotion;
use sahifedp\Profile\Views\Components\Education\Education;
use sahifedp\Profile\Views\Components\HandDirection\HandDirection;
use sahifedp\Profile\Views\Components\Health\Health;
use sahifedp\Profile\Views\Components\Login\Login;
use sahifedp\Profile\Views\Components\Actions\Actions;
use sahifedp\Profile\Views\Components\Register\Starter;
use sahifedp\Profile\Views\Components\RelationStatus\RelationStatus;
use sahifedp\Profile\Views\Components\Religion\Religion;

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
        $this->mergeConfigFrom(
            __DIR__.'/../config/steps.php',
            'profile.steps'
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
        $this->loadTranslationsFrom(__DIR__ . '../lang/fa','profile');
        $this->publishes([__DIR__ . '../lang/fa'=>'resources/lang']);
        $this->loadViewsFrom(__DIR__.'/Views', 'profile');
        $this->loadViewComponentsAs('profile', [
            Login::class,
            Actions::class,
            Starter::class,
            Religion::class,
            RelationStatus::class,
            Education::class,
            Health::class,
            HandDirection::class,
            Devotion::class,
            Charity::class
        ]);

        Blade::componentNamespace('sahifedp\\Profile\\Views\\Components','profile');
    }
}
