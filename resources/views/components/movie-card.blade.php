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