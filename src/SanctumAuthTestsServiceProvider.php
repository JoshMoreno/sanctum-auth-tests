<?php

namespace JoshMoreno\SanctumAuthTests;

use Illuminate\Support\ServiceProvider;

class SanctumAuthTestsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //
    }

    public function register()
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->publishes([
            __DIR__.'/stubs/ApiAuth' => base_path('tests/Feature/ApiAuth'),
        ], 'tests');

        \Artisan::command('sanctumAuthTests:publish', function () {
            $this->call('vendor:publish', [
                '--provider' => SanctumAuthTestsServiceProvider::class,
                '--tag' => 'tests',
            ]);
        });
    }
}
