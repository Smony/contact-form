<?php

namespace Smony\Contact;

use Illuminate\Support\ServiceProvider;

class ContactServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');

        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        $this->mergeConfigFrom(
            __DIR__ . '/config/contact.php',
            'contact'
        );

        $this->loadViewsFrom(
            __DIR__ . '/views',
            'contact'
        );

        $this->loadTranslationsFrom(
            __DIR__ . '/resources/lang',
            'contact'
        );

        $this->publishes([
            __DIR__.'/views' => resource_path('views/contact'),
            __DIR__ . '/config/contact.php' => config_path('contact.php'),
            __DIR__.'/resources/lang' => resource_path('lang'),

        ], 'contact');

//        $this->publishes([
//            __DIR__.'/views' => resource_path('views/contact'),
//        ], 'contact');

//        $this->publishes([
//            __DIR__ . '/config/contact.php' => config_path('contact.php'),
//        ], 'contact');

//        $this->publishes([
//            __DIR__.'/resources/lang' => resource_path('lang'),
//        ], 'contact');

        $this->commands([
            Console\ContactCommand::class,
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//        dd($this->app->getLocale());
    }
}
