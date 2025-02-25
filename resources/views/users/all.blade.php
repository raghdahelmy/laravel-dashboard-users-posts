<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.Users') }}
        </h2>
        <a class = "btn btn-primary pt-2 mt-3" href= "{{route('users.create')}}" >{{__('messages.Add User')}}</a>
        <a class = "btn btn-danger pt-2 mt-3" href="{{ route('users.trashed') }}">{{__("messages.Trashed Users")}}</a>
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
                            <th scope="col">{{__('messages.image')}}</th>
                            <th scope="col">{{__('messages.name')}}</th>
                            <th scope="col">{{__('messages.email')}}</th>
                            <th scope="col">{{__('messages.created_at')}}</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse ($users as $index=>$user)
                          <tr>
                            <th scope="row">{{ intval($index)+1}}</th>
                            <td>
                                <img src="{{$user->getFirstMediaUrl('users')}}" alt="{{$user->getFirstMedia('users')->file_name ?? 'user profile pic'}}" width="100" height="100">
                            </td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>
                                <a href="{{route('users.show',$user->id)}}" class="btn btn-dark">{{__('messages.show')}}</a>
                                <a href="{{route('users.edit',$user->id)}}" class="btn btn-dark">{{__('messages.edit')}}</a>
                                <form action="{{route('users.destroy',$user->id)}}" method= "POST" onsubmit="return confirm('{{$user->name}} Are you sure you want to delete this post?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger my-2">{{__('messages.delete')}}</button>
                                </form>
                            </td>
                          </tr>
                            @empty
                            <h1>{{__("messages.Add user please")}}</h1>
                            @endforelse

                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
