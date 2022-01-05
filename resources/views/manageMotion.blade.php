<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Motions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">


                    <!-- show all the Motions -->

                    @foreach($motion as $motion)

                    <ul class="list-group list-group-flush">

                        <li class="list-group-item">{{$motion->motionName}}</li>
                        <P>{{$motion->motionDescription}}</P>

                        <div class="w-1/5 flex">

                            <a href="{{url('dashboard/manageMotion/Motion/'.$motion->motionID)}}">Update</a>

                            <form action="{{url('dashboard/manageMotion/Motion/'.$motion->motionID)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit">Delete</button>
                            </form>

                        </div>

                    </ul>
                    @endforeach

                    <!-- Create New Genre Button -->
                    <div class="flex items-center justify-end mt-4">
                        <a href="{{ route('dashboard.motionCreate') }}">
                            <x-button class="ml-4">
                                {{ __('Create New Motion') }}
                            </x-button>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>