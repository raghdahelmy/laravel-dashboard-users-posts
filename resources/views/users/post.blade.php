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
                            <!-- كتابة تعليق -->
                            <form action="{{route('comments.store')}}" method="POST" class="mt-2">
                                @csrf
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" name="content" id="floatingTextarea"></textarea>
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                    <input type="hidden">

                                    <label for="floatingTextarea">Write Your comment !</label>
                                </div>
                                <button type="submit" class="btn btn-outline-secondary m-2">Add Comment</button>
                            </form>
                            <!--   عرض التعليقات  -->
                            <div class="comments mt-4">
                                <h6>Comments:</h6>
                                <ul class="list-group mt-2">
                                    @forelse ($post->comments as $comment)
                                    <li class="list-group-item">
                                        <h6>{{ $comment->user->name ?? 'Unknown User' }}</h6>
                                        <p>{{ $comment->content }}</p>
                                        <small>{{__('Created at:')}} {{ $comment->created_at->format('F j, Y, g:i a') }}</small>
                                        <div class="d-flex gap-2 ">
                                            <a href="{{route('comments.edit', $comment->id)}}" class="btn btn-outline-primary mb-2 ">{{__("edit")}}</a>


                                            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-outline-danger p-2 mb-2 " name='button'>{{__('delete')}}</button>
                                            </form>
                                        </div>
                                    </li>
                                    <!-- كتابة رد  -->

                                    <form action="{{route('replies.store')}}" method = "POST">
                                        @csrf
                                        <div class="mb-1">
                                            <input type="text" class="form-control rounded" name = "content" placeholder= "reply">
                                            <input type="hidden" name="parent_comment_id" value="{{ $comment->id  }}">
                                        </div>

                                        <button type="submit" class="btn btn-primary">Add reply</button>
                                    </form>



                                    <!-- عرض الردود -->


                                    <div class="comments m-3 ">
                                        <h6>replies:</h6>

                                        <ul class="list-group ml-4">
                                            @forelse ($comment->replies as $reply)
                                            <li class="list-group-item ml-4">
                                                <h6>{{ $reply->user->name ?? 'Unknown User' }}</h6>
                                                <p>{{ $reply->content }}</p>
                                                <small>{{__('Created at:')}} {{ $reply->created_at->format('F j, Y, g:i a') }}</small>
                                                <div class="d-flex gap-2 ">
                                                    <a href="{{Route('replies.edit', $reply->id)}}" class="btn btn-outline-primary mb-2 ">{{__("edit")}}</a>


                                                    <form action="{{ route('replies.destroy', $reply->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-outline-danger p-2 mb-2 " name='button'>{{__('delete')}}</button>
                                                    </form>
                                                </div>
                                            </li>

                                            @empty
                                            <li class="list-group-item text-muted">No replies yet</li>
                                            @endforelse
                                        </ul>
                                    </div>
                                    <hr class="border border-2 border-dark my-3 ">

                                    @empty
                                    <li class="list-group-item text-muted m-2">No comments yet</li>

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
