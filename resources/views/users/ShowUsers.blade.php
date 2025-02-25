<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show ') }} {{$user->name}} {{ __('Data ') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form enctype="multipart/form-data">
                        @csrf
                        {{-- في اي هاكينج يرفض الداتا عشان بتعمل توكين --}}
                        <div class="m-2 p-2">
                        <img src="{{$user->getFirstMediaUrl('users')}}" class="img-fluid" alt="{{$user->getFirstMedia('users')->file_name ?? 'user profile pic'}}" width="100" height="100">

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label ">{{__('Name')}}</label>
                            <input type="text" class="form-control sm:rounded-lg" name='name' value=" {{$user->name}}" disabled>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label ">{{__("Email")}}</label>
                            <input type="email" class="form-control sm:rounded-lg" name='email' value=" {{$user->email}}" disabled>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="p-3 text-gray-900 row g-2">

                    @forelse ($user->post as $post )
                    <div class=" card col-lg-4 col-md-6 col-sm-12 ">
                        <div class="card-body">
                            <small>{{ $post->user->name ?? 'Unknown User' }}</small>

                            <h5 class="card-title fw-bold fs-5 mt-2">{{$post->title }}</h5>
                            <p class="card-text m-2">{{$post->description}}.</p>
                        </div>
                    </div>
                    @empty
                    <h1>{{__('Doesn\'t have post!')}}</h1>
                    @endforelse
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="p-3 text-gray-900 ">
                    <a href="{{route('users.index')}}" class="btn btn-dark">{{__('Back')}}</a>
            </div>
        </div>
    </div>

</x-app-layout>
