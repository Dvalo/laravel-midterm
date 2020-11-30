@extends('layouts.main')

@section('content')
    <div class="movie-single">
        <div class="container section-container">
            <div class="movie-poster">
                <img src="{{ asset('storage/'.$actors->image) }}" alt="poster" class="w-64 lg:w-96">
            </div>
            <div class="movie-details">
                <h2 class="movie-title">{{ $actors->name }}</h2>
                <div class="movie-details-wrapper">
                    <span>{{\Carbon\Carbon::parse($actors->date_of_birth)->format('d M, Y')}}</span>
                    <span class="mx-2">|</span>
                    <span class="mx-2">{{ $actors->birth_location }}</span>
                    <span class="mx-2">|</span>
                    <span class="mx-2">{{ $actors->gender }}</span>
                    <span class="mx-2">|</span>
                </div>

                <p class="movie-description">
                    {{ $actors->bio }}
                </p>

            </div>
        </div>
    </div>
    
    <div class="movie-cast container section-container">

        <h2 class="section-title">Known For</h2>
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