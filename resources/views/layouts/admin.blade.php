<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    
<!--     Fonts and icons     -->
{{-- <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" /> --}}

<!-- Nucleo Icons -->
{{-- <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="./assets/css/nucleo-svg.css" rel="stylesheet" /> --}}

<!-- Font Awesome Icons -->
{{-- <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script> --}}

<!-- Material Icons -->
{{-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet"> --}}

<!-- CSS Files -->



<link rel="stylesheet" href="/css/style.min.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
 <div id="admin">
     {{-- @include('partials.admin.navbar') --}}
     
    @include('partials.admin.sidebar')

    <div id="main">
         
        <main class="container pt-2">
            @yield('content')
        </main>
    </div>

 </div>

  <!--Main layout-->
</body>

</html>
