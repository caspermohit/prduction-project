<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $popularMovies = Http::withToken("eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJmY2E0MDBkYzdjMGRiMWY3OGNhNWRjNjc3NjI1NzA1ZSIsInN1YiI6IjYwOWRlYWIwMmNkZTk4MDA0MDQwNjc3ZiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.p5l5eeLroaVkekqY1JJdRTgFwzGONr_ti7Ql7oau1HI")
        ->get('https://api.themoviedb.org/3/movie/popular')
        ->json()['results'];
        $nowplaying = Http::withToken("eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJmY2E0MDBkYzdjMGRiMWY3OGNhNWRjNjc3NjI1NzA1ZSIsInN1YiI6IjYwOWRlYWIwMmNkZTk4MDA0MDQwNjc3ZiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.p5l5eeLroaVkekqY1JJdRTgFwzGONr_ti7Ql7oau1HI")
        ->get('https://api.themoviedb.org/3/movie/now_playing')
        ->json()['results'];

        $genresArray = Http::withToken("eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJmY2E0MDBkYzdjMGRiMWY3OGNhNWRjNjc3NjI1NzA1ZSIsInN1YiI6IjYwOWRlYWIwMmNkZTk4MDA0MDQwNjc3ZiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.p5l5eeLroaVkekqY1JJdRTgFwzGONr_ti7Ql7oau1HI")
        ->get('https://api.themoviedb.org/3/genre/movie/list')
        ->json()['genres'];

        $genres = collect($genresArray)->mapWithKeys(function($genre){
            return [$genre['id']=>$genre['name']];
        });



        return view('movies.index',[
            'popularMovies'=> $popularMovies,
            'genres'=> $genres,
            'nowplaying'=> $nowplaying,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Http::withToken("eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJmY2E0MDBkYzdjMGRiMWY3OGNhNWRjNjc3NjI1NzA1ZSIsInN1YiI6IjYwOWRlYWIwMmNkZTk4MDA0MDQwNjc3ZiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.p5l5eeLroaVkekqY1JJdRTgFwzGONr_ti7Ql7oau1HI")
        ->get('https://api.themoviedb.org/3/movie/'.$id.'?append_to_response=credits,videos,images' )
        ->json();

        // dump($movie);
        return view('movies.show',[
            'movie' => $movie,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
