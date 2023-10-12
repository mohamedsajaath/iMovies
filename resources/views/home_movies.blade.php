@extends('layouts.home.app')

@section('content')
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area-content">
                        <h1>Movies</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="portfolio-area pt-60">
        <div class="container pb-5">
            <div class="row flexbox-center">
                <div class="col-lg-6 text-center text-lg-left">
                    <div class="section-title">
                        <h1><i class="icofont icofont-movie"></i>All Movies</h1>
                    </div>
                </div>
                <div class="col-lg-6 text-center text-lg-right">
                    <div class="portfolio-menu">
                        <ul>
                            <li data-filter="*" class="active">Latest</li>
                            <li data-filter=".soon">Comming Soon</li>
                            <li data-filter=".top">Top Rated</li>
                            <li data-filter=".released">Recently Released</li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row portfolio-item">
                        @foreach($movies->reverse() as $index => $movie)

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

                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section><!-- portfolio section end -->

@endsection
