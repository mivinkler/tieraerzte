@extends('home.components.layout')

@section('content')

<section class="bg-indigo-300/75 pb-24">
    <div class="container max-w-[1400px]">
        @include('home.components.hero')
    </div>
</section>

<section class="container my-48 text-center w-1/2 bg-white">
    <div class=" text-violet-950">
        <h2 class="text-4xl mb-10 font-semibold">Tierarzt wählen</h2>
        <p class="text-xl leading-10">Unser Portal ermöglicht es Ihnen, aus einer breiten Palette von tierärztlichen Dienstleistungen zu wählen, von Routineuntersuchungen bis hin zu spezialisierten Behandlungen. Nutzen Sie unsere Vergleichsfunktionen, um sicherzustellen, dass Ihr Haustier die beste verfügbare Pflege erhält.</p>
    </div>
</section>

<section id="therapies" class="container max-w-[1400px]">
    @include('home.components.therapies')
</section>   

<section id="location" class="my-64 container max-w-[1400px] bg-indigo-300/75 h-96 rounded-md">
    @include('home.components.location')
</section>

<section class="my-64 text-violet-950 container max-w-[1460px]">
    @include('home.components.blog')
</section>

@endsection
