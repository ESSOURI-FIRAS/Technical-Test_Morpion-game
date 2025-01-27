<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>
  
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        .full-height {
          height: 90vh; /* Hauteur égale à 100% de la hauteur de l'écran */
          display: flex; /* Optionnel : permet de centrer le contenu */
        }
        .custom-navbar {
        background-color:#d6f8ff;
; 
        }

      </style>
</head>
<body>
    <div class="container">

        @yield('content')
        
    </div>
   
    
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>