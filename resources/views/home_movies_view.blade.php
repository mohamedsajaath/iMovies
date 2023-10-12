@extends('layouts.home.app')

@section('content')
    {{--    {{ dd($movie) }}--}}
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area-content">
                        <h1>Movie Detailed Page</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="transformers-area">
        <div class="container">
            <div class="transformers-box">
                <div class="row flexbox-center">
                    <div class="col-lg-5 text-lg-left text-center">
                        <div class="transformers-content">
                            <img src="{{ asset($movie->thumbnail_image) }}" alt="about"/>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="transformers-content">
                            <h2>{{ $movie->name }}</h2>
                            <p>{{ $movie->genre }}</p>
                            <ul>
                                <li>
                                    <div class="transformers-left">
                                        Movie:
                                    </div>
                                    <div class="transformers-right">
                                        <a href="#">{{ $movie->name }}</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="transformers-left">
                                        Writer:
                                    </div>
                                    <div class="transformers-right">
                                        {{ $movie->writer }}
                                    </div>
                                </li>
                                <li>
                                    <div class="transformers-left">
                                        Director:
                                    </div>
                                    <div class="transformers-right">
                                        {{ $movie->director }}
                                    </div>
                                </li>
                                <li>
                                    <div class="transformers-left">
                                        Time:
                                    </div>
                                    <div class="transformers-right">
                                        {{ $movie->time }}
                                    </div>
                                </li>
                                <li>
                                    <div class="transformers-left">
                                        Release:
                                    </div>
                                    <div class="transformers-right">
                                        {{ $movie->release }}
                                    </div>
                                </li>
                                <li>
                                    <div class="transformers-left">
                                        Language:
                                    </div>
                                    <div class="transformers-right">
                                        {{ $movie->language }}
                                    </div>
                                </li>
                                <li>
                                    <div class="transformers-left">
                                        Casts:
                                    </div>
                                    <div class="transformers-right">
                                       @foreach($movie->casts as $cast)
                                           {{ $cast->name }} |
                                       @endforeach
                                    </div>
                                </li>

                                <li>
                                    <div class="transformers-left">
                                        Share:
                                    </div>
                                    <div class="transformers-right">
                                        <a href="#"><i class="icofont icofont-social-facebook"></i></a>
                                        <a href="#"><i class="icofont icofont-social-twitter"></i></a>
                                        <a href="#"><i class="icofont icofont-social-google-plus"></i></a>
                                        <a href="#"><i class="icofont icofont-youtube-play"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <section class="details-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="details-content">
                        <div class="details-overview">
                            <h2>Description</h2>
                            <p>{!! $movie->description !!}</p>
                        </div>

                        <div class="details-overview">
                            <h2>Comments</h2>
                            @foreach($movie->comments as $comment)
                                @if($comment->is_approved == 1)
                                    <div class="details-comment mb-4">
                                        <a class="theme-btn theme-btn2" href="#">{{ $comment->name }}</a>
                                        <p>{{ $comment->comment }}</p>
                                    </div>
                                @endif
                            @endforeach

                        </div>


                        <div class="details-reply">
                            <h2>Comments</h2>
                            <form action="{{ route('comment_create') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="select-container">
                                            <input type="text" placeholder="Name" name="name"/>
                                            <i class="icofont icofont-ui-user"></i>
                                        </div>
                                    </div>


                                    <div class="col-lg-8">
                                        <div class="textarea-container">
                                            <textarea placeholder="Type Here Message" name="comment"></textarea>
                                            <button><i class="icofont icofont-send-mail"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="movie_id" value="{{ $movie->id }}"/>
                                <button class="theme-btn" type="submit">Comment</button>
                            </form>
                        </div>

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
    </section><!-- details area end -->
@endsection
