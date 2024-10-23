@forelse($praxen as $praxis)
    <a href="{{ route('praxis.show', ['slug' => $praxis->slug, 'id' => $praxis->id]) }}">
        <div class="flex gap-x-6 mb-4 p-4 bg-sky-50/50 border border-gray-100 rounded">
            <div class="w-32 flex-none">
                {{-- TODO Добавить 'default.jpg' --}}
                @if(isset($praxis->images->foto_path)) 
                    <img class="rounded w-full" src="{{ 'storage/' . $praxis->images->foto_path }}" alt="">

                    
                @else
                    <div class="h-[114px] bg-[#edf5fd] border border-gray-200 rounded flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 border rounded p-1 bg-slate-50" fill="#94a3b8" viewBox="0 0 122.88 104.81" fill-rule="evenodd" clip-rule="evenodd">
                            <path d="M11.51,102.9v-44c-2.34,0.9-4.53,0.92-6.35,0.3c-1.42-0.48-2.62-1.34-3.5-2.45c-0.88-1.11-1.44-2.46-1.61-3.95 c-0.26-2.31,0.43-4.92,2.4-7.37l0,0c0.1-0.12,0.21-0.24,0.34-0.34L59.85,0.55c0.74-0.68,1.88-0.75,2.7-0.11l57.19,44.46l0,0 c0.09,0.07,0.17,0.14,0.25,0.23c2.65,2.85,3.31,6.01,2.67,8.68c-0.32,1.32-0.95,2.5-1.82,3.48c-0.87,0.98-1.98,1.74-3.24,2.19 c-2,0.72-4.38,0.7-6.79-0.44v43.74h-5.6v-46.2c0-1.01-39.23-32.02-43.56-35.39c-4.59,3.49-44.54,34.25-44.54,35.55v46.18 L11.51,102.9L11.51,102.9z M63.34,55.69v17.99h16.14v-0.05c0-4.96-2.03-9.47-5.3-12.74C71.33,58.04,67.54,56.13,63.34,55.69 L63.34,55.69z M63.34,77.48v15.62h16.14V77.48H63.34L63.34,77.48z M59.54,93.09V77.48H43.4v15.62H59.54L59.54,93.09z M59.54,73.68 V55.69c-4.21,0.45-7.99,2.35-10.84,5.2c-3.27,3.27-5.3,7.78-5.3,12.74v0.05H59.54L59.54,73.68z M35.59,101.02h51.69v3.8H35.59 V101.02L35.59,101.02z M61.44,51.79c6.01,0,11.47,2.46,15.42,6.41c3.96,3.96,6.41,9.42,6.41,15.42v23.26H39.6V73.62 c0-6.01,2.46-11.47,6.41-15.42C49.97,54.25,55.43,51.79,61.44,51.79L61.44,51.79z M93.76,3.55l17.17,0.7v23.19L93.76,16.11V3.55 L93.76,3.55L93.76,3.55z"></path>
                        </svg>
                    </div>

                @endif
            </div>
            <div class="flex flex-wrap w-full">
                <div class="w-9/12 h-fit mb-6">
                    <div class="font-semibold">{{ $praxis->title }}</div>
                    <div class="text-[15px]">{{ $praxis->street }} {{ optional($praxis)->house }}</div>
                    <div class="text-[15px]">{{ $praxis->postcode }} {{ $praxis->locality }}</div>
                </div>
                <div class="w-3/12">
                    <div class="flex gap-2 flex-wrap h-fit w-full">     
                        
                        @foreach($praxis->deviceClinics as $deviceClinic)
                            @if($deviceClinic->deviceList && $deviceClinic->deviceList->icon_path)
                                <img class="w-[18px] h-[18px]" src="{{ asset('storage/icons/' . $deviceClinic->deviceList->icon_path) }}" alt="Geräte: {{ $deviceClinic->device_title }}" title="Geräte: {{ $deviceClinic->device_title }}">
                            @endif
                        @endforeach

                        @foreach($praxis->serviceClinics as $serviceClinic)
                            @if($serviceClinic->serviceList && $serviceClinic->serviceList->icon_path)
                                <img class="w-[18px] h-[18px]" src="{{ asset('storage/icons/' . $serviceClinic->serviceList->icon_path) }}" alt="Service: {{ $serviceClinic->service_title }}" title="Service: {{ $serviceClinic->service_title }}">
                            @endif
                        @endforeach         
                    
                        @foreach($praxis->languageClinics as $languageClinic)
                            @if($languageClinic->languageList && $languageClinic->languageList->icon_path)
                                <img class="w-[18px] h-[18px]" src="{{ asset('storage/icons/' . $languageClinic->languageList->icon_path) }}" alt="Fremdsprachen: {{ $languageClinic->language_title }}" title="Fremdsprachen: {{ $languageClinic->language_title }}">
                            @endif
                        @endforeach
                    </div>

                    @if($praxis->timeOutput && $praxis->timeOutput->next_free_time)
                        <div class="mt-4 text-sm">
                            <div class="font-semibold">Nächster freie Termin:</div>
                            <div>{{ $praxis->timeOutput->next_free_time }}</div>
                        </div>
                    @endif
                </div>
                <div class="w-full">
                    @foreach($praxis->therapyClinics as $therapyClinic)
                        @if(in_array($therapyClinic->therapy_id, $selectedTherapies))
                            <div>
                                <div class="text-[15px] font-semibold">{{ $therapyClinic->therapy_title }}:</div>
                                <div class="text-sm">{{ $therapyClinic->therapy_text }}</div>
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

