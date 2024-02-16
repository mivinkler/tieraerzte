@extends('layouts.main')

@section('content')
<div  class="bg-sky-200 w-full h-72">
    <div class="container h-full flex gap-14 items-center">
        <div class="border h-48 mb-6 sm:col-span-2 flex items-center">
            @if ($praxis->images)
                <img src="{{ asset('storage/' . $praxis->images->foto_path) }}" alt="Praxis Photo" class="w-full h-full object-contain">
            @endif
        </div>
        <div class="p-2 w-3/5">
            <h2 class="font-bold mb-2 text-gray-700"> {{ $praxis->title }} </h2>
            <div>{{ optional($praxis->text)->text_aboutus }}</div>
        </div> 
    </div>
</div>

<div class="container flex gap-5">
    <div class="basis-3/4 px-1 mt-16">    
        <div class="mb-20">
            {{ optional($praxis->text)->text_one }}
        </div>
        <div class="mb-24">
            <div class="font-semibold mb-8 text-lg">
                {{ optional($praxis->focus)->focus_headline }}
            </div>
            <div class="grid grid-cols-1 gap-x-16 gap-y-14 sm:grid-cols-2">
                <div>
                    <div class="font-semibold">{{ optional($praxis->focus)->focus_title_one }}</div>
                    <div class="mt-3">{{ optional($praxis->focus)->focus_text_one }}</div>
                </div>
                <div>
                    <div class="font-semibold">{{ optional($praxis->focus)->focus_title_two }}</div>
                    <div class="mt-3">{{ optional($praxis->focus)->focus_text_two }}</div>
                </div>
                <div>
                    <div class="font-semibold">{{ optional($praxis->focus)->focus_title_three }}</div>
                    <div class="mt-3">{{ optional($praxis->focus)->focus_text_three }}</div>
                </div>
                <div>
                    <div class="font-semibold">{{ optional($praxis->focus)->focus_title_four }}</div>
                    <div class="mt-3">{{ optional($praxis->focus)->focus_text_four }}</div>
                </div>
            </div>
        </div>
        
        <div class="mb-20">
            {{ optional($praxis->text)->freitext_two }}
        </div>

        <div class="mb-16">
            <h2 class="font-bold mb-8 text-lg">Unsere Leistungen:</h2>
        </div>
        <div>
            @foreach($praxis->clinicTherapies as $therapy)
                <div class="font-semibold">{{ $therapy->therapy->therapy_title }}</div>       
                <div class="mb-4">{{ $therapy->therapy_text }}</div>
            @endforeach
        </div>
        <div>
            <div class="mb-4">
                <div class="font-medium text-gray-900">{{ optional($praxis->therapyOthers)->other_one }}</div>
                <div>{{ optional($praxis->therapyOthers)->other_text_one }}</div>
            </div>
            
            <div class="mb-4">
                <div class="font-medium text-gray-900">{{ optional($praxis->therapyOthers)->other_two }}</div>
                <div>{{ optional($praxis->therapyOthers)->other_text_two }}</div>
            </div>
            
        </div>
    </div>


    <div class="basis-1/4 pl-6 pr-2 bg-slate-50 bg-opacity-50">
        <div class="mt-16">
            <h2 class="font-semibold mb-2"> {{ $praxis->title }} </h2>
            <div> {{$praxis->street}} </div>
            <div> {{$praxis->postcode}} {{$praxis->locality}} </div>
            <div class="my-2"> Tel: {{$praxis->tel}} </div>
            <div> Email: {{$praxis->email}} </div>
            <div> Webseite: {{$praxis->website}} </div>
        </div> 
    </div>
</div>
@endsection
