@extends('layouts.main')

@section('content')
    <div class="movie-single">
        <div class="container section-container">
            <div class="movie-poster">
                <img src="{{ asset('storage/'.$directors->dir_image) }}" alt="poster" class="w-64 lg:w-96">
            </div>
            <div class="movie-details">
                <h2 class="movie-title">{{ $directors->dir_name }}</h2>

                <p class="movie-description">
                    {{ $directors->bio }}
                </p>

            </div>
        </div>
    </div>
    
    <div class="movie-cast container section-container">

        <h2 class="section-title">Has Directed</h2>
        <div class="movie-cast-wrapper grid-display">
            @foreach ($movies as $movie)
                <div class="actor card-tile">
                    <a href="{{ route('displaymovie',["id"=>$movie->id,"name"=>str_slug($movie->mov_title) ]) }}">
                        <img src="{{ asset('storage/'.$movie->mov_cover) }}" alt="profile image" class="card-image">
                    </a>
                    <div class="card-details">
                        <a href="{{ route('displaymovie',["id"=>$movie->id,"name"=>str_slug($movie->mov_title) ]) }}" class="card-title">
                        {{ $movie->mov_title }}</a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection