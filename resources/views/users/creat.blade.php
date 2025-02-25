<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.Add User') }}
        </h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method='post' action="{{route('users.store')}}" enctype="multipart/form-data">
                        @csrf
                        {{-- في اي هاكينج يرفض الداتا عشان بتعمل توكين --}}
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">{{__('messages.name')}}</label>
                            <input type="text" class="form-control sm:rounded-lg" name='name'>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">{{__("messages.email")}}</label>
                            <input type="email" class="form-control sm:rounded-lg" name='email'>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{__('messages.password')}}</label>
                            <input type="password" class="form-control sm:rounded-lg" name='password'>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{__('messages.upload image')}}</label>
                            <input class="form-control sm:rounded-lg" type="file" name ="image">
                        </div>

                        <button type="submit" class="btn btn-primary">{{__("messages.Add")}}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
