@extends('layouts.main')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                      <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                          <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                              Image
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                              Title
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                              rating
                            </th>

                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                              Remove

                            </th>
                          </tr>
                        </thead>
                        @foreach ($wishlists as $movie )

                        <tbody class="bg-white divide-y divide-gray-200">
                          <tr>
                            <td class="px-6 py-4 whitespace-wrap">
                              <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img src="{{'https://image.tmdb.org/t/p/w92/'.$movie['poster_path']}}" alt="poster" >
                                </div>
                               </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap font-bold">
                              <div class="text-sm text-gray-900">{{$movie['title']}}</div>

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                              <span class="px-2 inline-flex text-xs leading-5 font-bold rounded-full bg-green-100 text-green-800">
                                {{$movie['vote_average']}}/10
                              </span>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium">
                              <a href="{{'delete/'.$movie['id']}}" class="text-red-600 hover:text-red-900">
                                <img src="/img/delete.png" alt="logo" width="40" height="40"></a>
                            </td>
                          </tr>

                          <!-- More people... -->
                        </tbody>

                        @endforeach
                      </table>
                    </div>
                  </div>
                </div>
              </div>
        </section>
    </div>
</main>
@endsection
