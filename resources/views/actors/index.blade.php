@extends('layouts.main')

@section('content')

    <div class="container section-container">
        <div class="popular-actors">
            <h2 class="section-title">Popular Actors</h2>
            <div class="actor-wrapper grid-display">
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

    </div>
@endsection