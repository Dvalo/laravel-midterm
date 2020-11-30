@extends('layouts.main')

@section('content')
    <div class="container section-container">
        <div class="popular-movies">
            <h2 class="section-title">Popular Movies</h2>
            <div class="movie-wrapper grid-display">
                @foreach ($movies as $movie)
                    @component('components.movie-card', ['movie' => $movie])

                    @endcomponent
                @endforeach
            </div>
        </div> <!-- end pouplar-movies -->

    </div>
@endsection