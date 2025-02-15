<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit ') }} {{$user->name}} {{ __(' Data ') }}
        </h2>
    </x-slot>

    @if (session()->has('message'))
    <div class="alert alert-success max-w-7xl mx-auto sm:px-6 lg:px-8 mt-3 alert-dismissible ">
        {{ session('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> @endif
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="POST" action="{{route('users.update',$user->id)}}">
                        @csrf
                        @method('PATCH')
                        {{-- في اي هاكينج يرفض الداتا عشان بتعمل توكين --}}
                        <!-- <input name='id' value="{{$user->id}}" hidden > -->
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label ">{{__('Name')}}</label>
                            <input type="text" class="form-control sm:rounded-lg" name='name' value=" {{$user->name}}" >
                            @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label ">{{__("Email")}}</label>
                            <input type="email" class="form-control sm:rounded-lg" name='email' value=" {{$user->email}}" >
                            @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

                    </form>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
