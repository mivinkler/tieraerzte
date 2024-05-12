@extends('layouts.main')

@section('content')
        <div class="container w-[1200px] text-violet-950">
            <div class="mt-20">
                <div>
                    <h1 class="text-4xl font-bold text-center">Für Tierärzte<h1>
                </div>
                <div class="py-16 text-center">
                    <h2 class="text-2xl font-semibold">Verbinden Sie sich mit Tierbesitzern, die Ihre Fachkompetenz suchen!</h2>
                    <p class="pt-4 text-lg ">Registrieren Sie sich jetzt auf unserer Plattform und profitieren Sie von der Möglichkeit, Ihre Praxis einem breiten Publikum von Tierbesitzern vorzustellen. Durch eine Mitgliedschaft bei uns können Sie nicht nur Ihre Sichtbarkeit erhöhen und neue Kunden gewinnen.</p>
                </div>
            </div>
            <div class="py-16">
                <h2 class="text-2xl font-semibold">Ihre Vorteile:</h2>
                <div class="grid gap-y-10 gap-14 grid-cols-1 lg:grid-cols-2 my-8">
                    <div class="">
                        <h3 class="font-semibold text-lg pb-2">Online-Präsenz steigern</h3>
                        <p>Stellen Sie Ihre Praxis mit allen wichtigen Informationen online dar. Nutzen Sie die Möglichkeit, durch ansprechende Bilder und detaillierte Beschreibungen von Ihren Praxis mehr Tierbesitzern zu erreichen.</p>
                    </div>
                    <div class="">
                        <h3 class="font-semibold text-lg pb-2">Leistungsspektrum präsentieren</h3>
                        <p>Erläutern Sie Ihre therapeutischen Angebote, Behandlungsmethoden und Spezialgebiete. Dies erhöht die Transparenz und ermöglicht es Tierbesitzern, die passende Behandlung für ihre Haustiere gezielt zu wählen.</p>
                    </div>
                    <div class="">
                        <h3 class="font-semibold text-lg pb-2">Verbesserte Suchplatzierung</h3>
                        <p>Durch frühe Registrierung sichern Sie sich eine höhere Platzierung in unseren Suchergebnissen, was Ihre Sichtbarkeit und Erreichbarkeit erhöht</p>
                    </div>
                    <div class="">
                        <h3 class="font-semibold text-lg pb-2">Direkte Kontaktaufnahme</h3>
                        <p>Unsere Plattform ermöglicht für interessierte Besucher über unsere Plattform direkte Kontakt mit Ihnen aufnehmen, und Termine zu buchen.</p>
                    </div>
                    <div class="">
                        <h3 class="font-semibold text-lg pb-2">Transparenz und Vergleichbarkeit</h3>
                        <p>Indem Sie klare und vergleichbare Informationen zu Ihren Dienstleistungen bieten, können Sie sich effektiv vom Wettbewerb abheben und die Wahl für Tierbesitzer erleichtern.</p>
                    </div>
                </div>
            </div>

            <div class="py-16">
                
                <div class="flex gap-8">
                    <div class="w-1/2">
                        <h2 class="text-2xl font-semibold">So funktioniert es:</h2>
                        <div class="my-8">
                            <h3 class="font-semibold text-lg pb-2">Registrierung</h3>
                            <p>Vervollständigen Sie die Anmeldung mit Ihren Kontaktdaten</p>
                        </div>
                        <div class="my-8">
                            <h3 class="font-semibold text-lg pb-2">Profileinrichtung</h3>
                            <p>Beschreiben Sie Ihre Praxis, laden Sie Bilder hoch und listen Sie Ihre medizinischen Leistungen auf.</p>
                        </div>
                        <div class="my-8">
                            <h3 class="font-semibold text-lg pb-2">Kundengewinnung</h3>
                            <p>Sobald Ihr Profil aktiv ist, können Tierbesitzer Sie leichter finden und sich für Ihre Dienste entscheiden.</p>
                        </div>
                    </div>
                    <div class="w-1/2">
                        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
        
                                <div>
                                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
        
                                    <div class="mt-2">
                                        <input id="name" name="name" type="text" autocomplete="name" value="{{ old('name') }}" required class="outline-none block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div>
                                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                                    <div class="mt-2">
                                        <input id="email" name="email" type="email" autocomplete="email" value="{{ old('email') }}" required class="outline-none block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        @error('email')
                                            <span class="text-red-600" role="alert">
                                                <p>{{ $message }}</p>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="mt-6">
                                    <div class="flex items-center justify-between">
                                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Passwort</label>
                                        <div class="text-sm">
                                            <a href="#" class="font-semibold text-indigo-800 hover:text-violet-700">Passwort vergessen?</a>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <input id="password" name="password" type="password" autocomplete="current-password" required class="outline-none block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        @error('password')
                                            <span class="text-red-600" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="mt-6">
                                    <label for="password-confirm" class="block text-sm font-medium leading-6 text-gray-900">Passwort betätigen</label>
        
                                    <div class="mt-2">
                                        <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" class="outline-none block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        @error('email')
                                            <span class="text-red-600" role="alert">
                                                <p>{{ $message }}</p>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="mt-12">
                                    <button type="submit" class="flex w-full justify-center rounded-md bg-cyan-700 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-cyan-700/90 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Registrieren</button>
                                </div>
                            </form>
                            <p class="mt-8 text-center text-sm text-gray-500">
                                Shon Mitglied?
                              <a href="{{ route('login') }}" class="font-semibold leading-6 text-indigo-800 hover:text-violet-700">Hier Einloggen!</a>
                            </p>
                        </div>
                    </div>

                </div>
                <div class="text-center w-2/3 my-36 align-middle container text-lg font-semibold">
                    Wir freuen uns darauf, Sie und Ihre Praxis kennenzulernen und gemeinsam tiermedizinische Versorgung zu verbessern.
                </div>
            </div>

        </div>
@endsection
