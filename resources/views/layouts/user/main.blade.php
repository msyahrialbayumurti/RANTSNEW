<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('assets/img/logo.png') }}" sizes="20x20" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('assets/templates/user/css/style.css') }}">
    
    <title>@yield('title')</title>

</head>

<body class="bg-gray-100"> 

    @include('layouts.user.navbar')
    @yield('content')    
    @include('layouts.user.footer')


</body>

</html>
