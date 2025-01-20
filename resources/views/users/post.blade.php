<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
        <a class = "btn btn-outline-danger pt-2 mt-3" href= "{{Route('posts.create')}}" >{{__('Create Post')}}</a>
    </x-slot>



    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 d-flex justify-content-evenly flex-wrap gap-3 ">
                   
                    @forelse ($posts as $index=>$post )
                    <div class="card w-25 mt-5">
                        <div class="card-body">
                            <h5 class="card-title fw-bold fs-5 flex-grow-1">{{$post->title ." " . $index+1}}</h5>
                            <p class="card-text flex-grow-1">{{$post->description}}.</p> 
                          <div class="d-flex justify-content-between gap-4">
                          <a href="#" class="btn btn-success p-2 flex-fill mt-4 ">{{__("edit")}}</a>
                          <a href="#" class="btn btn-danger p-2 flex-fill mt-4 ">{{__('delete')}}</a>
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
