<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get("/","MovieController@index"); // Homepage


// SEARCH

Route::get("/search","SearchController@search")->name("searchforstuff"); // not used

// COMMENTS

Route::post("/comments/store","CommentController@store")->name("storecomment");

// ACTORS
Route::get("/actors","ActorsController@index");

Route::get("/actors/{id}/{name}","ActorsController@showActor")->name("displayactor");

Route::get("/create-actor","ActorsController@create"); // (for testing)

Route::post("/actors/store","ActorsController@store")->name("storeactor"); // not used

// MOVIES

Route::get("/movies","MovieController@index");

Route::get("/movies/{id}/{name}","MovieController@showMovie")->name("displaymovie");

Route::get("/create-movie","MovieController@create"); // (for testing)

Route::post("/movies/store","MovieController@store")->name("storemovie"); // not used

// MOVIES EXTRA

Route::get("/movies/{id}-{genre}","MovieController@showMovieByGenre")->name("displaymoviebygenre");

// END OF MOVIES



// DIRECTORS

Route::get("/directors","DirectorsController@index");

Route::get("/director/{id}/{name}","DirectorsController@showDirector")->name("displaydirector");

Route::get("/create-director","DirectorsController@create"); // (for testing)

Route::post("/director/store","DirectorsController@store")->name("storedirector"); // not used


// END OF DIRECTORS



// GENRES

Route::get("/genres","GenresController@index");

Route::get("/genres/{id}/{name}","GenresController@showGenre")->name("displaygenre");

Route::get("/create-genre","GenresController@create"); // (for testing)

Route::post("/genres/store","GenresController@store")->name("storegenre"); // not used


// END OF GENRES

Auth::routes();

Auth::routes();

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
