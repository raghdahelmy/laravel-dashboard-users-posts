<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.Trashed Users') }}
        </h2>

    </x-slot>
    @if (session('message'))
    <div class="alert alert-success max-w-7xl mx-auto sm:px-6 lg:px-8 mt-3  ">
        {{ session('message') }}
    </div> @endif

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if($users->isNotEmpty())

                    <table class = "table" >
                        <thead class="font-semibold text-xl text-gray-800 leading-tight">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{__('Name')}}</th>
                                <th scope="col">{{__('Email')}}</th>
                                <th scope="col">{{__('Deleted_at')}}</th>
                                <th scope="col">{{__('Action')}}</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $index=>$user)
                            <tr>
                                <th scope="row">{{$index+1}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->deleted_at}}</td>
                                <td>

                                    <div class="d-flex gap-2">
                                        <form action="{{route('users.forcedelete', $user->id)}}" method="POST" method="POST" onsubmit="return confirm('{{$user->name}} Are you sure you want to delete this post?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger py-1 ms-2" type="submit">{{ __('messages.delete') }}</button>
                                        </form>
                                        <form action="{{route('users.restore',$user->id)}}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-success py-1 ms-2">{{ __('messages.Restore') }} </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @else
                    <h1>{{__("messages.No deleted users")}}</h1>
                    @endif
                    <div>
                    </div>
                </div>
            </div>
            <a class="btn btn-dark py-2 my-3" href="{{route('users.index')}}">{{__('messages.Back to Users')}}</a>
        </div>

    </div>

</x-app-layout>
