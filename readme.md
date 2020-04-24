# Basic auth tests for Laravel's Sanctum
This is for sanctum `^2.0.0`. Follow their [docs](https://laravel.com/docs/7.x/sanctum) as usual.

Quick note, ownership of these tests is yours. You're free to edit them however you'd like. Add more tests, remove, refactor...whatever you see fit. After installing, you're free to remove the package!

## Installation
```bash
composer require joshmoreno/sanctum-auth-tests 

php artisan sanctumAuthTests:publish
# same thing as
# php artisan vendor:publish --provider="JoshMoreno\SanctumAuthTests\SanctumAuthTestsServiceProvider" --tag="tests"

# you got what you came for, no need to keep the package around. Bye 👋
composer remove joshmoreno/sanctum-auth-tests
```

## Customize
Reminder, you're free to do whatever you want with the tests after publishing.

By default, the tests assume you're using the typical laravel auth routes for the following:
- login - `route('login')`
- logout - `route('logout')`
- register - `route('register')`
- resend verification email - `route('verification.resend')` 
- verify email - `verification.verify // not named in laravel ☹️`
- forgot password - `route('password.email')`
- update password - `route('password.update')`

You can find all of these and more in `tests/Feature/ApiAuth/ApiAuthTestCase.php`.
