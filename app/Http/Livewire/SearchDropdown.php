<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;



class SearchDropdown extends Component
{
    public $search= '';

    public function render()
    {

        $searchResults =[ ];
        if(strlen($this->search) > 2){

        $searchResults = Http::withToken("eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJmY2E0MDBkYzdjMGRiMWY3OGNhNWRjNjc3NjI1NzA1ZSIsInN1YiI6IjYwOWRlYWIwMmNkZTk4MDA0MDQwNjc3ZiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.p5l5eeLroaVkekqY1JJdRTgFwzGONr_ti7Ql7oau1HI")
        ->get('https://api.themoviedb.org/3/search/movie?query='.$this->search)
        ->json()['results'];
        }

        // dump($searchResults);

        return view('livewire.search-dropdown',
        ['searchResults'=> collect($searchResults)->take(7),]);
    }
}
