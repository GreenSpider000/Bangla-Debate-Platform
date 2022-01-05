<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Motion') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <!-- edit motion form -->

                    @foreach($motion as $motion)
                    <form method="POST" action="{{ url('dashboard/manageMotion/Motion/'.$motion->motionID) }}">
                        @csrf


                        <!-- update motion name -->

                        <textarea id="motionName" name="motionName" rows="4" cols="50" class="form-control @error('motionName') is-invalid @enderror">

                        {{$motion->motionName}}

                        </textarea>

                        <div class="col-md-6">@error('motionName')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div>



                        <!-- update motion description -->

                        <textarea id="motionDescription" name="motionDescription" rows="4" cols="50" class="form-control @error('motionDescription') is-invalid @enderror">

                        {{$motion->motionDescription}}

                        </textarea>

                        <div class="col-md-6">@error('motionDescription')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div>



                        <!-- update motion pros -->

                        @foreach ($pros as $pros)

                        <!-- pros  title -->
                        <textarea id="prosTitle" name="prosTitle" rows="4" cols="50" class="form-control @error('prosTitle') is-invalid @enderror">
                        {{$pros->prosTitle}} </textarea>

                        <div class="col-md-6">@error('prosTitle')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div>

                        <!-- pros number -->
                        <div class="mt-4">
                        <x-label for="prosNumber" :value="__('Pros Number')" />

                        <x-input id="prosNumber" class="block mt-1 w-full" type="number" name="prosNumber" :value="old('prosNumber')" autofocus />
                        </div>

                        <div class="col-md-6">@error('prosNumber')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div>                        

                        <!-- pros  description -->
                        <textarea id="prosDescription" name="prosDescription" rows="4" cols="50" class="form-control @error('prosDescription') is-invalid @enderror">
                        {{$pros->prosDescription}} </textarea>

                        <div class="col-md-6">@error('prosDescription')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div>

                        @endforeach



                        <!-- update motion cons -->

                        @foreach ($cons as $cons)

                        <!-- cons  title -->
                        <textarea id="consTitle" name="consTitle" rows="4" cols="50" class="form-control @error('consTitle') is-invalid @enderror">
                        {{$cons->consTitle}} </textarea>

                        <div class="col-md-6">@error('consTitle')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div>
                        

                        <!-- cons number -->
                        <div class="mt-4">
                        <x-label for="consNumber" :value="__('Cons Number')" />

                        <x-input id="consNumber" class="block mt-1 w-full" type="number" name="consNumber" :value="old('consNumber')" autofocus />
                        </div>

                        <div class="col-md-6">@error('consNumber')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div>


                        <!-- cons  description -->
                        <textarea id="consDescription" name="consDescription" rows="4" cols="50" class="form-control @error('consDescription') is-invalid @enderror">
                        {{$cons->consDescription}} </textarea>

                        <div class="col-md-6">@error('consDescription')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div>

                        @endforeach


                        @foreach($motionModerator as $motionModerator)
                        <input type="checkbox" id="motionModerator" name="motionModerator" value="motionModerator">
                        <label for="motionModerator">{{motionModerator->userName}}</label><br>
                        @endforeach


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