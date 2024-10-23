@extends('layouts.layout_admin')

@section('content')
    <div class="mt-12 ml-20">
        <h2 class="font-semibold mb-5 text-xl">{{ ucfirst($type) }} List</h2>
        <div>
            <a href="{{ route('admin.catalog.create', $type) }}" class="bg-blue-500 hover:bg-blue-600 text-white p-1.5 rounded">Add new {{ ucfirst($type) }}</a>
        </div>
        <div class="mt-12">
            @foreach($items as $item)
                <div class="flex items-center pb-3 gap-x-4 w-1/4">
                    
                    <div class="flex items-center gap-4">
                        <img src="{{ asset('storage/icons/' . $item->icon_path) }}" class="w-6 h-6 mb-2">

                    </div>

                    <div class="w-48">
                        {{ $item->{$type . '_title'} }}
                    </div>

                    <div>
                        <a href="{{ route('admin.catalog.edit', [$type, $item->id]) }}" class="text-blue-500 hover:underline">Edit</a>
                    </div>

                    {{-- <div>
                        <form action="{{ route('admin.catalog.destroy', [$type, $item->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                        </form>
                    </div> --}}
                </div>
            @endforeach
        </div>
    </div>
@endsection
