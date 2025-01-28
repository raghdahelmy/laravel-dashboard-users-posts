<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit reply') }}
        </h2>
    </x-slot>
    <div class = " bg-white overflow-hidden shadow-sm sm:rounded-lg m-5 p-4">
    <form action="{{route('replies.update',$reply->id)}}" method="POST" class=" mx-auto w-50 m-3">
                            @csrf
                            @method('PATCH')

                            @if (session('messagee'))
    <div class="alert alert-success max-w-7xl mx-auto sm:px-6 lg:px-8 mt-3 ">
        {{ session('messagee') }}
    </div> @endif

    <div class="form-floating ">
  <textarea class ="form-control" name="content" id="floatingTextarea">{{$replies->content}}</textarea>
<input type="hidden" name="parent_comment_id" value="{{ $comment->parent_comment_id ?? null }}">

  <label for="floatingTextarea">Edit your comment here</label>
</div>
@error('content')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  <button type="submit" class="btn btn-outline-primary mt-3">Save</button>
                          </form>
                        </div>


</x-app-layout>
