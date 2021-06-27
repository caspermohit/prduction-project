

        <div class="relative mt-3 md:mt-0" x-data ="{isOpen: true}" @click.away= "isOpen = false" >
            <input wire:model.debounce.500ms="search" type="text"
            class="bg-gray-100  text-sm rounded-full w-64 px-4 pl-8 py-1 focus:oultine-solid focus:shadow-outline"
             placeholder="Search  (press '/' to search)"
             x-ref= "search"
             @keydown.window="
             if(event.keyCode==191){
                 event.preventDefault();
                 $refs.search.focus();
             }
             "
             @focus="isOpen = true"
             @keydown= "isOpen = true"
             @keydown.escape.window="isOpen = false"
             @keydown.shift.tab="isOpen = false"
             >


            @if (strlen($search)>= 2)


             <div class=" z-50 absolute bg-indigo-100  text-sm rounded w-64 mt-4"
              x-show.transition.opacity="isOpen"


              >
                 @if ($searchResults->count() > 0)


                <ul>
                    @foreach ($searchResults as $result)
                    <li class="border-b broder-gray-800">
                        <a href="{{route('movies.show',$result['id'])}}" class="block hover:bg-indigo-400 px-3 py-3 flex items-center transition ease-in-out
                        duration-150"
                        @if ($loop ->last)@keydown.tab= "isOpen = false"

                        @endif
                        >
                            @if ($result['poster_path'])
                            <img src="{{'https://image.tmdb.org/t/p/w92/'.$result['poster_path']}}" alt="poster" class="w-8">
                            @else
                            <img src="https://via.placeholder.com/50x75" alt="poster" class="w-8">
                            @endif

                            <span class="ml-4"> {{ $result['title'] }}</span>

                        </a>

                    </li>
                    @endforeach
                </ul>
                @else
                <div class=" px-3 py-3">No result found for "{{$search}}"</div>
                @endif

             </div>
             @endif

        </div>




