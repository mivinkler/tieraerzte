<section>
    <div class="columns-2 p-1 gap-20">
        @foreach($therapies->where('category', $category) as $therapy)
            <div class="box break-inside-avoid flex items-center gap-3 mb-3 flex-wrap toggle-textarea">
                <input class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" 
                    type="checkbox"
                    name="therapy[]"
                    id="checkbox_{{ $therapy->id }}"
                    value="{{ $therapy->id }}" 
                    data-textarea-id="{{ $therapy->id }}" 
                    data-textarea-prefix="therapy_" 
                    onchange="toggleTextarea(this)" 
                        @if($praxis && in_array($therapy->id, $praxis->therapyClinics->pluck('therapy_id')->toArray()))
                            checked
                        @endif
                    />
                <label class="p-1"
                    for="checkbox_{{ $therapy->id }}">
                    {{ $therapy->therapy_title }}</label>
                <textarea class="w-full h-16 rounded-sm border-1 p-1 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500"
                    name="therapy_text[{{ $therapy->id }}]" 
                    id="therapy_{{ $therapy->id }}" 
                    maxlength="255"
                    >@if($praxis && $praxis->therapyClinics->where('therapy_id', $therapy->id)->first()){{ $praxis->therapyClinics->where('therapy_id', $therapy->id)->first()->therapy_text }}@endif</textarea>
            </div>
        @endforeach

        @for ($i = $startIndex; $i < $endIndex; $i++)
            <div class="box break-inside-avoid flex items-center gap-3 mb-3 flex-wrap toggle-textarea">
                <input class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600"
                    type="checkbox"/>
                <input type="hidden" name="category" value="{{ $category }}">
                <input class="basis-3/5 p-1 rounded-sm text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500"
                    type="text" 
                    name="therapy_other[{{ $i }}]"
                    value="{{ $praxis->therapyOthers[$i]->therapy_other ?? '' }}"/>
                <textarea class="w-full h-16 rounded-sm border-1 p-1 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500"
                    name="therapy_other_text[{{ $i }}]" 
                    maxlength="255"
                    >{{ $praxis->therapyOthers[$i]->therapy_other_text ?? '' }}</textarea>
            </div>
        @endfor
    <div>
</section>
