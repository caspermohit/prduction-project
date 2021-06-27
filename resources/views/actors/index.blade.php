
@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 pt-16">

    <div class="popoular-actors">
        <h1 class="uppercase tracking-wider text-gray-900 text-lg font-semibold">Popular Actors</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-16">
                @foreach ($popularActors as $actor )
                <div class="actor mt-10">
                    @if ($actor['profile_path'])
                    <a href="{{ route('actors.show', $actor['id']) }}">
                        <img src="{{'https://image.tmdb.org/t/p/w500/'.$actor['profile_path']}}" alt="poster" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    @else
                <img src="https://via.placeholder.com/300x450/00000/ffffff?text=No+actor+Image" alt="poster" >
                @endif
                    <div class="mt-2">
                        <a href="{{ route('actors.show', $actor['id']) }}" class="text-lg hover:text-gray-300">{{$actor['name']}}</a>
                        <div class="text-sm truncate text-gray-900">{{$actor['known_for']}}</div>
                    </div>

                </div>
                @endforeach






        </div>

    </div>
  <div class="flex justify-between mt-16">
            @if ($previous)
               <button class="ml-5 flex inline-flex items-center bg-gray-500  rounded font-semibold px-5 py-4 hover:bg-yellow-600 transition ease-in-out duration-150"> <a href="/actors/page/{{ $previous }}">Previous</a></button>
            @else
                <div></div>
            @endif
            @if ($next)
                <button class="ml-5 flex inline-flex items-center bg-gray-500  rounded font-semibold px-5 py-4 hover:bg-yellow-600 transition ease-in-out duration-150"><a href="/actors/page/{{ $next }}">Next</a></button>
            @else
                <div></div>
            @endif
        </div>

</div>
@endsection
