<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> Platform IQ - @yield('title', 'Unknown Page') </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Font awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome/css/fontawsome.all.css')}}">

    {{-- Other styles --}}
    @yield('styles')
</head>
<body>
    <div id="app">
        <!---- Navbar --->
        @include('include.navbar', ['setting' => \App\Setting::where('id', 1)->first(['id'])])

        <!---- Main Content --->
        <main class="main-content py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>
        <!---- End of Main Content --->

    </div>

    {{-- Other scripts --}}
    @yield('scripts')
</body>
</html>
