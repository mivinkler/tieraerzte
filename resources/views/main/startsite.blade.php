@extends('layouts.layout_startsite')

@section('content')

<section class="bg-indigo-200 pb-24">
    <div class="container max-w-[1400px]">
        @include('components.startsite.hero')
    </div>
</section>

<section class="container my-48 text-center w-1/2 bg-white">
    <div class="">
        <h2 class="text-3xl text-violet-950 mb-10 font-semibold">Tierarzt wählen</h2>
        <p class="text-xl text-gray-900 leading-10">Unser Portal ermöglicht es Ihnen, aus einer breiten Palette von tierärztlichen Dienstleistungen zu wählen, von Routineuntersuchungen bis hin zu spezialisierten Behandlungen. Nutzen Sie unsere Vergleichsfunktionen, um sicherzustellen, dass Ihr Haustier die beste verfügbare Pflege erhält.</p>
    </div>
</section>

<section id="therapies" class="container max-w-[1400px]">
    @include('components.startsite.therapies')
</section>   

<section id="location" class="my-64 container max-w-[1400px] bg-indigo-300/75 h-96 rounded-md">
    @include('components.startsite.location')
</section>

<section class="my-64 text-violet-950 container max-w-[1460px]">
    @include('components.startsite.blog')
</section>

@endsection
