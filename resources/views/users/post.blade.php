<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
        <a class="btn btn-outline-danger pt-2 mt-3" href="{{Route('posts.create')}}">{{__('Create Post')}}</a>
    </x-slot>

    {{-- @livewire('notifications') --}}
    @if (session('messagee'))
    <div class="alert alert-success max-w-7xl mx-auto sm:px-6 lg:px-8 mt-3 ">
        {{ session('messagee') }}
    </div> @endif

    @if (session('message'))
    <div class="alert alert-success max-w-7xl mx-auto sm:px-6 lg:px-8 mt-3 ">
        {{ session('message') }}
    </div>
    @endif

    @if(session('notification'))
    <div class="alert alert-info max-w-7xl mx-auto sm:px-6 lg:px-8 mt-3">
        {{ session('notification') }}
    </div>
    @endif

    <!--
{{-- @if(session('toastr'))
    <script>
        toastr.{{ session('toastr.type') }}('{{ session('toastr.message') }}');
    </script>
@endif --}} -->


    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="p-6 text-gray-900 d-flex gap-2">
                    @forelse ($posts as $index=>$post )
                    <div class="card mt-2 col-lg-4 col-md-6 col-sm-12">
                        <div class="card-body">
                            <small>{{ $post->user->name ?? 'Unknown User' }}</small>

                            <h5 class="card-title fw-bold fs-5 mt-2">{{ $index+1 ."- " .$post->title }}</h5>
                            <p class="card-text m-2">{{$post->description}}.</p>
                            <div class="d-flex gap-2 ">
                                <a href="{{Route('posts.edit', $post->id)}}" class="btn btn-success mb-2 ">{{__("edit")}}</a>


                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger p-2 mb-2 " name='button'>{{__('delete')}}</button>
                                </form>
                            </div>
                            <small>Created at: {{ $post->created_at->format('F j, Y, g:i a') }}</small>
                            <div class="comments mt-4">
                                <h6>Comments:</h6>
                                <ul class="list-group mt-2">
                                    @forelse ($post->comments as $comment)
                                        <li class="list-group-item">
                                            <h6>{{ $comment->user->name ?? 'Unknown User' }}</h6>: {{ $comment->content }}
                                        </li>
                                    @empty
                                        <li class="list-group-item text-muted">No comments yet</li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                    @empty
                    <h1>Add post!</h1>
                    @endforelse
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
