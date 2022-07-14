<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         

        <title>TODOLIST</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->

        <link href="css/app.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                font-family: Helvetica, Arial, sans-serif;
                font-size: 15px ;
                padding: 20px 0;            
            }
        </style>
    </head>
    <body>
    <img src="{{URL::asset('/img/1.png')}}" width="800">
        <div class="row justify-content-center">
            <div class="col-md-2">
                <div class="card-header" ><h1>WELCOME</h1></div>
                    <div class="card-body" style="background-color: DarkSlateGrey;">

                    @if (Route::has('login'))
                    @auth

                                        <a href="{{ url('/home') }}"><b><h3>Home</h3></b></a><br>

                            @else

                               
                                            <a href="{{ route('login') }}" ><b><h3>Log in</h3></b></a><br>

                                            @if (Route::has('register'))
                                                <a href="{{ route('register') }}" ><b><h3>Register</h3></b></a><br>
                                            @endif
                            @endauth
                            @endif
                    </div>        
                </div>
            </div>
            
        </div>                        
    </body>

   
</html>
