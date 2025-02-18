<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Trashed Users') }}
        </h2>
        <a class = "btn btn-primary pt-2 mt-3" href= "{{ route('users.create') }}">{{ __('delete') }}</a>
        <a class = "btn btn-danger  pt-2 mt-3" href="{{ route('users.trashed') }}">
            {{ __('Restore') }}
        </a>
    </x-slot>

</x-app-layout>
