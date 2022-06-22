<!DOCTYPE html>
<html lang="en">
<head>
    @include('Home/layout/head')
</head>
<body>
    @include('home/layout/top-header')
    <div class="container-fluid">
        <div id="header">
            @yield('menu')
            @yield('banner')
            @yield('formSearch')
        </div>
        <hr>
        <hr>
        <div id="content">
            @yield('content')
        </div>
        <footer>
            @include('home/layout/footer')
        </footer>
    </div>
</body>
</html>
