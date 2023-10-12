@extends('layouts.home.app')

@section('content')

    <section class="hero-area" id="home">
        <div class="container">
            <div class="hero-area-slider">
                @foreach($movies as $movie)
                    @if($movie->top_section == 1)
                        <div class="row hero-area-slide">
                            <div class="col-lg-6 col-md-5">
                                <div class="hero-area-content">
                                    <img src="{{ asset($movie->thumbnail_image) }}" alt="about"/>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-7">
                                <div class="hero-area-content pr-50">
                                    <h2>{{ $movie->name }}</h2>
                                    <div class="review">
                                        <div class="author-review">
                                            @for($i = 0;$i < $movie->rating;$i++)
                                                <i class="icofont icofont-star"></i>
                                            @endfor

                                        </div>
                                        <h4>{{ Count($movie->comments) }} Comments</h4>
                                    </div>
                                    <p>{{ substr($movie->description, 0, 200) }}....</p>
                                    <h3>Cast:</h3>
                                    <div class="slide-cast">
                                        @foreach($movie->casts as $cast)
                                            <div class="single-slide-cast">
                                                <img src="{{ $cast->image }}" alt="{{ $cast->name }}"/>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                                <div class="slide-trailor mb-5">
                                    <a class="theme-btn theme-btn2"
                                       href="{{ Url('/home/movies/view/'.$movie->id) }}">
                                        Read More...</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="hero-area-thumb">
                <div class="thumb-prev">
                    @foreach($movies as $index => $movie)
                        @if($index < 1)
                            @if($movie->top_section == 1)
                                <div class="row hero-area-slide">
                                    <div class="col-lg-6 col-md-5">
                                        <div class="hero-area-content">
                                            <img src="{{ asset($movie->thumbnail) }}" alt="about"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7">
                                        <div class="hero-area-content pr-50">
                                            <h2>{{ $movie->name }}</h2>
                                            <div class="review">
                                                <div class="author-review">
                                                    @for($i = 0;$i < $movie->rating;$i++)
                                                        <i class="icofont icofont-star"></i>
                                                    @endfor

                                                </div>
                                                <h4>{{ $movie->rating }} Comments</h4>
                                            </div>
                                            <p>{{  substr($movie->description, 0, 200) }}....</p>
                                            <h3>Cast:</h3>
                                            <div class="slide-cast">
                                                @foreach($movie->casts as $cast)
                                                    <div class="single-slide-cast">
                                                        <img src="{{ $cast->image }}" alt="{{ $cast->name }}"/>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="slide-trailor mb-5">
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    @endforeach
                </div>
                <div class="thumb-next">
                    @foreach($movies as $index => $movie)
                        @if($index < 1)
                            @if($movie->top_section == 1)
                                <div class="row hero-area-slide">
                                    <div class="col-lg-6 col-md-5">
                                        <div class="hero-area-content">
                                            <img src="{{ asset($movie->thumbnail) }}" alt="about"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7">
                                        <div class="hero-area-content pr-50">
                                            <h2>{{ $movie->name }}</h2>
                                            <div class="review">
                                                <div class="author-review">
                                                    @for($i = 0;$i < $movie->rating;$i++)
                                                        <i class="icofont icofont-star"></i>
                                                    @endfor

                                                </div>
                                                <h4>{{ $movie->rating }} Comments</h4>
                                            </div>
                                            <p>{{  substr($movie->description, 0, 200) }}....</p>
                                            <h3>Cast:</h3>
                                            <div class="slide-cast">
                                                @foreach($movie->casts as $cast)
                                                    <div class="single-slide-cast">
                                                        <img src="{{ $cast->image }}" alt="{{ $cast->name }}"/>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="slide-trailor mb-5">
                                            <h3>Watch Trailer</h3>
                                            <a class="theme-btn theme-btn2" href="#">
                                                <i class="icofont icofont-play"></i>
                                                Tickets</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="portfolio-area pt-60">
        <div class="container">
            <div class="row flexbox-center">
                <div class="col-lg-6 text-center text-lg-left">
                    <div class="section-title">
                        <h1><i class="icofont icofont-movie"></i> Spotlight This Month</h1>
                    </div>
                </div>
                <div class="col-lg-6 text-center text-lg-right">
                    <div class="portfolio-menu">
                        <ul>
                            <li data-filter="*" class="active">Latest</li>
                            <li data-filter=".soon">Coming Soon</li>
                            <li data-filter=".top">Top Rated</li>
                            <li data-filter=".released">Recently Released</li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-lg-9">
                    <div class="row portfolio-item">
                        @foreach($movies->reverse() as $index => $movie)
                            @if($index < 6)
                                <div class="col-md-4 col-sm-6
                            @if($movie->coming_soon == 1)
                                    soon
                            @endif
                            @if($movie->rating == 5 || $movie->rating == 4)
                                    top
                            @endif
                            released">
                                    <div class="single-portfolio">
                                        <div class="single-portfolio-img">
                                            <img src="{{ asset($movie->poster_image) }}" alt="portfolio"/>
                                            <a href="{{ Url('/home/movies/view/'.$movie->id) }}" class="popup-youtube">
                                                <i class="icofont icofont-ui-browser"></i>
                                            </a>
                                        </div>
                                        <div class="portfolio-content movie-text" >
                                            <a href="{{ Url('/home/movies/view/'.$movie->id) }}">
                                            <h4>{{ substr($movie->name, 0, 10) }}...</h4>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-3 text-center text-lg-left">
                    <div class="portfolio-sidebar">
                        <img src="{{ asset('assets/img/sidebar/sidebar1.png') }}" alt="sidebar"/>
                        <img src="{{ asset('assets/img/sidebar/sidebar2.png') }}" alt="sidebar"/>
                        <img src="{{ asset('assets/img/sidebar/sidebar3.png') }}" alt="sidebar"/>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="video ptb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title pb-20">
                        <h1><i class="icofont icofont-film"></i> Trailers & Videos</h1>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-md-9">
                    @foreach($movies->reverse() as $index => $movie)
                        @if($index < 1)
                            <div class="video-area">
                                <img src="{{ asset($movie->poster_image) }}" alt="video"/>
                                <a href="{{ $movie->link }}" class="popup-youtube">
                                    <i class="icofont icofont-ui-play"></i>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="col-md-3">
                    <div class="row">
                        @foreach($movies->reverse() as $index => $movie)
                            @if($index < 2)

                                <div class="col-md-12 col-sm-6">
                                    <div class="video-area">
                                        <img src="{{ asset($movie->thumbnail_image) }}" alt="video"/>
                                        <a href="{{ $movie->link }}" class="popup-youtube">
                                            <i class="icofont icofont-ui-play"></i>
                                        </a>
                                    </div>
                                </div>

                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
