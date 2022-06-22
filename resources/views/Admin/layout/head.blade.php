<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{isset($title) ? $title:"Hung Shop"  }}</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adtp123/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('adtp123/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adtp123/dist/css/adminlte.min.css') }}">
    @yield('css')
</head>