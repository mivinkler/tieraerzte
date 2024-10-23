<div class="w-[220px]">
    <img class="w-full rounded-md outline outline-1 outline-white" src="{{ asset('storage/' . $praxis->images->map_path) }}" alt="">
</div>
<div class="mt-9 mb-3">
    <h2 class="font-semibold"> {{ $praxis->title }} </h2>
    <div> {{ $praxis->street }} {{ $praxis->house }}</div>
    <div> {{ $praxis->postcode }} {{ $praxis->locality }} </div>
</div>
<div>
    @if(!empty($praxis->tel))
        <div class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="#8b8b8b" fill-rule="evenodd" clip-rule="evenodd" class="h-4 w-4" viewBox="0 0 122.9 98.9">
                <path class="st0" d="M109,98.9H13.7v-14c0.5-16.3,14.9-28.7,23.6-42.8V29.7h14.5v8.9h19.5v-8.9h14.5v12.4 C95.2,57.2,109,67,109,84.7V98.9L109,98.9z M122.5,42.1c0-2.2,0.4-4.4,0.1-6.8c-10.7,3.5-21.1,2.5-31.3-3.1 c-0.4,3.8,0.2,7.2,1.6,10.4C96.5,50.6,122.2,53.3,122.5,42.1L122.5,42.1z M0.3,42.1c0-2.2-0.4-4.4-0.1-6.8 c10.7,3.5,21.1,2.5,31.3-3.1c0.4,3.8-0.2,7.2-1.6,10.4C26.3,50.6,0.5,53.3,0.3,42.1L0.3,42.1z M0,31.9C8.6-8.2,115.4-13,122.9,32 c-10.4,2.9-21,1.2-31.6-3.6c0.3-2.1-0.2-3.8-1.3-5.2c-6.3-7.9-51.4-8.2-57.2,0.3c-0.9,1.3-1.3,2.9-1.2,4.7 C21.1,34.6,10.5,36.1,0,31.9L0,31.9z M47.2,47.7c2.4,0,4.3,1.9,4.3,4.3c0,2.4-1.9,4.3-4.3,4.3c-2.4,0-4.3-1.9-4.3-4.3 C43,49.7,44.9,47.7,47.2,47.7L47.2,47.7z M74.8,71.7c2.4,0,4.3,1.9,4.3,4.3c0,2.4-1.9,4.3-4.3,4.3c-2.4,0-4.3-1.9-4.3-4.3 C70.5,73.7,72.4,71.7,74.8,71.7L74.8,71.7z M61,71.7c2.4,0,4.3,1.9,4.3,4.3c0,2.4-1.9,4.3-4.3,4.3c-2.4,0-4.3-1.9-4.3-4.3 C56.7,73.7,58.6,71.7,61,71.7L61,71.7z M47.2,71.7c2.4,0,4.3,1.9,4.3,4.3c0,2.4-1.9,4.3-4.3,4.3c-2.4,0-4.3-1.9-4.3-4.3 C43,73.7,44.9,71.7,47.2,71.7L47.2,71.7z M74.8,59.7c2.4,0,4.3,1.9,4.3,4.3c0,2.4-1.9,4.3-4.3,4.3c-2.4,0-4.3-1.9-4.3-4.3 C70.5,61.7,72.4,59.7,74.8,59.7L74.8,59.7z M61,59.7c2.4,0,4.3,1.9,4.3,4.3c0,2.4-1.9,4.3-4.3,4.3c-2.4,0-4.3-1.9-4.3-4.3 C56.7,61.7,58.6,59.7,61,59.7L61,59.7z M47.2,59.7c2.4,0,4.3,1.9,4.3,4.3c0,2.4-1.9,4.3-4.3,4.3c-2.4,0-4.3-1.9-4.3-4.3 C43,61.7,44.9,59.7,47.2,59.7L47.2,59.7z M74.8,47.7c2.4,0,4.3,1.9,4.3,4.3c0,2.4-1.9,4.3-4.3,4.3c-2.4,0-4.3-1.9-4.3-4.3 C70.5,49.7,72.4,47.7,74.8,47.7L74.8,47.7z M61,47.7c2.4,0,4.3,1.9,4.3,4.3c0,2.4-1.9,4.3-4.3,4.3c-2.4,0-4.3-1.9-4.3-4.3 C56.7,49.7,58.6,47.7,61,47.7L61,47.7z"/>
            </svg>
            {{ $praxis->tel }}
        </div>
    @endif
    {{-- @if(!empty($praxis->user->email))
        <div class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="#8b8b8b" viewBox="0 0 122.88 68.57">
                <title>mail</title>
                <path d="M3.8,0,62.48,47.85,118.65,0ZM0,80.52,41.8,38.61,0,4.53v76ZM46.41,42.37,3.31,85.57h115.9L78,42.37,64.44,53.94h0a3,3,0,0,1-3.78.05L46.41,42.37Zm36.12-3.84,40.35,42.33V4.16L82.53,38.53Z"/>
            </svg>
            {{ $praxis->user->email }}
        </div>
    @endif --}}
    @if(!empty($praxis->website))
        <div class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="#8b8b8b" viewBox="0 0 122.88 122.88">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M61.439,0c33.928,0,61.44,27.513,61.44,61.439c0,33.929-27.513,61.44-61.44,61.44 C27.512,122.88,0,95.368,0,61.439C0,27.513,27.512,0,61.439,0L61.439,0z M78.314,6.495c20.618,6.853,36.088,24.997,39.068,47.101 l-1.953-0.209c-0.347,1.495-0.666,1.533-0.666,3.333c0,1.588,2,2.651,2,6.003c0,0.898-2.109,2.694-2.202,3.007l-3.132-3.674v4.669 l-0.476-0.018l-0.844-8.615l-1.749,0.551l-2.081-6.409l-6.855,7.155l-0.082,5.239l-2.238,1.501l-2.377-13.438l-1.422,1.039 l-3.22-4.345l-4.813,0.143l-1.844-2.107l-1.887,0.519l-3.712-4.254l-0.717,0.488l2.3,5.878h2.669v-1.334h1.333 c0.962,2.658,2.001,1.084,2.001,2.669c0,5.547-6.851,9.625-11.339,10.669c0.24,1.003,0.147,2.003,1.333,2.003 c2.513,0,1.264-0.44,4.003-0.667c-0.127,5.667-6.5,12.435-9.221,16.654l1.218,8.69c0.321,1.887-3.919,3.884-5.361,6.009 l0.692,3.329l-1.953,0.789c-0.342,3.42-3.662,7.214-7.386,7.214h-4c0-4.683-3.336-11.366-3.336-14.675 c0-2.81,1.333-3.188,1.333-6.669c0-3.216-3.333-7.828-3.333-8.67v-5.336h-2.669c-0.396-1.487-0.154-2-2-2h-0.667 c-2.914,0-2.422,1.333-5.336,1.333h-2.669c-2.406,0-6.669-7.721-6.669-8.671v-8.003c0-3.454,3.161-7.214,5.336-8.672v-3.333 l3.002-3.052l1.667-0.284c3.579,0,3.154-2,5.336-2H49.4v4.669L56,43.532l0.622-2.848c2.991,0.701,3.769,2.032,7.454,2.032h1.333 c2.531,0,2.667-3.358,2.667-6.002l-5.343,0.528l-2.324-5.064l-2.311,0.615c0.415,1.812,0.642,1.059,0.642,2.587 c0,0.9-0.741,1-1.335,1.334l-2.311-5.865l-4.969-3.549l-0.66,0.648l4.231,4.452c-0.562,1.597-0.628,6.209-2.961,2.979l2.182-1.05 l-5.438-5.699l-3.258,1.274l-3.216,3.08c-0.336,2.481-1.012,3.729-3.608,3.729c-1.728,0-0.685-0.447-3.336-0.667v-6.669h6.002 l-1.945-4.442l-0.721,0.44V24.04l9.747-4.494c-0.184-1.399-0.408-0.649-0.408-2.175c0-0.091,0.655-1.322,0.667-1.336l2.521,1.565 l-0.603-2.871l-3.889,0.8l-0.722-3.49c3.084-1.624,9.87-7.34,12.028-7.34h2.002c2.107,0,7.751,2.079,8.669,3.333L62.057,7.49 l3.971,3.271l0.381-1.395l2.964-0.812l0.036-1.855h1.336v2L78.314,6.495L78.314,6.495z M116.963,71.835 c-0.154,0.842-0.324,1.676-0.512,2.504l-0.307-2.152L116.963,71.835L116.963,71.835z M115.042,79.398 c-0.147,0.446-0.297,0.894-0.455,1.336h-0.49v-1.336H115.042L115.042,79.398z M11.758,93.18 c-3.624-5.493-6.331-11.641-7.916-18.226l10.821,5.218l0.055,3.229c0,1.186-2.025,3.71-2.667,4.669L11.758,93.18L11.758,93.18z"/>
            </svg>
            {{ $praxis->website }}
        </div>
    @endif
