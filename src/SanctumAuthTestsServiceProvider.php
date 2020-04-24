<?php

namespace JoshMoreno\SanctumAuthTests;

use Illuminate\Contracts\Validation\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Testing\TestResponse;
use Illuminate\Validation\ValidationException;
use JoshMoreno\SanctumAuthTests\Validation\TestValidationException;
use Symfony\Component\HttpFoundation\Cookie;

class SanctumAuthTestsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningUnitTests()) {
            $this->addMacros();
        }

    }

    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/stubs/ApiAuth' => base_path('tests/Feature/ApiAuth')
            ], 'tests');

            \Artisan::command('sanctumAuthTests:publish', function() {
               $this->call('vendor:publish', [
                   '--provider' => SanctumAuthTestsServiceProvider::class,
                   '--tag' => 'tests'
               ]);
            });
        }
    }

    protected function addMacros()
    {
        TestResponse::macro('getCookie', function (string $name) {
            return collect($this->headers->getCookies())->first(function (Cookie $cookie) use ($name) {
                return $cookie->getName() === $name;
            });
        });

        TestResponse::macro('getCookieValue', function (string $name) {
            $cookie = $this->getCookie($name);
            return $cookie ? $cookie->getValue() : null;
        });
    }
}
