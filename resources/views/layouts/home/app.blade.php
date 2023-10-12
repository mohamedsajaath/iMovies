<!DOCTYPE HTML>
<html lang="zxx">

@include('layouts.home.head')
<body>
<div id="preloader"></div>
@include('layouts.home.header')
@yield('content')
@include('layouts.home.footer')
@include('layouts.home.scripts')
</body>

</html>
