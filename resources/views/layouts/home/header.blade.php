<header class="header">
    <div class="container">
        <div class="header-area">
            <div class="logo">
                <a href="{{ route('home') }}"><img src="{{ asset('assets/img/logo.png') }}" alt="logo" /></a>
            </div>
            <div class="header-right">
                <form action="#">
                    <select>
                        <option value="Movies">Movies</option>
                        <option value="Movies">Movies</option>
                        <option value="Movies">Movies</option>
                    </select>
                    <input type="text"/>
                    <button><i class="icofont icofont-search"></i></button>
                </form>
                <ul>
                    @if (Route::has('login'))
                        @auth
                            <li><a class="login-popup" href="{{ url('/dashboard') }}">Dashboard</a></li>
                        @else
                            <li><a class="login-popup" href="{{ route('login') }}">{{ Auth::user->name }}</a></li>
                        @endauth

                    @endif

                </ul>
            </div>
            <div class="menu-area">
                <div class="responsive-menu"></div>
                <div class="mainmenu">
                    <ul id="primary-menu">
                        <li><a class="active" href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('home') }}">Movies</a></li>
                        <li><a href="{{ route('home') }}">Top Movies</a></li>
                        <li><a href="{{ route('home') }}">News</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
