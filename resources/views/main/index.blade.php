@extends('layouts.main')

@section('content')
<main class="container">
    <form id="myForm" action="{{ route('praxis.index') }}" method="get">
        <div class="flex flex-wrap">

            <section name="filter_header" class="w-full flex items-baseline justify-between border-b border-gray-200 pb-6 pt-24">
                <h1 class="text-4xl font-semibold tracking-tight text-gray-800">Tierarzt suchen</h1>
                <div>
                    <input type="text" name="title" id="name_title" placeholder="Name der Praxis" value="{{ request('title') }}" class="rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500">
                    <input type="text" name="postcode" placeholder="PLZ" value="{{ request('postcode') }}" class="w-24 rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500">
                    <input type="number" name="radius" placeholder="Radius in km" value="{{ request('radius') }}" class="w-24 rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500">
                    <button type="submit" class="object-right rounded-md bg-indigo-600 px-3 py-1.5 ml-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Suchen</button>
                </div>             
            </section>


    
            <section name="filter_leftbar" class="basis-1/4 pb-24 pt-6">
                <div class="flex flex-wrap gap-8 border-b border-gray-200 py-4">
                    <h3 class="flow-root font-medium">Leistungen</h3>
                    <div class="space-y-6" id="filter-section-0">
                        @foreach($therapies as $therapy)
                            <div class="flex items-center">
                                <input name="therapy_id[]" id="checkbox_{{ $therapy->id }}" value="{{ $therapy->id }}" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"{{ in_array($therapy->id, $selectedTherapies) ? 'checked' : '' }}>
                                <label for="checkbox_{{ $therapy->id }}" class="ml-3 text-sm"> {{ $therapy->therapy_title }} </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <section name="filter_result" class="basis-3/4">
                @forelse($praxen as $praxis)
                    <div class="my-6 p-4 border rounded border-gray-100 bg-sky-50/25">
                        <a href="{{ route('praxis.show', $praxis->slug) }}">
                            <div class="font-medium">{{ $praxis->title }}</div>
                            <div class="text-sm">{{ $praxis->street }}</div>
                            <div class="text-sm">{{ $praxis->postcode }} {{ $praxis->locality }}</div>         
                            <div class="pt-4">{{ optional($praxis->text)->about_text }}</div>            
                        </a>
                    </div>  

                @empty
                    <p>Keine Ergebnisse gefunden</p>
                @endforelse 
                {{ $praxen->links() }}    
            </section>
            <div>

            </div>
        </div>
    </form>
</main>
<script>
   document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('myForm');
    var inputs = form.querySelectorAll('input[name]');
    
    function formSubmit() {
        inputs.forEach(function(input) {
            if (input.value.trim() === '') {
                input.removeAttribute('name');
            }
        });
        form.submit();
    }

    inputs.forEach(function(input) {
        input.addEventListener('input', formSubmit);
    });
});
</script>


@endsection
