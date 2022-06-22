<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
{{-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
<meta name="viewport" content="width=device-width, user-scalable=no" />
<title>{{ isset($title) ? $title : 'Trang chu' }}</title>
<link href="{{ asset('adtp123/dist/css/adminlte.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('adtp123\css\home\index.css') }}">
<link rel="stylesheet" href="{{ asset('adtp123\css\checkbox\checkbox-toggle.css') }}">
<link rel="stylesheet" href="{{ asset('adtp123\css\home\menu.css') }}">
<link rel="stylesheet" href="{{ asset('adtp123\css\home\ProductList.css') }}">
@yield('css')