@extends('layouts.layout_search')

@section('content')
<div class="">
    <form id="myForm" action="{{ route('praxis.index') }}" method="get">
        <div class="bg-sky-200">
            <div class="pb-14 pt-28 container w-[1200px] flex gap-10 items-end">

                <div id="filter_header" class="w-3/5 p-1.5">
                    <h1 class="text-2xl font-bold mb-6 text-sky-900">Tierarzt suchen</h1>
                    <x-filter.filter-header :title="request('title')" :postcode="request('postcode')" :radius="request('radius')"/>
                </div>
                <div class="w-2/5 text-base text-black">
                    <p class="">Hier können Sie schnell und einfach den richtigen Tierarzt finden. Starten Sie jetzt Ihre Suche und finden Sie zuverlässige tiermedizinische Hilfe in Ihrer Nähe.</p>
                </div>
            </div>
        </div>
        <div class="flex container w-[1200px]">

            <section id="filter_leftbar" class="w-80 px-8 pt-9 pb-52 h-full space-y-4 bg-slate-100">
                <div>
                    <h3 class="font-semibold mb-3 text-base">Fachbereiche</h3>
                    <x-filter.filter-therapy-list :therapies="$therapies" :category="1" :selected-therapies="$selectedTherapies" />
                </div>
                <div class="pt-3">
                    <h3 class="font-semibold mb-3 text-base">Leistungen</h3>
                    <x-filter.filter-therapy-list :therapies="$therapies" :category="2" :selectedTherapies="$selectedTherapies" />
                </div>
            </section>

            <section id="filter_result" class="w-4/5 mx-4 mt-6">
                <x-filter.filter-result :praxen="$praxen" :selectedTherapies="$selectedTherapies"/>
                <div class="ml-1 mt-24">
                    {{ $praxen->links() }}
                </div>
            </section>
        </div>
    </form>

</div>
@endsection
