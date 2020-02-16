<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                
                margin: 0;
            }

            .full-height {
                
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel Passport
                </div>

<div class="links">
                ----------------------------------------------<br>
composer require laravel/passport<br>
----------------------------------------------<br>
php artisan migrate<br>
----------------------------------------------<br>
php artisan passport:install<br>
----------------------------------------------<br>

User -> Model<br>
<br>
use Laravel\Passport\HasApiTokens;<br>
<br>
     use HasApiTokens, Notifiable;<br>
<br>
----------------------------------------------<br>

AuthServiceProvider -> Providers<br>
<br>
use Laravel\Passport\Passport;<br>
    <br>
    public function boot() -> Passport::routes();<br>
        <br>
----------------------------------------------<br>

cinfig -> auth -> guards->api->driver=>passport<br>
<br>
----------------------------------------------<br>
<br>
php artisan make:controller AuthController<br>
<br>
[CODE] in AuthController<br>
<br>
----------------------------------------------<br>
<br>
php artisan make:controller UserController<br>
<br>
[CODE] in UserController<br>
<br>
----------------------------------------------<br>

Acesso Auth => in Headers na requisiçao : Authorization -> Bearer token<br>
<br>
<br>
<br>
<br>
<br>
            </div>
            </div>
        </div>
    </body>
</html>
