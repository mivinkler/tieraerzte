<div class="space-y-3" id="filter-section-0">
    @foreach($therapies as $therapy)
        <div class="flex items-center">
            <input class="h-[12px] w-[12px] rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                type="checkbox"
                name="therapy_id[]"
                id="checkbox_{{ $therapy->id }}"
                onchange="this.form.submit();"  
                value="{{ $therapy->id }}"  
                @if($isChecked($therapy->id)) checked @endif
            >
            <label for="checkbox_{{ $therapy->id }}" class="ml-3">
                {{ $therapy->therapy_title }}
            </label>
        </div>
    @endforeach
</div>
