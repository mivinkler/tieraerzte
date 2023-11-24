<div class="mb-4">
    <div class="flex text-sm flex-wrap gap-4 items-center">
        <input name="catalog_id[{{ $catalog_id }}]" id="{{ $catalog_id }}" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
        <label name="checkbox_title[{{ $title }}]" id="{{ $title }}" for="{{ $catalog_id }}" class="basis-11/12 p-1.5 font-medium text-gray-900">{{ $title }}</label>
        <textarea name="text[{{ $text }}]" id="{{ $text }}" class="w-full ml-8 rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-600 hidden"></textarea>
    </div>
</div>
