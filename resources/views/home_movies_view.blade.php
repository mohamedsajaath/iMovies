@extends('layouts.home.app')

@section('content')
{{--    {{ dd($movie[0][0]) }}--}}
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
    </section><!-- breadcrumb area end -->
    <!-- transformers area start -->
    <section class="transformers-area">
        <div class="container">
            <div class="transformers-box">
                <div class="row flexbox-center">
                    <div class="col-lg-5 text-lg-left text-center">
                        <div class="transformers-content">
                            <img src="{{ asset($movie[0]->thumbnail_image) }}" alt="about" />
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="transformers-content">
                            <h2>{{ $movie[0]->name }}</h2>
                            <p>{{ $movie[0]->genre }}</p>
                            <ul>
                                <li>
                                    <div class="transformers-left">
                                        Movie:
                                    </div>
                                    <div class="transformers-right">
                                        <a href="#">{{ $movie[0]->name }}</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="transformers-left">
                                        Writer:
                                    </div>
                                    <div class="transformers-right">
                                        Stephen McFeely, Christopher Markus
                                    </div>
                                </li>
                                <li>
                                    <div class="transformers-left">
                                        Director:
                                    </div>
                                    <div class="transformers-right">
                                        Joe Johnston
                                    </div>
                                </li>
                                <li>
                                    <div class="transformers-left">
                                        Time:
                                    </div>
                                    <div class="transformers-right">
                                        {{ $movie[0]->time }}
                                    </div>
                                </li>
                                <li>
                                    <div class="transformers-left">
                                        Release:
                                    </div>
                                    <div class="transformers-right">
                                        {{ $movie[0]->release }}
                                    </div>
                                </li>
                                <li>
                                    <div class="transformers-left">
                                        Language:
                                    </div>
                                    <div class="transformers-right">
                                        {{ $movie[0]->Language }}
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
    </section><!-- transformers area end -->
    <!-- details area start -->
    <section class="details-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="details-content">
                        <div class="details-overview">
                            <h2>Description</h2>
                            <p>{!! $movie[0]->description !!}</p>
                        </div>

                        <div class="details-comment">
                            <a class="theme-btn theme-btn2" href="#">Josh</a>
                            <p>You may use these HTML tags and attributes: You may use these HTML tags and attributes: You may use these HTML tags and attributes: </p>
                        </div>
                        <div class="details-comment">
                            <a class="theme-btn theme-btn2" href="#">Ann</a>
                            <p>You may use these HTML tags and attributes: You may use these HTML tags and attributes: You may use these HTML tags and attributes: </p>
                        </div>
                        <div class="details-comment">
                            <a class="theme-btn theme-btn2" href="#">Malan</a>
                            <p>You may use these HTML tags and attributes: You may use these HTML tags and attributes: You may use these HTML tags and attributes: </p>
                        </div>

                        <div class="details-reply">
                            <h2>Comments</h2>
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="select-container">
                                            <input type="text" placeholder="Name"/>
                                            <i class="icofont icofont-ui-user"></i>
                                        </div>
                                    </div>


                                    <div class="col-lg-8">
                                        <div class="textarea-container">
                                            <textarea placeholder="Type Here Message"></textarea>
                                            <button><i class="icofont icofont-send-mail"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <a class="theme-btn" href="#">Comment</a>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 text-center text-lg-left">
                    <div class="portfolio-sidebar">
                        <img src="{{ asset('assets/img/sidebar/sidebar1.png') }}" alt="sidebar" />
                        <img src="{{ asset('assets/img/sidebar/sidebar2.png') }}" alt="sidebar" />
                        <img src="{{ asset('assets/img/sidebar/sidebar3.png') }}" alt="sidebar" />
                    </div>
                </div>
            </div>
        </div>
    </section><!-- details area end -->
@endsection
