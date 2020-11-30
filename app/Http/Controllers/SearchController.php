<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Movies;
use App\Actors;
use App\Directors;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index() {
        return view("products.index", ["products"=>Products::get()]);
        return Products::get();
    }

    public function search(Request $request) {
        $inputAll = $request->all();
        $input = $inputAll['search_for'];
        $movie_search = Movies::where('mov_title','LIKE','%'.$input.'%')
            ->orWhere('mov_desc','LIKE','%'.$input.'%')
            ->get();

        $actors_search = Actors::where('name','LIKE','%'.$input.'%')
            ->orWhere('bio','LIKE','%'.$input.'%')
            ->get();

        $directors_search = Directors::where('dir_name','LIKE','%'.$input.'%')
            ->orWhere('bio','LIKE','%'.$input.'%')
            ->get();

        return view("search.search", ["movies"=>$movie_search, "actors"=>$actors_search, "directors"=>$directors_search]);
    }
    
}