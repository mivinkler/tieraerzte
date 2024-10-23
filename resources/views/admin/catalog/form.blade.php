@extends('layouts.layout_admin')

@section('content')
    <div class="mt-12 ml-20 w-1/2">
        <h2 class="font-semibold mb-5 text-xl">
            {{ isset($item) ? 'Edit' : 'Add New' }} {{ ucfirst($type) }}
        </h2>
        <form action="{{ isset($item) ? route('admin.catalog.update', [$type, $item->id]) : route('admin.catalog.store', $type) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($item))
                @method('PUT')
            @endif
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $item->{$type . '_title'} ?? '') }}" class="mt-1 block w-full px-2 py-1 border rounded">
            </div>
            <div class="mb-12">
                <label for="icon" class="block text-sm font-medium text-gray-700">Icon</label>
                @if(isset($item) && $item->icon_path)
                    <img src="{{ $item->icon_url }}" alt="{{ $item->{$type . '_title'} }}" class="w-6 h-6 mb-2">
                @endif
                <input type="file" name="icon" id="icon" class="mt-1 block w-full text-sm">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                    speichern
                </button>
            </div>
        </form> <!-- Закрытие формы здесь -->
        
        {{-- @if(isset($item))
            <form action="{{ route('admin.catalog.destroy', [$type, $item->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');" class="mt-4">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                    löschen
                </button>
            </form>
        @endif --}}
    </div>
@endsection
