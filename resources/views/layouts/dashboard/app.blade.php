<!DOCTYPE html>
<html lang="en">

@include('layouts.dashboard.head')

<body id="page-top">
<div id="wrapper">
    @include('layouts.dashboard.sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            @include('layouts.dashboard.header')
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        @include('layouts.dashboard.footer')
    </div>
</div>


<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
@include('layouts.dashboard.scripts')
@stack('script')
</body>
</html>
