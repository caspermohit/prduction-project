@extends('layouts.main')


@section('content')

  <div class="md:flex justify-between py-20 px-10 bg-indigo-100 text-gray-900">


    <div class=" grid  gap-2">
      <h2 class="text-2xl md:text-4xl lg:text-6xl text-gray-900 mb-6">Let's talk about Smart movie Reviewer APP
    </h2>
         <p class="break-words break-long-words">
            The Movie Database (SMR) is a production project built movie and TV database.
            <break>
             Every piece of data has been added by Mohit Shah from RDF(resource desceiption framework)using API.
            </break>
             <break>
              SMR's strong international focus and breadth of data is largely unmatched and something we're incredibly proud of.
               Put simply, we live and breathe community and that's precisely what makes us different.</break>
         </p>

    </div>
    <div class="col-start-3 gap-5">
        @foreach ($trending2 as $movie)
        @if ($loop->index < 1)
      <img src="{{'https://image.tmdb.org/t/p/w500/'.$movie['poster_path']}}" alt="tv show" class=" rounded shadow-2xl">
      @else
      @break
  @endif
      @endforeach
      </div>

    <div class="row-start-1 col-start-2 col-span-2">
        @foreach ($trending as $movie)
        @if ($loop->index < 1)
      <img src="{{'https://image.tmdb.org/t/p/w500/'.$movie['poster_path']}}" alt="movie" class=" rounded shadow-2xl">
      @else
      @break
  @endif
      @endforeach

    </div>

  </div>



  <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-center text-gray-900 sm:text-4xl">
    Movies for the day
   </p>
  <div class="md:flex py-16 px-10 bg-indigo-100 text-gray-900 text-center">

      @foreach ($trending1 as $movie)
      @if ($loop->index < 5)
      <div class="mr-8 text-center">
        @if ($movie['poster_path'])
        <a href="{{route('movies.show', $movie['id'])}}">
            <img src="{{'https://image.tmdb.org/t/p/w300/'.$movie['poster_path']}}" alt="poster" >
            @else
            <img src="https://via.placeholder.com/300x450/00000/ffffff?text=Smart+Movies+Reviewer" alt="poster" >
            @endif
        </a>

        <a href="{{route('movies.show', $movie['id'])}}">
            <h2 class=" font-semibold text-gray-900"> {{$movie['title']}}</h2>
        </a>

      </div>
      @else
      @break
  @endif



      @endforeach

  </div>
  <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-center text-gray-900 sm:text-4xl">
    Tvshows for the day
   </p>
  <div class="md:flex py-16 px-10 bg-indigo-100 text-gray-900 text-center">

    @foreach ($trending2 as $tvshow)
    @if ($loop->index < 5)
    <div class="mr-8 text-center">
        <a href="{{ route('tv.show', $tvshow['id']) }}">
      @if ($tvshow['poster_path'])
      <img src="{{'https://image.tmdb.org/t/p/w300/'.$tvshow['poster_path']}}" alt="poster" >
      @else
      <img src="https://via.placeholder.com/300x450/00000/ffffff?text=Smart+Movies+Reviewer" alt="poster" >
      @endif
    </a>
    <a href="{{ route('tv.show', $tvshow['id']) }}">
      <h2 class=" font-semibold text-gray-900"> {{$tvshow['name']}}</h2>
    </a>
    </div>
    @else
    @break
@endif



    @endforeach

</div>



<div class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="lg:text-center">

        <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
         Actors for the day
        </p>
        <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
            An actor is a person who portrays a character in a performance (also actress; see below).[1]
             The actor performs "in the flesh" in the traditional medium of the theatre or in modern media such as film, radio, and television
        </p>
      </div>

      <div class="mt-10">
        <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
            @foreach ($person as $actor)
            @if ($loop->index < 6)
          <div class="relative">
            <dt>
              <div class="absolute flex items-center justify-center h-12 w-12 rounded-md  text-white">

                <a href="{{ route('actors.show', $actor['id']) }}">
                @if ($actor['profile_path'])
                <img src="{{'https://image.tmdb.org/t/p/w300/'.$actor['profile_path']}}" alt="poster" >
                @else
                <img src="https://via.placeholder.com/50x75" alt="poster" >
                @endif
                </a>
                <a href="{{ route('actors.show', $actor['id']) }}">
              </div>
              <p class="ml-16 text-lg leading-6 font-medium text-gray-900">{{$actor['name']}}</p>
            </a>
            </dt>
            <dd class="mt-2 ml-16 text-base text-gray-500">
                <img src="/img/love.png" alt="logo" width="20" height="20">  {{$actor['popularity']}}


            </dd>
          </div>
          @else
          @break
      @endif
          @endforeach






        </dl>
      </div>
    </div>
  </div>

  @endsection
