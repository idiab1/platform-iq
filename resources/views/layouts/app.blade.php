<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> Platform IQ - @yield('title', 'Unknown Page') </title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">

    <!-- Font awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/fontawsome.all.css')}}">

    <!-- Bootstrap -->
    {{-- <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}"> --}}
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">


    {{-- Other styles --}}
    @yield('styles')
</head>
<body>
    <div id="app">
        <!---- Navbar --->
        @include('include.navbar', ['setting' => \App\Setting::first(['web_name'])])

        <!---- Main Content --->
        <main class="main-content py-4">
            <div class="container-fluid">
                @yield('content')
            </div>
        </main>
        <!---- End of Main Content --->

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- jQuery -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    {{-- Other scripts --}}
    @yield('scripts')
</body>
</html>
