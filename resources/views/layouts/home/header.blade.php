<header class="header">
    <div class="container">
        <div class="header-area">
            <div class="logo">
                <a href="{{ route('home') }}" style="text-decoration: none;"><h2><b>iMovie</b></h2></a>
            </div>
            <div class="header-right">
                <form action="#" style="visibility: hidden;">
                    <select>
                        <option value="Movies">Movies</option>
                        <option value="Movies">Movies</option>
                        <option value="Movies">Movies</option>
                    </select>
                    <input type="text"/>
                    <button><i class="icofont icofont-search"></i></button>
                </form>
                <ul>
                    {{--<li><a href="#">Welcome Guest!</a></li>--}}
                    <li><a href="{{ route('login') }}">Login</a></li>
                </ul>
            </div>
            <div class="menu-area">
                <div class="responsive-menu"></div>
                <div class="mainmenu">
                    <ul id="primary-menu">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('home_movies') }}">Movies</a></li>
                        <li><a href="{{ route('home_top_movies') }}">Top Movies</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
