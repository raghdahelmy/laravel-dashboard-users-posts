<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
        <a class = "btn btn-primary pt-2 mt-3" href= "{{Route('users.create')}}" >{{__('Add User')}}</a>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{__('name')}}</th>
                            <th scope="col">{{__('email')}}</th>
                            <th scope="col">{{__('created_at')}}</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse ($users as $index=>$user  )
                          <tr>
                            <th scope="row">{{$index+1}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at}}</td>
                          </tr>
                            @empty
                            <h1>Add user please</h1>
                            @endforelse

                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
