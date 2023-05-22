<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('adminAssets/commonAssets/css/main.css')}}" type="text/css">
    @yield('cssLink')

<body>
    @include('admin.include.header')
    @include('admin.include.left_menu')

        <main style="margin-top: 12rem; margin-left: 21.5rem; font-family: 'Mada-Regular';">
            @yield('content')
        </main>
    <script src="{{asset("adminAssets/commonAssets/js/scripts.js")}}"></script>
</body>
</html>
