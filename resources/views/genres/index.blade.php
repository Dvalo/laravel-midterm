@extends('layouts.main')

@section('content')

    <div class="container section-container">
        <div class="popular-genres">
            <h2 class="section-title">Popular Directors</h2>
            <div class="actor-wrapper grid-display">
                @foreach ($genres as $genre)
                    <a href="{{ route('displaymoviebygenre',["id"=>$genre->id, "genre"=>str_slug($genre->gen_title)]) }}" style="text-decoration: none;">
                        <div class="card-tile p-2">
                            <div class="card-title genre-card">{{ $genre->gen_title }}</div>
                        </div>
                    </a>
                @endforeach

                
            </div>
        </div> <!-- end pouplar-genres -->

    </div>
@endsection