<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.Create Post !') }}
        </h2>
    </x-slot>
    <form method="Post" action="{{route('posts.store')}}">
        @csrf
    <div class="py-6 mt-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="mb-3">
                        <label  class="form-label">{{__('messages.Title')}}</label>
                        <input type="text" class="form-control sm:rounded-lg"  placeholder="{{__('messages.Title')}}" name = 'title'>
                        @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                      </div>
                      <div class="mb-3">
                        <label  class="form-label">{{__('messages.Description')}}</label>
                        <textarea class="form-control sm:rounded-lg" name = 'description' rows="3" ></textarea>
                        @error('description')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                      </div>
                      <button type="submit" class="btn btn-primary">{{ __('messages.Create') }}</button>
                </div>
            </div>
        </div>
    </div>
</form>

</x-app-layout>
