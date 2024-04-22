@extends('layouts.main')

@section('content')
<main class="container">
    <form id="myForm" action="{{ route('praxis.search.index') }}" method="get">
        <section id="filter_header" class="px-4 py-10 flex items-center justify-between border-b border-gray-200 bg-orange-200">
            <x-filter.filter-header :title="request('title')" :postcode="request('postcode')" :radius="request('radius')"/>
        </section>   
        <div class="bg-stone-300 flex mt-1">

            <section id="filter_leftbar" class="w-1/5 px-4 py-6 space-y-4 bg-slate-100">
                <div>
                    <h3 class="font-semibold mb-4">Fachbereiche</h3>
                    <x-filter.filter-therapy-list :therapies="$therapies" :category="1" :selected-therapies="$selectedTherapies" />
                </div>
                <div>
                    <h3 class="font-semibold my-4 pt-4 border-t border-gray-300">Leistungen</h3>
                    <x-filter.filter-therapy-list :therapies="$therapies" :category="2" :selectedTherapies="$selectedTherapies" />
                </div>     
            </section>

            <section id="filter_result" class="w-4/5 m-4">
                <x-filter.filter-result :praxen="$praxen" :selectedTherapies="$selectedTherapies"/>
            </section>

        </div>
    </form>
</main>
@endsection
