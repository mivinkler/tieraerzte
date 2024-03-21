@extends('layouts.user')

@section('content')
    <form action="{{ route('profile.update', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="flex flex-col gap-20 py-24 w-[800px] ml-64">
            <div class="grid gap-x-6 gap-y-8 grid-cols-8">
                @include('components.input_area', [
                    'name' => 'name',
                    'label' => 'Name',
                    'width' => 'col-span-8',
                    'value' => Auth::user()->name,
                ])

                @include('components.input_area', [
                    'name' => 'email',
                    'label' => 'Email',
                    'width' => 'sm:col-span-8',
                    'value' => Auth::user()->email,
                ])
                <div>
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                </div>
            </div>

            <div class="flex justify-end">
              <button type="submit"
                  class="object-right rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                  Speichern
              </button>
            </div>
        </div>
    </form>
@endsection
