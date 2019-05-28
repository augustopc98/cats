<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset = "UTF-8">
        <title>Cats DB</title>
        <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
        </head>
        <body>
            <div class="container">
                @yield('header')
                </div>
                @if(Session::has('message'))
                    <div class="alert alert-sucess">
                        {{Session::get('message')}}
                    </div>
                @endif
            @yield('content')
            </div>
        </body>
    </html>
   