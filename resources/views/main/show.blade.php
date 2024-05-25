@extends('layouts.layout_praxis')

@section('content')
<div  class="bg-sky-200 w-full h-30vh">
    <div class="container w-[1280px] h-full flex gap-14 pb-20 pt-28 items-center">
        @if (isset($praxis->images))
            <div class="h-56 p-1">
                <img src="{{ asset($praxis->images->url) }}" alt="Praxis Photo" class="w-full h-full object-contain rounded-md outline outline-1 outline-white">
            </div>
        @endif
        <div class="w-3/5 p-1">
            <h1 class="font-bold mb-3 text-lg text-sky-900"> {{ $praxis->title }} </h1>
            <div class="text-base">{{ optional($praxis->text)->text_aboutus }}</div>
        </div> 
    </div>
</div>

<div class="container flex gap-20 w-[1280px] h-full">
    <div class="px-1 w-full h-full">  
        <section class="mt-20 mb-20">
            <div>
                @include('components.praxis.praxis-text', ['title' => 'title_one', 'text' => 'text_one'])
            </div>
            <div>
                @include('components.praxis.praxis-text', ['title' => 'title_two', 'text' => 'text_two'])
            </div>
            <div>
                @include('components.praxis.praxis-text', ['title' => 'title_three', 'text' => 'text_three'])
            </div>
        </section>

        <section>
            <h3 class="font-bold mb-6 text-lg text-sky-800">Leistungen</h3>
            @include( 'components.praxis.praxis-therapies', ['category' => '1'])
        </section>

        <section class="mt-10">
            {{-- <h3 class="font-bold mb-6 text-lg text-sky-800">Zusatzleistungen</h3> --}}
            @include('components.praxis.praxis-therapies', ['category' => '2'])
        </section> 
    </div>

    <div class="flex-none px-6 bg-sky-50/50 pt-12 text-sm">
        @include('components.praxis.praxis-sitebar')
    </div>
</div>
@endsection
