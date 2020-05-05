<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>FIND LOST</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-image: url("\snowleopard.jpg");

            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
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

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 200px;
            color: black;

        }

        .links>a {
            color: white;
            padding: 0 25px;
            font-size: 20px;
            font-weight: bold;
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
            <a href="{{ url('/home') }}" style="color:black">Home</a>
            @else
            <a href="{{ route('login') }}" style="color:black">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" style="color:black">Register</a>
            @endif
            <a href="{{ url('items') }}" style="color:black">View Lost Items</a>
            @endauth
        </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                FIND LOST
            </div>

            <div class="links">
                <a href="{{ url('items') }}">Welcome to the find lost website. Find your lost items.</a>

            </div>
        </div>
    </div>
</body>

</html>