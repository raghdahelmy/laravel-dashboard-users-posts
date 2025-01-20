<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add User') }}
        </h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method='post' action = {{route('users.store')}}>
                        @csrf
                        {{-- في اي هاكينج يرفض الداتا عشان بتعمل توكين --}}
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">{{__('name')}}</label>
                          <input type="text" class="form-control" name='name'>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">{{__("email")}}</label>
                            <input type="email" class="form-control" name='email'>
                          </div>

                        <div class="mb-3">
                          <label  class="form-label">{{__('password')}}</label>
                          <input type="password" class="form-control" name='password'>
                        </div>

                        <button type="submit" class="btn btn-primary">Add</button>
                      </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
