<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="w-100 min-vh-100">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">TEST</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home')}}">Home</a>
                </li>
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{route('addproduct')}}">Add Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('addcategory')}}">Add Category</a>
                </li>
                <form class="nav-item" method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();">
                        Logout
                    </a>
                </form>
                @endauth
                @guest
                <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">Log in</a>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
@yield('section')
</body>
</html>
