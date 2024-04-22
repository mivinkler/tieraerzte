@forelse($praxen as $praxis)
    <a href="{{ route('praxis.show', $praxis->slug) }}">
        <div class="flex mb-4 p-4 gap-2 border rounded border-gray-100 bg-sky-50/25">
            <div class="h-full basis-1/7">
                {{-- TODO Добавить 'default.jpg'--}}
                <img src="{{ asset('storage/' . optional($praxis->images)->foto_path ?? 'default.jpg') }}" alt="Praxis Photo" class="h-32">
            </div>
            <div class="basis-6/7">
                <div>
                    <div class="font-semibold">{{ $praxis->title }}</div>
                    <div>{{ $praxis->street }} {{ $praxis->house }}</div>
                    <div>{{ $praxis->postcode }} {{ $praxis->locality }}</div>   
                </div>          
                <div class="text-sm mt-6">
                    @foreach($praxis->therapyClinics as $therapyClinic)
                        @if(in_array($therapyClinic->therapy_id, $selectedTherapies))
                            <div class="mt-2">
                                <h3 class="font-medium">{{ $therapyClinic->therapy_title }}:</h3>
                                <p>{{ $therapyClinic->therapy_text }}</p>
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
{{ $praxen->links() }}
