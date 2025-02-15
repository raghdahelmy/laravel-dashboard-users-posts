<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
        <a class = "btn btn-primary pt-2 mt-3" href= "{{route('users.create')}}" >{{__('Add User')}}</a>
        <a class = "btn btn-danger pt-2 mt-3" href="{{ route('admin.users.trashed') }}">Trashed Users</a>
    </x-slot>

    @if (session('message'))
    <div class="alert alert-success max-w-7xl mx-auto sm:px-6 lg:px-8 mt-3 ">
        {{ session('message') }}
    </div> @endif

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
                            <th scope="row">{{ intval($index)+1}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>
                                <a href="{{route('users.show',$user->id)}}" class="btn btn-dark">{{__('show')}}</a>
                                <a href="{{route('users.edit',$user->id)}}" class="btn btn-dark">{{__('edit')}}</a>
                                <form action="{{route('users.destroy',$user->id)}}" method= POST>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger my-2">{{__('delete')}}</button>
                                </form>
                            </td>
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