</div>

<div class="mt-8">
    <div class="flex gap-x-2 mb-3">
        @foreach($praxis->serviceClinics as $serviceClinic)
            @if($serviceClinic->serviceList && $serviceClinic->serviceList->icon_path)
                <img class="w-5 h-5" src="{{ asset('storage/icons/' . $serviceClinic->serviceList->icon_path) }}" alt="Service: {{ $serviceClinic->service_title }}" title="Service: {{ $serviceClinic->service_title }}">
            @endif
        @endforeach
    </div>
    <div class="flex gap-x-2 mb-3">
        @foreach($praxis->deviceClinics as $deviceClinic)
            @if($deviceClinic->deviceList && $deviceClinic->deviceList->icon_path)
                <img class="w-5 h-5" src="{{ asset('storage/icons/' . $deviceClinic->deviceList->icon_path) }}" alt="device: {{ $deviceClinic->device_title }}" title="device: {{ $deviceClinic->device_title }}">
            @endif
        @endforeach
    </div>
    <div class="flex gap-x-2">
        @foreach($praxis->languageClinics as $languageClinic)
            @if($languageClinic->languageList && $languageClinic->languageList->icon_path)
                <img class="w-5 h-5" src="{{ asset('storage/icons/' . $languageClinic->languageList->icon_path) }}" alt="language: {{ $languageClinic->language_title }}" title="language: {{ $languageClinic->language_title }}">
            @endif
        @endforeach
    </div>
