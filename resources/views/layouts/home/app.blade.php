<!DOCTYPE HTML>
<html lang="zxx">

@include('layouts.home.app')

<body>
<!-- Page loader -->
<div id="preloader"></div>
<!-- header section start -->
@include('layouts.home.header')

@yield('content')

@include('layouts.home.footer')
@include('layouts.home.scripts')
</body>

</html>
