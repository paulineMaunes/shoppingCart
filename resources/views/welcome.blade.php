<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LARAVEL Shopping Cart</title>
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 80px;
        }

        .brrr {
            font-size: 20px;
        }




    </style>
</head>
<body>
<div class="flex-center position-ref full-height md-col-8">
    @if (Route::has('login'))
        <div class="content">
            @if (Auth::check())
                <div class="title">LARAVEL Shopping Cart</div>
                <div class="top-right links">
                    <a href="{{ url('/home') }}">Home</a>
                </div>
            @else <div class="title">LARAVEL Shopping Cart</div>
            <div>
                <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">{{ csrf_field() }}
                    <div class="form-group animated rubberBand{{ $errors->has('email') ? ' has-error' : '' }}">
                        <strong>
                            <input id="email" type="email" placeholder="Username"  class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                        </strong>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <strong>
                            <input id="password" placeholder="Password" type="password" class="form-control" name="password" required>
                        </strong>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
            @endif
        </div>
    @endif
</div>
</body>
</html>
