<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit comments') }}
        </h2>
    </x-slot>
    <form action="{{route('comments.update',$comment->id)}}" method="POST" class="mt-2">
                            @csrf
                            @method('PATCH')

                            @if (session('messagee'))
    <div class="alert alert-success max-w-7xl mx-auto sm:px-6 lg:px-8 mt-3 ">
        {{ session('messagee') }}
    </div> @endif

                          <div class="form-floating">
  <textarea class="form-control" name="content" id="floatingTextarea">{{$comment->content}}</textarea>
  <input type="hidden" name="post_id" value="{{ $comment->post_id }}">
<input type="hidden" name="parent_comment_id" value="{{ $comment->parent_comment_id ?? null }}">

  <label for="floatingTextarea">Edit your comment here</label>
</div>
@error('content')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  <button type="submit" class="btn btn-outline-secondary m-2">Save</button>
                          </form>


</x-app-layout>
