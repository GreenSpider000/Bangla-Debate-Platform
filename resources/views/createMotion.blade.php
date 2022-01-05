<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a new Motion') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <!-- Motion create form -->

                    <form method="POST" action="{{ route('dashboard.motionCreate') }}">

                        @csrf

                        <!-- create motion name -->
                        <div class="mt-4">
                            <x-label for="Motion Name" :value="__('Motion Name')" />

                            <x-input id="motionName" class="block mt-1 w-full" type="text" name="motionName" :value="old('motionName')" autofocus />
                        </div>

                        <div class="col-md-6">@error('motionName')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div>

                        <!-- create motion description -->
                        <div class="mt-4">
                            <x-label for="Motion Description" :value="__('Motion Description')" />

                            <x-input id="motionDescription" class="block mt-1 w-full" type="text" name="motionDescription" :value="old('motionDescription')" autofocus />
                        </div>

                        <div class="col-md-6">@error('motionDescription')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div>

                        <!-- create pros -->
                        @for ($i = 1; $i < 5; $i++)

                        <!-- pros title -->
                        <div class="mt-4">
                            <x-label for="prosTitle" :value="__('Pros Title')" />

                            <x-input id="prosTitle" class="block mt-1 w-full" type="text" name="prosTitle" :value="old('prosTitle')" autofocus />
                        </div>

                        <div class="col-md-6">@error('prosTitle')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div>

                        <!-- pros number -->
                        <div class="mt-4">
                            <x-label for="prosNumber" :value="__('Pros Number')" />

                            <x-input id="prosNumber" class="block mt-1 w-full" type="number" name="prosNumber" :value="old('prosNumber')" autofocus />
                        </div>

                        <div class="col-md-6">@error('prosNumber')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div>

                        <!-- pros description -->
                        <textarea id="prosDescription" name="prosDescription" rows="4" cols="50" class="form-control @error('prosDescription') is-invalid @enderror"></textarea>

                        <div class="col-md-6">@error('prosDescription')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div>

                        @endfor


                        <!-- create cons -->
                        @for ($i = 1; $i < 5; $i++) 

                        <!-- cons title -->
                            <div class="mt-4">
                                <x-label for="consTitle" :value="__('Cons Title')" />

                                <x-input id="consTitle" class="block mt-1 w-full" type="text" name="consTitle" :value="old('consTitle')" autofocus />
                            </div>

                            <div class="col-md-6">@error('consTitle')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div>

                            <!-- cons number -->
                            <div class="mt-4">
                                <x-label for="consNumber" :value="__('Cons Number')" />

                                <x-input id="consNumber" class="block mt-1 w-full" type="number" name="consNumber" :value="old('consNumber')" autofocus />
                            </div>

                            <div class="col-md-6">@error('consNumber')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div>

                            <!-- cons description -->
                            <textarea id="consDescription" name="consDescription" rows="4" cols="50" class="form-control @error('consDescription') is-invalid @enderror"></textarea>

                            <div class="col-md-6">@error('consDescription')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div>
                            @endfor

                            <!-- Button -->
                            <div class="flex items-center justify-end mt-4">
                                <x-button class="ml-4">
                                    {{ __('make motion') }}
                                </x-button>
                            </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>