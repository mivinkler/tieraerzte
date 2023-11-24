@extends('layouts.main')

@section('content')
    <div  class="bg-sky-200 w-full h-64">
        <div></div>
        <div class="container h-full flex items-center">
            <div class="p-2">
                <h2 class="font-bold mb-4"> {{ $praxis->name }} </h2>
                <div> {{$praxis->street}} </div>
                <div> {{$praxis->postcode}} {{$praxis->locality}} </div>
                <div> {{$praxis->tel}} </div>
                <div> {{$praxis->email}} </div>
                <div> {{$praxis->website}} </div>
            </div> 
        </div>
    </div>

    <div class="container flex mt-12">
        <div class="w-2/3 p-2">
            <div >
                <ul>
                    @if($praxis->areas->count() > 0)
                        <div class="font-bold mb-5 ">Medizinische Leistungen:</div>
                        @foreach($praxis->areas as $area)
                            <li>
                                <div class="mb-1 font-medium">{{ $area->areas_title }}</div>
                                <div class="mb-8">{{ $area->areas_text }}</div>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>

            <div>
                <ul>
                    @if($praxis->nursings->count() > 0)
                        <div class="font-bold mb-5 mt-14">Pflegerische Leistungen:</div>
                        @foreach($praxis->nursings as $nursing)
                            <li>
                                <div class="mb-1 font-medium">{{ $nursing->title }}</div>
                                <div class="mb-8">{{ $nursing->text }}</div>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>

            <div>
                <ul>
                    @if($praxis->services->count() > 0)
                        <div class="font-bold mb-5 mt-14">Serviceleistungen:</div>
                        @foreach($praxis->services as $service)
                            <li>
                                <div class="mb-1 font-medium">{{ $service->title }}</div>
                                <div class="mb-8">{{ $service->text }}</div>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>

            <div>
                <ul>
                    @if($praxis->equipments->count() > 0)
                        <div class="font-bold mb-5 mt-14">Ausstattung:</div>
                        @foreach($praxis->equipments as $equipment)
                            <li>
                                <div class="mb-1 font-medium">{{ $equipment->title }}</div>
                                <div class="mb-8">{{ $equipment->text }}</div>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
        <div class="w-1/3 p-1 bg-slate-50">
            <div>
                <h2 class="font-bold mb-4"> {{ $praxis->name }} </h2>
                <div> {{$praxis->street}} </div>
                <div> {{$praxis->postcode}} {{$praxis->locality}} </div>
                <div> {{$praxis->tel}} </div>
                <div> {{$praxis->email}} </div>
                <div> {{$praxis->website}} </div>
            </div> 
        </div>
    </div>
@endsection
