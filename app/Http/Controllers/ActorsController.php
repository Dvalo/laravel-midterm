<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Actors;
use App\Movies;
use Illuminate\Http\Request;

class ActorsController extends Controller
{
    public function index() {
        $actors = Actors::get();
        return view("actors.index",["actors"=>$actors]);
    }

    public function showActor($id) {
        $actors = Actors::where("id", $id)->firstOrFail();

        $movies = Movies::whereHas('actors', function($query) use ($id) {
            $query->where('actors.id', $id);
        })->get();

        return view("actors.single",["actors" => $actors, "movies" => $movies]);
    }

    public function create() {
        return view("actors.create");
    }

    public function store(Request $request) {
        Actors::create([
            "name"=>$request->input("name"),
            "gender"=>$request->input("gender"),
            "image"=>$request->input("cover"),
            "birth_location"=>$request->input("birth_location"),
            "date_of_birth"=>$request->input("birthday"),
        ]);
    }
}