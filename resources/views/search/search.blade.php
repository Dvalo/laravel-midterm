@extends('layouts.main')

@section('content')
    <div class="container section-container">
        <div class="matching-movies">
            <h2 class="section-title">Matching Movies</h2>
            <div class="movie-wrapper grid-display">
                @foreach ($movies as $movie)
                    <div class="card-tile">
                        <a href="{{ route('displaymovie',["id"=>$movie->id,"name"=>str_slug($movie->mov_title) ]) }}">
                            <img src="{{ asset('storage/'.$movie->mov_cover) }}" alt="poster" class="card-image">
                        </a>
                        <div class="card-details">
                            <a href="{{ route('displaymovie',["id"=>$movie->id,"name"=>str_slug($movie->mov_title) ]) }}" class="card-title">{{ $movie->mov_title }}</a>
                            <div class="flex items-center text-gray-400 text-sm mt-1">
                                <div class="movie-rel-date">
                                    <span>{{\Carbon\Carbon::parse($movie->mov_rel_date)->format('d M, Y')}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div> <!-- end pouplar-movies -->

        <br><br><br><br>
        <div class="matching-actors">
            <h2 class="section-title">Matching Actors</h2>
            <div class="movie-wrapper grid-display">
                @foreach ($actors as $actor)
                    <div class="actor card-tile">
                        <a href="{{ route('displayactor',["id"=>$actor->id,"name"=>str_slug($actor->name) ]) }}">
                            <img src="{{ asset('storage/'.$actor->image) }}" alt="profile image" class="card-image">
                        </a>
                        <div class="card-details">
                            <a href="{{ route('displayactor',["id"=>$actor->id,"name"=>str_slug($actor->name) ]) }}" class="card-title">
                            {{ $actor->name }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div> <!-- end pouplar-actors -->


        <br><br><br><br>
        <div class="matching-directors">
            <h2 class="section-title">Matching Directors</h2>
            <div class="movie-wrapper grid-display">
                @foreach ($directors as $director)
                    <div class="actor card-tile">
                        <a href="{{ route('displaydirector',["id"=>$director->id,"name"=>str_slug($director->dir_name) ]) }}">
                            <img src="{{ asset('storage/'.$director->dir_image) }}" alt="profile image" class="card-image">
                        </a>
                        <div class="card-details">
                            <a href="{{ route('displaydirector',["id"=>$director->id,"name"=>str_slug($director->dir_name) ]) }}" class="card-title">
                            {{ $director->dir_name }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div> <!-- end pouplar-directors -->

    </div>
@endsection