</div>
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

<div class="mt-10">
    <div class="font-semibold pb-2">Öffnungszeiten</div>
    <div>
        @foreach ($days as $day => $label)
            <div class="flex">
                <div class="w-8 mr-2">{{ $label }}</div>
                <div class="flex gap-4">
                    @php
                        $morning_start = optional($praxis->timeTable)->{$day . '_start1'};
                        $morning_end = optional($praxis->timeTable)->{$day . '_end1'};
                        $afternoon_start = optional($praxis->timeTable)->{$day . '_start2'};
                        $afternoon_end = optional($praxis->timeTable)->{$day . '_end2'};
                    @endphp
                    <div>
                        {{ $morning_start ? \Carbon\Carbon::createFromFormat('H:i:s', $morning_start)->format('H:i') : '' }}-{{ $morning_end ? \Carbon\Carbon::createFromFormat('H:i:s', $morning_end)->format('H:i') : '' }}
                    </div>
                    <div>
                        {{ $afternoon_start ? \Carbon\Carbon::createFromFormat('H:i:s', $afternoon_start)->format('H:i') : '' }}-{{ $afternoon_end ? \Carbon\Carbon::createFromFormat('H:i:s', $afternoon_end)->format('H:i') : '' }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="mt-12">
    <div class="font-semibold mb-1">Nächster freie Termin:</div> 
    <div> {{ optional($praxis->timeOutput)->next_free_time}} </div> 
</div>

<div class="mt-6 flex gap-x-2">
    <div class="font-semibold mb-1">Intervall:</div> 
    <div> {{ optional($praxis->timeInterval)->days_interval}} Tage</div> 
</div>

<div class="mt-8">
    @include('components.praxis.praxis-contact')
</div>