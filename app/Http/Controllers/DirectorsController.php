<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Movies;
use App\Directors;

use Illuminate\Http\Request;

class DirectorsController extends Controller
{
    public function index() {
        $directors = Directors::get();
        return view("directors.index",["directors"=>$directors]);
    }

    public function showDirector($id) {
        $directors = Directors::where("id", $id)->firstOrFail();

        $movies = Movies::whereHas('directors', function($query) use ($id) {
            $query->where('directors.id', $id);
        })->get();

        return view("directors.single",["directors" => $directors, "movies" => $movies]);
    }

    public function create() {
        return view("directors.create");
    }
    
    public function store(Request $request) {
        Directors::create([
            "dir_name"=>$request->input("name"),
            "dir_image"=>$request->input("image"),
        ]);
    }
}