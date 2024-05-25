@extends('layouts.app')

@section('content')
<div class="container w-[800px] mt-12">
    <div class="text-base">
        <div class="font-semibold">{{ __('Prüfen Sie Ihre E-Mail-Adresse') }}</div>

        <div class="card-body">
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('Es wurde ein neuer Verifizierungslink an Ihre E-Mail-Adresse gesendet.') }}
                </div>
            @endif

            <p>{{ __('Bevor Sie fortfahren, überprüfen Sie bitte Ihre E-Mail auf einen Verifizierungslink.') }}</p>
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                {{ __('Falls Sie kein E-Mail erhalten haben') }},
                <button type="submit" class="italic hover:text-blue-800">{{ __('klicken Sie hier') }}</button>.
            </form>
        </div>
    </div>
</div>
@endsection
