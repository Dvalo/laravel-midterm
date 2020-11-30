@extends('layouts.main')

@section('content')

    <div class="container section-container">
        <div class="popular-directors">
            <h2 class="section-title">Popular Directors</h2>
            <div class="actor-wrapper grid-display">
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