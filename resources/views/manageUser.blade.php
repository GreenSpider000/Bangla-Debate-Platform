<x-app-layout>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Genres') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @foreach($user as $user)
                    <ul class="list-group list-group-flush">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                <a href="{{url('dashboard/showUser/'.$user->id)}}">
                                    <li class="list-group-item">{{$user->userName}}</li>
</a>
                                </div>

                                <div class="col">
                                    <div class="container">
                                        <li class="list-group-item">
                                            <div class="row">
                                                <div class="col"><a href="{{url('dashboard/manageUser/User/'.$user->id)}}">Update</a></div>
                                                <div class="col">
                                                    <form action="{{url('dashboard/manageUser/User/'.$user->id)}}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </li>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </ul>
                    @endforeach




                    <!-- Create New Genre Button -->
                    <div class="flex items-center justify-end mt-4">
                        <a href="{{ route('dashboard.genreCreate') }}">
                            <x-button class="ml-4">
                                {{ __('Create a New user') }}
                            </x-button>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</x-app-layout>