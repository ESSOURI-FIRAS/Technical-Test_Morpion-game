
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/board.css') }}">
    
</head>
<body>
    <div class="container">

        @yield('content')
        
    </div>
   
    
     <!-- Include scripts -->
     <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/laravel-echo/1.11.3/echo.iife.min.js"></script>
     <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
     <!--<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>-->
     <script src="{{ asset('js/board.js') }}"></script>
</body>
</html>
