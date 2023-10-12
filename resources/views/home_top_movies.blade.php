@extends('layouts.home.app')

@section('content')
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area-content">
                        <h1>Top Movies</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="portfolio-area pt-60">
        <div class="container pb-5">
            <hr/>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row portfolio-item">
                        @foreach($movies->reverse() as $index => $movie)

                            <div class="col-md-4 col-sm-6">
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
    </section>

@endsection
