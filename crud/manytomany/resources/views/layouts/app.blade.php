<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/fontawesome.all.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/app.css')}}" rel="stylesheet" />
    @yield('styles')
</head>

<body>
    <header>
        @include('../includes/menu')
    </header>
    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>
    <footer>
    </footer>
    <script src="{{ asset('js/bootstrap.bundle.min.js')}}">
    </script>
    <script src="{{ asset('js/fontawesome.all.min.js')}}">
    </script>
    @yield('scripts')
</body>
</html>