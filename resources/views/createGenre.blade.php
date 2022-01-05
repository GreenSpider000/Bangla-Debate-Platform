<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a new genre') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <!-- Genre create form -->

                    <form method="POST" action="{{ route('dashboard.genreCreate') }}">

                        @csrf

                        <!-- genreName -->
                        <div class="mt-4">
                            <x-label for="Genre Name" :value="__('Genre Name')" />

                            <x-input id="genreName" class="block mt-1 w-full" type="text" name="genreName" :value="old('genreName')" autofocus />
                        </div>
                        
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
                                {{ __('make genre') }}
                            </x-button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>