<div class="{{ $width }}">
    <label for="{{ $name }}" class="w-full text-sm font-medium leading-6 text-gray-900">
        @if(isset($label)) 
            {{ $label }}
        @endif
    </label>
    <input
        id="{{ $name }}"
        name="{{ $name }}"
        type="text" 
        @if(empty($isAdmin)) 
            value="{{ $value }}" 
        @endif 
        class="w-full mt-2 rounded-sm border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500">
    @error($name)
        <div class="text-red-600">{{ $message }}</div>
    @enderror
</div>
