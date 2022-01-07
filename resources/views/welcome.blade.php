<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
         </div>
        
         <h1 style="padding-bottom:20px;font-size: 80px;text-align:center;font-family: 'Spline Sans', sans-serif;">DEBATE<br>FORUM</h1>
         <Div class="container">
            <h3 style="padding-bottom:20px;font-size: 40px;text-align:center;">
                Popular Discussions ✦
            </h3>
         </Div>


         <div style="padding-right: 20px;padding-left:20px;" class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div style="margin-bottom:30px;"></div>
                    
                        @foreach($motion as $motion)

                        <div class="container">
                            <ul class="list-group list-group-flush">
                                <div class="row">
                                    <div class="col">
                                        <a href="{{url('welcome/'.$motion->motionID)}}">
                                            <li class="list-group-item">{{$motion->motionName}}
                                        </a>
                                        <P>{{$motion->motionDescription}}</P>
                                        </li>
                                    </div>
                                </div>
                            </ul>
                        </div>

                        @endforeach
                </div>
            </div>
        </div>
    </div>

    </body>
</html>
