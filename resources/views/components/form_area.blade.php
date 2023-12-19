<div class="{{ $column }}">
    <label for="{{ $name }}" class="block text-sm font-medium leading-6 text-gray-900">{{ $label }}</label>
    <div class="mt-2">
        <input 
            type="text" 
            name="{{ $name }}" 
            id="{{ $name }}" 
            @if(isset($value)) value="{{ $value }}" @endif 
            @if(isset($autocomplete)) autocomplete="{{ $autocomplete }}" @endif
            class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500"
            >
    </div>
</div>




