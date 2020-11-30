<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Genres;

use App\Movies;
use App\Directors;


use Illuminate\Http\Request;

class GenresController extends Controller
{
    public function index() {
        $genres = Genres::get();
        return view("genres.index",["genres"=>$genres]);
    }

    public function showGenre($id) {
        $genres = Genres::where("id", $id)->firstOrFail();
        return view("genres.single",["genres" => $genres]);
    }

    public function create() {
        return view("genres.create");
    }
    
    public function store(Request $request) {
        Genres::create([
            "gen_title"=>$request->input("title"),
        ]);
    }
}