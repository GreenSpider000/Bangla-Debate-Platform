<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Genre') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <!-- edit genre form -->

                    @foreach($genre as $genre)
                    <form method="POST" action="{{ url('dashboard/manageGenre/Genre/'.$genre->genreID) }}">
                        @csrf

                        <!-- update genre name -->
                        <textarea id="genreName" name="genreName" rows="4" cols="50" class="form-control @error('genreName') is-invalid @enderror">
                        {{$genre->genreName}}
                        </textarea>
                        <div class="col-md-6">
                            @error('genreName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <!-- Button -->
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Update') }}
                            </x-button>
                        </div>
                    </form>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</x-app-layout>