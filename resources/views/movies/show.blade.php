@extends('layouts.main')

@section('content')
<div class="movie-info border-b border-gray-800">
    <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
        @if ($movie['poster_path'])
        <img src="{{'https://image.tmdb.org/t/p/w500/'.$movie['poster_path']}}" alt="poster" class=" w-64 lg:w-96">
        @else
        <img src="https://via.placeholder.com/300x450/00000/ffffff?text=Smart+Movies+Reviewer" alt="poster" >
        @endif
        <div class="md:ml-24">
            <div class="flex flex-wrap items-center text-gray-900">
                <h2 class="text-4xl font-semibold text-gray-900"> {{$movie['title']}}</h2>

            </div>


            <div class="flex  flex-wrap items-center text-gray-900 text-sm">
                <img src="/img/star.png" alt="logo" width="20" height="20">
                <span class="ml-1">{{$movie['vote_average']}}/10</span>
                <span class="mx-2">|</span>
                <img src="/img/love.png" alt="logo" width="20" height="20">
                <span class="mx-3">20</span>
                <span class="mx-2">|</span>
                <span>{{$movie['release_date']}}</span>
                <span class="mx-2">|</span>
                <sapn>@foreach ($movie['genres'] as $genre)
                    {{$genre['name']}} @if (!$loop->last),

                    @else
                        @break
                    @endif
                    @endforeach</span>
                    <span class="mx-2">|</span>
                    <span>{{$movie['runtime']}}minutes</span>

            </div>
            <p class="text-gray-900 mt-8">
                {{$movie['overview']}}
            </p>
            <div class="mt-12">
                <h3 class="text-gray-900 font-semibold">Featured Crews</h3>
                <div class="flex mt-4">
                    @foreach ($movie['credits']['crew'] as $crew )
                    @if ($loop->index < 5)
                    <div class="mr-8">
                        <div class="text-gray-900">{{$crew['name']}}</div>
                        <div class="text-sm text-gray-900">{{$crew[ 'job' ]}}</div>
                    </div>
                    @else
                        @break
                    @endif


                    @endforeach


                </div>
            </div>

            <div x-data="{ isOpen: false }">

                @if (count($movie['videos']['results']) > 0)


                    <div class="mt-12">
                        <button
                            @click="isOpen = true"
                            class="flex inline-flex items-center bg-yellow-500  rounded font-semibold px-5 py-4 hover:bg-yellow-600 transition ease-in-out duration-150"
                        >
                        <img src="/img/play.png" alt="logo" width="40" height="40">
                            <span class="ml-2">Play Trailer</span>
                        </button>





                    </div>

                    <template x-if="isOpen">
                        <div
                            style="background-color: rgba(0, 0, 0, .5);"
                            class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                        >
                            <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                                <div class="bg-gray-900 rounded">
                                    <div class="flex justify-end pr-4 pt-2">
                                        <button
                                            @click="isOpen = false"
                                            @keydown.escape.window="isOpen = false"
                                            class="text-3xl leading-none hover:text-gray-300">&times;
                                        </button>
                                    </div>
                                    <div class="modal-body px-8 py-8">
                                        <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%">
                                            <iframe class="responsive-iframe absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/{{ $movie['videos']['results'][0]['key'] }}" style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                    <br>
                    <br>
                    <div>
                        <form action="{{route('wishlist.store')}}">
                            <input type="hidden" value="{{$movie['id']}}"name="id">
                           <input type="hidden" value="{{$movie['title']}}" name="title">
                           <input type="hidden" value="{{$movie['vote_average']}}" name="vote_average">
                           {{-- <input type="hidden" value="{{$movie['release_date']}}" name="release_date"> --}}
                           <input type="hidden" value="{{$movie['poster_path']}}" name="poster_path">
                           {{-- <input type="hidden" value="{{$genre['name']}}" name="name"> --}}

                           <button  type="submit"
                           class="flex inline-flex items-center bg-yellow-500  rounded font-semibold px-5 py-4 hover:bg-yellow-600 transition ease-in-out duration-150">
                               <img src="/img/wish.png" alt="logo" width="40" height="40">
                               <span class="ml-2 ">my wishlist</span>
                       </button>
                    </div>

                @endif


            </div>


        </div>
    </div>
</div> <!-- end movie-info -->






        </div>

    </div>

</div><!--end movie-->

<div class="movie-cast border-b border-gray-800">
    <div class="container mx-auto px-4 py-16">
        <h2 class="text-4xl font-semibold text-gray-900">Cast</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-16">
            @foreach ($movie['credits']['cast'] as $cast)
            @if ($loop->index < 5)
            <div class="mt-16">
                @if ($cast['profile_path'])
                <a href="{{route('actors.show', $cast['id'])}}">
                    <img src="{{'https://image.tmdb.org/t/p/w300/'.$cast['profile_path']}}" alt="cast" class="hover:opacity-75 transition ease-in-out duration-150">
                </a>
                @else
                <img src="https://via.placeholder.com/300x450/00000/ffffff?text=No+Cast+Image" alt="poster" >
                @endif
                <div class="mt-2">
                    <a href="{{route('actors.show', $cast['id'])}}" class="text-lg mt-2 text-gray-900 hover:text-green-300">{{$cast['name']}}&nbsp; As</a>
                </div>
                <div class="mt-2">
                    <a href="#" class="text-lg mt-2 text-gray-900 hover:text-green-300">{{$cast['character']}}</a>

                </div>

            </div>
            @else
                @break
            @endif
            @endforeach


        </div>
    </div>
</div>
<div class="screenshots border-b border-gray-800">
    <div class="container mx-auto px-4 py-16">

        <h2 class="text-4xl font-semibold text-gray-900">Images</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-16">
            @foreach ($movie['images']['backdrops'] as $image)
            @if ($loop->index < 9)


        <div class="mt-16">
            <a href="#">
                <img src="{{'https://image.tmdb.org/t/p/w500/'.$image['file_path']}}" alt="poster" class=" w-64 lg:w-96">
            </a>


        </div>
        @else
            @break
        @endif
        @endforeach

    </div>
    </div>

</div>
@endsection
