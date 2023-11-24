@extends('layouts.main')

@section('content')
    @foreach($praxen as $praxis)
    <div class="container mt-6">
        <a href="{{ route('praxis.show', $praxis->id) }}">
            <div class="font-medium">{{$praxis->title}}</div>
            <div class="text-sm">{{$praxis->street}}</div>
            <div class="text-sm">{{$praxis->postcode}} {{$praxis->locality}}</div>
        </a>
    </div>            
    @endforeach   
@endsection
