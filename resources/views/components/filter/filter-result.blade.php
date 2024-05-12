@forelse($praxen as $praxis)
    <a href="{{ route('praxis.show', ['slug' => $praxis->slug, 'id' => $praxis->id]) }}">
        <div class="flex gap-x-6 mb-4 p-4 bg-sky-50/80 border border-gray-100 rounded">
            <div class="w-32 flex-none">
                {{-- TODO Добавить 'default.jpg' --}}
                <img class="rounded w-full" src="{{ $praxis->images->url }}" alt="">
            </div>
            <div class="w-full">
                <div>
                    <div class="font-semibold text-base">{{ $praxis->title }}</div>
                    <div>{{ $praxis->street }} {{ $praxis->house }}</div>
                    <div>{{ $praxis->postcode }} {{ $praxis->locality }}</div>
                </div>
                <div class="text-sm mt-5">
                    @foreach($praxis->therapyClinics as $therapyClinic)
                        @if(in_array($therapyClinic->therapy_id, $selectedTherapies))
                            <div class="mt-2">
                                <div class="leading-6"><span class="font-semibold">{{ $therapyClinic->therapy_title }}:</span> {{ $therapyClinic->therapy_text }}</div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </a>
@empty
    <p>Keine Ergebnisse gefunden</p>
@endforelse

