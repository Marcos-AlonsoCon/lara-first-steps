{{-- THIS LAYOUT FILE IS THE MASTER LAYOUT FOR ALL THE DASHBOARD VIEWS --}}

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

    <!-- Page Heading -->
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            
        </div>
    </header>
<body>
    {{-- WHEN A POST METHOD IS EXECUTED, THIS SHOWS THE CONFIRMATION MESSAGE --}}
    @if (session('status'))
        {{ session('status') }}
    @endif

    <div class="container">
        <div class="card card-white mt-5">
            @yield('content')
        </div>
    </div>

</body>
</html>