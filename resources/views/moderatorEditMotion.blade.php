<x-app-layout>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
                    <form method="POST" action="{{ url('dashboard/moderatorManageMotion/Motion/'.$motion->motionID) }}">
                        @csrf


                        <div class="container">


                            <!-- show motion name -->
                            <h1 style="margin-bottom:20px;margin-top:5px;text-align: center;">
                            {{$motion->motionName}}
                            </h1>

                            <!-- update motion name -->
                            <div class="col">
                                <x-label for="motionName" :value="__('Motion Name:')" />
                                <textarea style="margin-bottom:20px;" id="motionName" name="motionName" rows="2" cols="50" class="form-control @error('motionName') is-invalid @enderror">
                                {{$motion->motionName}}
                                </textarea>

                                <div class="col-md-6">@error('motionName')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div>
                            </div>


                            <!-- update motion description -->
                            <div class="col" >
                                <x-label for="motionDescription" :value="__('Motion Description:')" />
                                <textarea style="margin-bottom:80px;" id="motionDescription" name="motionDescription" rows="4" cols="50" class="form-control @error('motionDescription') is-invalid @enderror">

                                {{$motion->motionDescription}}

                                </textarea>

                                <div class="col-md-6">@error('motionDescription')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div>
                            </div>

                        </div>



                        <div class="container">
                            <div class="row">

                                <div class="col">

                                    <!-- update motion pros -->
                                    <h3>Pos</h3>
                                    @foreach ($pros as $pros)

                                    <div>
                                        <p>Pros: {{ ($pros->prosNumber) }}</p>
                                    </div>

                                    <!-- pros  title -->
                                    <x-label for="prosTitle" :value="__('Title')" />
                                    <textarea id="prosTitle" name="prosTitle" rows="2" cols="50" class="form-control @error('prosTitle') is-invalid @enderror">
                                    {{$pros->prosTitle}} </textarea>

                                    <div class="col-md-6">@error('prosTitle')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div>

                                    <!-- pros number -->
                                    <div class="mt-4">
                                        <x-label for="prosNumber" :value="__('Pros Number')" />

                                        <x-input id="prosNumber" class="block mt-1 w-full" type="number" name="prosNumber" value="{{$pros->prosNumber}}" autofocus />
                                    </div>

                                    <div class="col-md-6">@error('prosNumber')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div>

                                    <!-- pros  description -->
                                    <x-label for="prosDescription" :value="__('Description')" />
                                    <textarea id="prosDescription" name="prosDescription" rows="2" cols="50" class="form-control @error('prosDescription') is-invalid @enderror">
                                    {{$pros->prosDescription}} </textarea>

                                    <div class="col-md-6">@error('prosDescription')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div>

                                    @endforeach

                                </div>


                                <div class="col">
                                    <!-- update motion cons -->
                                    <h3>Cons</h3>
                                    @foreach ($cons as $cons)
                                    <div>
                                        <p>Cons: {{ ($cons->consNumber) }}</p>
                                    </div>


                                    <!-- cons  title -->
                                    <x-label for="consTitle" :value="__('Title')" />
                                    <textarea id="consTitle" name="consTitle" rows="2" cols="50" class="form-control @error('consTitle') is-invalid @enderror">
                                    {{$cons->consTitle}} </textarea>

                                    <div class="col-md-6">@error('consTitle')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div>


                                    <!-- cons number -->
                                    <div class="mt-4">
                                        <x-label for="consNumber" :value="__('Cons Number')" />

                                        <x-input id="consNumber" class="block mt-1 w-full" type="number" name="consNumber" value="{{$cons->consNumber}}" autofocus />
                                    </div>

                                    <div class="col-md-6">@error('consNumber')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div>


                                    <!-- cons  description -->
                                    <x-label for="consDescription" :value="__('Description')" />
                                    <textarea id="consDescription" name="consDescription" rows="2" cols="50" class="form-control @error('consDescription') is-invalid @enderror">
                                    {{$cons->consDescription}} </textarea>

                                    <div class="col-md-6">@error('consDescription')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div>

                                    @endforeach
                                </div>
                                <div class="w-100">

                                </div>
                            </div>
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</x-app-layout>