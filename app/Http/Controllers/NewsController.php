<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

            $trending1 = Http::withToken("eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJmY2E0MDBkYzdjMGRiMWY3OGNhNWRjNjc3NjI1NzA1ZSIsInN1YiI6IjYwOWRlYWIwMmNkZTk4MDA0MDQwNjc3ZiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.p5l5eeLroaVkekqY1JJdRTgFwzGONr_ti7Ql7oau1HI")
        ->get('https://api.themoviedb.org/3/trending/movie/day')
        ->json()['results'];
        $trending2 = Http::withToken("eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJmY2E0MDBkYzdjMGRiMWY3OGNhNWRjNjc3NjI1NzA1ZSIsInN1YiI6IjYwOWRlYWIwMmNkZTk4MDA0MDQwNjc3ZiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.p5l5eeLroaVkekqY1JJdRTgFwzGONr_ti7Ql7oau1HI")
        ->get('https://api.themoviedb.org/3/trending/tv/day')
        ->json()['results'];

        $trending= Http::withToken("eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJmY2E0MDBkYzdjMGRiMWY3OGNhNWRjNjc3NjI1NzA1ZSIsInN1YiI6IjYwOWRlYWIwMmNkZTk4MDA0MDQwNjc3ZiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.p5l5eeLroaVkekqY1JJdRTgFwzGONr_ti7Ql7oau1HI")
        ->get('https://api.themoviedb.org/3/trending/movie/day')
        ->json()['results'];
        $person= Http::withToken("eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJmY2E0MDBkYzdjMGRiMWY3OGNhNWRjNjc3NjI1NzA1ZSIsInN1YiI6IjYwOWRlYWIwMmNkZTk4MDA0MDQwNjc3ZiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.p5l5eeLroaVkekqY1JJdRTgFwzGONr_ti7Ql7oau1HI")
        ->get('https://api.themoviedb.org/3/trending/person/day')
        ->json()['results'];


            // dump($UpcomingMovies);
        return view('news.index',[
            'trending1'=>$trending1,
            'trending2'=>$trending2,
            'trending'=>$trending,
            'person'=>$person,
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
        //
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
