<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Genres') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">


                    <!-- show all the genres -->
                    @foreach($genre as $genre)
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{$genre->genreName}}</li>

                        <div class="w-1/5 flex">

                            <a href="{{url('dashboard/manageGenre/Genre/'.$genre->genreID)}}">Update</a>

                            <form action="{{url('dashboard/manageGenre/Genre/'.$genre->genreID)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit">Delete</button>
                            </form>

                        </div>

                    </ul>
                    @endforeach

                    <!-- Create New Genre Button -->
                    <div class="flex items-center justify-end mt-4">
                        <a href="{{ route('dashboard.genreCreate') }}">
                            <x-button class="ml-4">
                                {{ __('Create New Genre') }}
                            </x-button>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>