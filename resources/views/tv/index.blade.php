
@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 pt-16">

    <div class="popoular-tv">
        <h1 class="uppercase tracking-wider text-gray-900 text-lg font-semibold">Popular Shows</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-16">
            @foreach ($popularTv as $tvshow)
            <x-tv-card :tvshow="$tvshow" />
        @endforeach






        </div>

    </div>
    <br>
    <div class="popoular movies">
        <h1 class="uppercase tracking-wider text-gray-900 text-lg font-semibold">Top Rated Shows</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-16">
            @foreach ($topRatedTv as $tvshow)
            <x-tv-card :tvshow="$tvshow" />
        @endforeach




        </div>

    </div>
</div>
@endsection

