@extends('layouts.main')

@section('content')
    <div class="movie-single">
        <div class="container section-container">
            <div class="movie-poster">
                <img src="{{ asset('storage/'.$movies->mov_cover) }}" alt="poster" class="w-64 lg:w-96">
                <div class="watch-trailer" data-izimodal-open="#modal-iframe">WATCH TRAILER</div>
            </div>
            <div class="movie-details">
                <h2 class="movie-title">{{ $movies->mov_title }}</h2>
                <div class="movie-details-wrapper">
                    <span class="ml-1">{{ $movies->mov_length }} minutes</span>
                    <span class="mx-2">|</span>
                    <span>{{\Carbon\Carbon::parse($movies->mov_rel_date)->format('d M, Y')}}</span>
                    <span class="mx-2">|</span>
                    <span>{{ $movies->mov_rel_country }}</span>
                    <span class="mx-2">|</span>
                    <div class="movie-genres">
                        @foreach ($genres->genres as $genre)
                    <a href="{{ route('displaymoviebygenre',["id"=>$genre->id, "genre"=>str_slug($genre->gen_title)]) }}" class="movie-genre" ">
                        <span>{{ $genre->gen_title }}</span>
                    </a>
                @endforeach
                    </div>
                </div>

                <p class="movie-description">
                    {{ $movies->mov_desc}}
                </p>

            </div>


        </div>
    </div> <!-- end movie-info -->

    <div class="movie-cast"> <!-- start movie-cast -->
        <div class="container section-container">
            <h2 class="section-title">Directed By</h2>
            <div class="movie-cast-wrapper">
                @foreach ($directors->directors as $director)
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

            <h2 class="section-title">Cast</h2>
            <div class="movie-cast-wrapper grid-display slider-nav">
                @foreach ($actors->actors as $actor)
                    <div class="actor card-tile">
                        <a href="{{ route('displayactor',["id"=>$actor->id,"name"=>str_slug($actor->name) ]) }}">
                            <img src="{{ asset('storage/'.$actor->image) }}" alt="profile image" class="card-image">
                        </a>
                        <div class="card-details">
                            <a href="{{ route('displayactor',["id"=>$actor->id,"name"=>str_slug($actor->name) ]) }}" class="card-title">
                            {{ $actor->name }}</a>
                            <div class="small">{{ $actor->pivot->role }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div> <!-- end movie-cast -->

    <div class="similar-movies container section-container"> 

        <h2 class="section-title">Comments</h2>
        <div class="comments_movies_wrapper">
            <div class="comments_wrapper">
                @foreach($comments->comments as $comment)
                    <div class="display-comment">
                        <strong>{{ $comment->user->name }}</strong>
                        <p>{{ $comment->comment_content }}</p>
                    </div>
                @endforeach
                @auth
                <form action="{{ route('storecomment') }}" method="POST">
                    @csrf
                    <div class="post-comment-wrapper">
                        <input type="text" name="comment_content" class="form-control" />
                        <input type="hidden" name="movies_id" value="{{ $movies->id }}" />

                        <button class="btn btn-primary" value="Reply">Post Comment</button>
                    </div>
                </form>
                @endauth
            </div>
            <br />
            <h2 class="section-title">Similar Movies</h2>
            <div class="similar-movies-wrapper grid-display slider-nav">
                @foreach ($similarMovies as $sm)
                    <div class="card-tile">
                        <a href="{{ route('displaymovie',["id"=>$sm->id,"name"=>str_slug($sm->mov_title) ]) }}">
                            <img src="{{ asset('storage/'.$sm->mov_cover) }}" alt="poster" class="card-image">
                        </a>
                        <div class="card-details">
                            <a href="{{ route('displaymovie',["id"=>$sm->id,"name"=>str_slug($sm->mov_title) ]) }}" class="card-title">{{ $sm->mov_title }}</a>
                            <div class="flex items-center text-gray-400 text-sm mt-1">
                                <div class="movie-rel-date">
                                    <span>{{\Carbon\Carbon::parse($sm->mov_rel_date)->format('d M, Y')}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div> <!-- end similar-movies -->
    </div>

    <div id="modal-iframe" data-izimodal-iframeurl="{{ $movies->mov_trailer}}"></div>

@endsection

@section('custom-script')
<script>
    $(function() {
         $('.slider-nav').slick({
           slidesToShow: 4,
           slidesToScroll: 1,
           asNavFor: '.slider-for',
           dots: false,
           focusOnSelect: true
         });
         $("#modal-iframe").iziModal({
            width: 1280,
            iframeHeight: 800,
            iframe: true
        });
    });
</script>
@endsection