<div class="w-1/2">
    @foreach($items as $index => $item)
        @if($index < 12)
            <div class="break-inside-avoid group flex flex-wrap items-center mb-4 gap-x-2 gap-y-1">
                <input class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600 peer" 
                    type="checkbox"
                    name="{{ $prefix }}[]"
                    id="checkbox_{{ $item->id }}"
                    data-textarea-id="{{ $prefix }}_{{ $item->id }}"
                    value="{{ $item->id }}" 
                    @if(isset($itemClinics[$item->id])) checked @endif
                />
                <label class="p-1 font-semibold" for="checkbox_{{ $item->id }}">
                    {{ $item->$itemTitle }}
                </label>
                <textarea class="w-full ml-6 h-auto min-h-16 max-h-[200px] rounded overflow-hidden border-1 px-1.5 py-0.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500 hidden peer-checked:block"
                    name="{{ $prefix }}_text[{{ $item->id }}]" 
                    id="{{ $prefix }}_{{ $item->id }}" 
                    maxlength="300"
                    oninput="autoResize(this)"
                >{{ $itemClinics[$item->id] ?? '' }}</textarea>
            </div>
        @endif
    @endforeach
</div>
<div class="w-1/2">
    @foreach($items as $index => $item)
        @if($index >= 12)
            <div class="break-inside-avoid group flex flex-wrap items-center mb-4 gap-x-2 gap-y-1">
                <input class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600 peer" 
                    type="checkbox"
                    name="{{ $prefix }}[]"
                    id="checkbox_{{ $item->id }}"
                    data-textarea-id="{{ $prefix }}_{{ $item->id }}"
                    value="{{ $item->id }}" 
                    @if(isset($itemClinics[$item->id])) checked @endif
                />
                <label class="p-1 font-semibold" for="checkbox_{{ $item->id }}">
                    {{ $item->$itemTitle }}
                </label>
                <textarea class="w-full ml-6 h-auto min-h-16 max-h-[200px] rounded overflow-hidden border-1 px-1.5 py-0.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500 hidden peer-checked:block"
                    name="{{ $prefix }}_text[{{ $item->id }}]" 
                    id="{{ $prefix }}_{{ $item->id }}" 
                    maxlength="300"
                    oninput="autoResize(this)"
                >{{ $itemClinics[$item->id] ?? '' }}</textarea>
            </div>
        @endif
    @endforeach

    @for ($index = 0; $index < 2; $index++)
        @php
            $titleKey = $prefix . '_other_title';
            $textKey = $prefix . '_other_text';
            
            $other = $itemOther[$index] ?? ['isChecked' => false, $titleKey => '', $textKey => ''];
            $isChecked = !empty($other[$titleKey]) || !empty($other[$textKey]);
        @endphp
        <div class="break-inside-avoid group flex flex-wrap items-center mb-4 gap-x-2 gap-y-1">
            <input class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600 peer"
                type="checkbox"
                data-textarea-id="{{ $prefix }}_other_text_{{ $index }}"
                @if($isChecked) checked @endif
            />
            <input class="basis-3/5 px-1.5 py-0.5 rounded-sm text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500"
                type="text"
                name="{{ $prefix }}_other_title[{{ $index }}]"
                id="{{ $prefix }}_other_title_{{ $index }}"
                value="{{ $other[$titleKey] }}"
            />
            <textarea class="w-full ml-6 h-auto min-h-16 max-h-[200px] rounded overflow-hidden border-1 px-1.5 py-0.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500 hidden peer-checked:block"
                name="{{ $prefix }}_other_text[{{ $index }}]"
                id="{{ $prefix }}_other_text_{{ $index }}"
                maxlength="255"
                oninput="autoResize(this)"
            >{{ $other[$textKey] }}</textarea>
        </div>
    @endfor
</div>

<script>
    function autoResize(textarea) {
        textarea.style.height = 'auto';
        textarea.style.height = (textarea.scrollHeight) + 'px';
    }

    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('textarea').forEach(function (textarea) {
            autoResize(textarea);
        });
    });
</script>
