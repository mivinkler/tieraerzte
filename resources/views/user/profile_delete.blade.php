@extends('layouts.layout_user')

@section('content')

<div class="w-2/3 container mt-20">
    <form action="{{ route('user.delete', Auth::user()->id) }}" method="post">
        @csrf
        @method('delete')
        <div class="flex flex-col gap-10">
            <textarea class="border border-gray-300 rounded-sm h-48 p-2"></textarea>
            <button type="submit" class="px-3 py-2 w-fit text-xs font-medium text-center text-white bg-red-700 rounded hover:bg-orange-800">
                Account löschen
            </button>
        </div>
    </form>
</div>

@endsection