@extends('layouts.main')

@section('content')
    <div class="tv-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <div class="flex-none">
                <img src="{{ $tvshow['poster_path'] }}" alt="poster" class="w-64 lg:w-96">
            </div>
            <div class="md:ml-24">
                <h2 class="text-4xl mt-4 md:mt-0 font-semibold">{{ $tvshow['name'] }}</h2>
                <div class="flex flex-wrap items-center text-gray-900 text-sm">
                    <img src="/img/star.png" alt="logo" width="20" height="20">
                    <span class="ml-1">{{ $tvshow['vote_average'] }}/10</span>
                    <span class="mx-2">|</span>
                    <span>{{ $tvshow['first_air_date'] }}</span>
                    <span class="mx-2">|</span>
                    <span>{{ $tvshow['genres'] }}</span>
                </div>
                <br>
                <div class="flex flex-wrap items-center text-gray-900 text-sm">
                    <span><b>Number of seasons {{ $tvshow['number_of_seasons'] }}</b></span>
                    <span class="mx-2">|</span>
                    <span>Number of eipsodes {{ $tvshow['number_of_episodes'] }} </span>
                </div>
                <br>
                @if ($tvshow['homepage'])

                <div class="flex flex-wrap items-center text-gray-900">
                    <a href="{{ $tvshow['homepage'] }}" title="Website">
                        @foreach ($tvshow['networks'] as $logo)
                   <span><h3>Available on</h3></span>
                    <span><button><b>{{ $logo['name'] }}</b> </button></span>
                        @endforeach

                    </a>
                </div>
            @endif

                <p class="text-gray-900 mt-8">
                    {{ $tvshow['overview'] }}
                </p>

                <div class="mt-12">
                    <div class="flex mt-4">
                        @foreach ($tvshow['created_by'] as $crew)
                            <div class="mr-8">
                                <div>{{ $crew['name'] }}</div>
                                <div class="text-sm text-gray-900"><b>Creator</b></div>
                            </div>

                        @endforeach
                    </div>
                </div>

                <div x-data="{ isOpen: false }">
                    @if (count($tvshow['videos']['results']) > 0)
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
                                                <iframe class="responsive-iframe absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/{{ $tvshow['videos']['results'][0]['key'] }}" style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                        <br>
                        <br>
                        <form action="{{route('wishlist.store')}}">
                            <input type="hidden" value="{{$tvshow['id']}}"name="id">
                           <input type="hidden" value="{{ $tvshow['name'] }}" name="title">
                           <input type="hidden" value="{{ $tvshow['vote_average'] }}" name="vote_average">
                           {{-- <input type="hidden" value="{{$movie['release_date']}}" name="release_date"> --}}
                           <input type="hidden" value="{{ $tvshow['poster_path'] }}" name="poster_path">
                           {{-- <input type="hidden" value="{{$genre['name']}}" name="name"> --}}
                        <button type="submit"
                        class="flex inline-flex items-center bg-yellow-500  rounded font-semibold px-5 py-4 hover:bg-yellow-600 transition ease-in-out duration-150">
                            <img src="/img/wish.png" alt="logo" width="40" height="40">
                            <span class="ml-2 "> my wishlist</span>
                    </button>
                    </form>
                    @endif


                </div>


            </div>
        </div>
    </div> <!-- end tv-info -->

    <div class="tv-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Cast</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($tvshow['cast'] as $cast)
                    <div class="mt-8">
                        <a href="{{ route('actors.show', $cast['id']) }}">
                            <img src="{{ $cast['profile_path'] }}" alt="actor1" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="mt-2">
                            <a href="{{ route('actors.show', $cast['id']) }}" class="text-lg mt-2 hover:text-gray:300">{{ $cast['name'] }}&nbsp; As</a>
                            <div class="text-sm text-gray-900">
                                {{ $cast['character'] }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div> <!-- end tv-cast -->

    <div class="tv-images" x-data="{ isOpen: false, image: ''}">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Images</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                @foreach ($tvshow['images'] as $image)
                    <div class="mt-8">
                        <a
                            @click.prevent="
                                isOpen = true
                                image='{{ 'https://image.tmdb.org/t/p/original/'.$image['file_path'] }}'
                            "
                            href="#"
                        >
                            <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$image['file_path'] }}" alt="image1" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                    </div>
                @endforeach
            </div>

            <div
                style="background-color: rgba(0, 0, 0, .5);"
                class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                x-show="isOpen"
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
                            <img :src="image" alt="poster">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end tv-images -->
@endsection
