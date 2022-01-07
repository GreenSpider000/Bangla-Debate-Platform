<x-app-layout>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div style="margin-bottom:30px;">
                    <div class="container">
                        <h1 style="margin-bottom:10px;margin-top:5px;">Genres</h2></div>
                            @foreach($genre as $genre)
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm">
                                        <a href="{{url('dashboard/genresMotion/'.$genre->genreName)}}">{{$genre->genreName}}</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                    </div>
                    <h1 style="margin-bottom:25px;margin-top:5px;text-align: center;">Motions</h2>
                        @foreach($motion as $motion)

                        <div class="container">
                            <ul class="list-group list-group-flush">
                                <div class="row">
                                    <div class="col">
                                        <a href="{{url('dashboard/showMotion/'.$motion->motionID)}}">
                                            <li class="list-group-item">{{$motion->motionName}}
                                        </a>
                                        <P>{{$motion->motionDescription}}</P>
                                        </li>
                                    </div>
                                </div>
                            </ul>
                        </div>

                        @endforeach
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</x-app-layout>