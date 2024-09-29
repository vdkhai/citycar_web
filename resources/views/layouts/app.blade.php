<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Citicar') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ mix('mdb/js/mdb.min.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> --}}
    
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ mix('mdb/css/mdb.min.css') }}" rel="stylesheet">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        body {
            overflow-anchor: none;
        }

        body {
            line-height: 1;
        }

        body {
            background: #fff;
            -webkit-font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
            -webkit-tap-highlight-color: rgba(204,204,204,.3);
        }

        body, button {
            font-family: Roboto,微软雅黑,Microsoft Yahei,Helvetica,Helvetica Neue,segoe UI Light,Kozuka Gothic Pro,sans-serif;
        }

        body, html {
            height: 100%;
        }

        a, a:focus, a:hover {
            color: inherit;
            text-decoration: none;
            cursor: pointer;
        }

        .d-flex {
            display: flex!important;
        }
        .flex-wrap {
            flex-wrap: wrap!important;
        }
        .justify-center {
            justify-content: center!important;
        }
        .no-gutters {
            margin-right: 0;
            margin-left: 0;
        }
        .row {
            display: flex;
            flex-wrap: wrap;
            flex: 1 1 auto;
            margin-right: -12px;
            margin-left: -12px;
        }
        
    </style>
</head>
<body>
    <div id="app">
        @include('layouts.header')

        <main class="py-4">
            @yield('content')
        </main>

        @include('layouts.footer')
    </div>
</body>
</html>
