@foreach($items as $index => $item)
    <div class="flex items-center mb-4 gap-x-2">
        <input class="h-3.5 w-3.5 border-gray-300 text-indigo-600 focus:ring-indigo-600 peer" 
            type="checkbox"
            name="{{ $prefix }}[]"
            id="checkbox_{{ $item->id }}"
            value="{{ $item->id }}" 
            @if(in_array($item->id, $itemClinics)) checked @endif
        />
        
        <label class="p-1" for="checkbox_{{ $item->id }}">
            {{ $item[$prefix . '_title'] }}
        </label>     
        <img src="{{ asset('storage/icons/' . $item->icon_path) }}" class="w-5 h-5">
    </div>
@endforeach