<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Movies;
use App\Actors;
use App\Directors;
use App\MovieDirection;
use App\MovieGenres;
use App\MovieCast;
use App\Genres;

use Illuminate\Http\Request;
use willvincent\Rateable\Rateable;

class MovieController extends Controller
{
    public function index() {
        $movies = Movies::get();
        return view("movies.index",["movies"=>$movies]);
    }

    public function showMovie($id) {
        $cart = array();
        $similarMovies = [];
        $movies = Movies::where("id", $id)->firstOrFail();
        $directors = Movies::with('directors')->find($id);
        $genres = Movies::with('genres')->find($id);
        $actors = Movies::with('actors')->find($id);
        $artist = Movies::with('genres')->findOrFail(1);
        // Add all movie genres to the array
        foreach($genres->genres as $item){
            $cart[] = $item["id"];
        }
        // Get random genre id to show similar movies
        if(!empty($cart)) {
            $rand_key = array_rand($cart, 1);
            $rand_val = $cart[$rand_key];
            // 10 Random movies by random genre id
            $similarMovies = Movies::whereHas('genres', function($query) use ($rand_val) {
                $query->where('genres.id', $rand_val);
            })->limit(10)->get();
        } 
        $comments = Movies::with('comments')->find($id);
        //echo $comments;
        return view("movies.single", ["movies" => $movies, "directors" => $directors, "genres" => $genres, 
            "actors" => $actors, "similarMovies" => $similarMovies, "comments" => $comments]);
    }

    public function showMovieByGenre($id) {
        $movies = Movies::whereHas('genres', function($query) use ($id) {
            $query->where('genres.id', $id);
        })->get();
        
        return view("movies.index",["movies"=>$movies]);
    }

    public function create() {
        $directors = Directors::get();
        $genres = Genres::get();
        $actors = Actors::get();
        return view("movies.create", ["directors" => $directors, "genres" => $genres, "actors" => $actors]);
    }

    public function store(Request $request) {
        $movie = Movies::create([
            "mov_title"=>$request->input("title"),
            "mov_cover"=>$request->input("cover"),
            "mov_length"=>$request->input("length"),
            "mov_lang"=>$request->input("lang"),
            "mov_rel_date"=>$request->input("rel_date"),
            "mov_rel_country"=>$request->input("rel_loc"),
        ]);

        $moviedirection = MovieDirection::create([
            "id"=>$request->input('directors'),
            "id"=>$movie->id,
        ]);

        $genres = $request->input('genres');
        foreach ($genres as $genre) {
            MovieGenres::create([
                "id"=>$movie->id,
                "id"=>$genre,
            ]);
        }

        $arr1 = $request->input('actors');
        $arr2 = $request->input('roles');
        for($i=0; $i<count($arr1); $i++) {
            MovieCast::create([
                "act_id"=>$arr1[$i],
                "id"=>$movie->id,
                "role"=>$arr2[$i],
            ]);
        }
    }

}