<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tierärzte</title>
    @vite('resources/css/app.css')
</head>

<body>
    <header class="h-20">
        <div class="fixed w-full h-20 top-0 border-b border-gray-200 bg-slate-500">
            <div class="container h-full flex gap-2 items-center justify-end">
                @include('components.icone_admin')  
            </div>
        </div>
    </header>

    <main>
        <div class="mb-40 flex gap-8">
            <section name="leftbar" class="fixed w-[340px] flex h-full justify-center bg-gray-200 text-sm">
                <div class="pt-24">
                    <div class="font-semibold mb-2">Praxis</div>
                    <ul class="mb-8 flex flex-col gap-2">
                        <li><a href="{{ route('praxis.create')}}">Praxis Erstellen</a></li>
                        @if(isset(Auth::user()->clinic->id)) {
                            <li><a href="{{ route('praxis.edit', Auth::user()->clinic->id) }}">Praxis Aktualisieren</a></li>
                        }
                        @endif
                        <li>Praxis löschen</li>
                    </ul>
                    <div class="font-semibold mb-2">Profil</div>
                    <ul class="mb-6 flex flex-col gap-2">
                        <li><a href="{{ route('profile.edit', Auth::user()->id) }}">Profil Aktualisieren</a></li>
                        <li>Profil löschen</li>
                    </ul>
                </div>
            </section>
            <section class="mb-40 pt-24 container overflow-auto">
                @yield('content')
            </section>
        </div>
    </main>

</body>
</html>
