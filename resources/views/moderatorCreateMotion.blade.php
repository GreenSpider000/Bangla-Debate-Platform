<x-app-layout>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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

                    <form method="POST" action="{{ route('dashboard.moderatorMotionCreate') }}">

                        @csrf


                        <!-- create motion name -->
                        <div class="col">
                            <div class="mt-4">
                                <x-label for="Motion Name" :value="__('Motion Name')" />

                                <x-input id="motionName" class="block mt-1 w-full" type="text" name="motionName" :value="old('motionName')" autofocus />
                            </div>

                            <div class="col-md-6">@error('motionName')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div>
                        </div>

                        <!-- create motion description -->
                        <div class="col">
                            <div class="mt-4">
                                <x-label for="Motion Description" :value="__('Motion Description')" />

                                <textarea style="margin-bottom:60px;" id="motionDescription" name="motionDescription" rows="4" cols="50" class="form-control @error('motionDescription') is-invalid @enderror">
                                    </textarea>
                            </div>

                            <div class="col-md-6">@error('motionDescription')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div>

                        </div>

                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <h3>Pros</h3>
                                </div>
                                <div class="col">
                                    <h3>Cons</h3>
                                </div>
                            </div>
                        </div>

                        
                        <div style="margin-bottom:40px;" class="container">

                            <div class="row">

                                <!-- create pros -->
                                <div class="col">

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
                                    <x-label for="prosDescription" :value="__('Description')" />
                                    <textarea id="prosDescription" name="prosDescription" rows="4" cols="50" class="form-control @error('prosDescription') is-invalid @enderror"></textarea>

                                    <div class="col-md-6">@error('prosDescription')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div>
                                </div>



                                <!-- create cons -->

                                <div class="col">

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
                                    <x-label for="consDescription" :value="__('Description')" />
                                    <textarea id="consDescription" name="consDescription" rows="4" cols="50" class="form-control @error('consDescription') is-invalid @enderror"></textarea>

                                    <div class="col-md-6">@error('consDescription')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div>

                                </div>

                            </div>
                        </div>

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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</x-app-layout>