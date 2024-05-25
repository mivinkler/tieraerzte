@extends('layouts.layout_user')

@section('content')
    @php
        $isUser = Auth::user()->role == 1;
        $isAdmin = Auth::user()->role == 0;
        $actionUrl = $isUser ? route('admin.user.update', Auth::user()->id) : route('admin.user.store');
    @endphp

    <form action="{{ $actionUrl }}" method="post" enctype="multipart/form-data" id="myForm">
        @csrf
        @if ($isUser)
            @method('patch')
        @endif

        <div class="flex flex-col gap-20 py-24 w-[800px] ml-64">
            <div class="grid gap-x-6 gap-y-8 grid-cols-8">
                @include('components.form.input', [
                    'name' => 'name',
                    'label' => 'Name',
                    'width' => 'col-span-8',
                    'value' => Auth::user()->name,
                ])

                @include('components.form.input', [
                    'name' => 'email',
                    'label' => 'Email',
                    'width' => 'sm:col-span-8',
                    'value' => Auth::user()->email,
                ])
                <div>
                    @if($isUser)
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    @endif
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="object-right rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Speichern
                </button>
            </div>
        </div>
    </form>
@endsection
