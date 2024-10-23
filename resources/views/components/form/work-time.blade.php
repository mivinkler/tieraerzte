@php
    $days = [
        'monday' => 'Mo.',
        'tuesday' => 'Di.',
        'wednesday' => 'Mi.',
        'thursday' => 'Do.',
        'friday' => 'Fr.',
        'saturday' => 'Sa.',
        'sunday' => 'So.',
    ];
@endphp
<div class="font-semibold pb-2">Öffnungszeiten</div>
<div class="mt-8 grid grid-cols-9 gap-y-6 gap-x-2">
    @foreach ($days as $day => $label)
        <div class="col-span-1 flex items-center">
            <label for="{{ $day }}" class="text-sm font-medium leading-6 text-gray-900">
                {{ $label }}
            </label>
        </div>
        <div class="col-span-2">
            <input
                id="{{ $day }}_start1"
                name="{{ $day }}_start1"
                type="time"
                value="{{ $praxis->timeTable->{$day . '_start1'} ?? '' }}"
                class="w-full rounded-sm border-0 py-0.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500">
        </div>
        <div class="col-span-2">
            <input
                id="{{ $day }}_end1"
                name="{{ $day }}_end1"
                type="time"
                value="{{ $praxis->timeTable->{$day . '_end1'} ?? '' }}"
                class="w-full rounded-sm border-0 py-0.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500">
        </div>
        <div class="col-span-2">
            <input
                id="{{ $day }}_start2"
                name="{{ $day }}_start2"
                type="time"
                value="{{ $praxis->timeTable->{$day . '_start2'} ?? '' }}"
                class="w-full rounded-sm border-0 py-0.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500">
        </div>
        <div class="col-span-2">
            <input
                id="{{ $day }}_end2"
                name="{{ $day }}_end2"
                type="time"
                value="{{ $praxis->timeTable->{$day . '_end2'} ?? '' }}"
                class="w-full rounded-sm border-0 py-0.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500">
        </div>
        @error($day)
            <div class="col-span-5 text-red-600">{{ $message }}</div>
        @enderror
    @endforeach
</div>
