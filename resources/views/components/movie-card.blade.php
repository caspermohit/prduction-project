<div>
    <div class="mt-16">
        <a href="{{route('movies.show', $movie['id'])}}">
            <img src="{{'https://image.tmdb.org/t/p/w500/'.$movie['poster_path']}}" alt="poster" class="hover:opacity-75 transition ease-in-out duration-150">
        </a>
        <div class="mt-2">
            <a href="{{route('movies.show', $movie['id'])}}" class="text-lg mt-2 text-gray-900 hover:text-green-300">{{$movie['title']}}</a>
            <div class="flex items-center text-gray-900">
                <img src="/img/star.png" alt="logo" width="20" height="20">
                <span class="ml-1">{{$movie['vote_average']}}/10</span>
                <span class="mx-2">|</span>
                <span>{{ $movie['popularity'] }}</span>
            </div>
            <div class="text-gray-900">
                @foreach ($movie['genre_ids'] as $genre)
                {{$genres->get($genre)}} @if (!$loop->last),

                @endif
                @endforeach
            </div>
        </div>

    </div>
</div>
