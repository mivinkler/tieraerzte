<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tierärzte</title>
    @vite('resources/css/app.css')
</head>


<body class="overflow-hidden">
    <header class="fixed w-full h-20 top-0 border-b border-gray-200 bg-slate-500">
        <div class="container h-full flex gap-2 items-center justify-end">
            @include('components.icone_admin')  
        </div>
    </header>

    <main class="overflow-auto h-full mt-20">
        <div class="mb-40 flex gap-8">
            <section name="leftbar" class="fixed w-64 flex h-full justify-center bg-gray-200 text-sm">
                <div class="mt-12">
                    <div class="font-semibold mb-2">Praxis</div>
                    <ul class="mb-8 flex flex-col gap-2">

                        {{-- link to praxis update or create --}}
                        {{-- @if(isset(Auth::user()->clinic->id))
                            <li><a href="{{ route('praxis.edit', Auth::user()->clinic->id) }}">Praxis Aktualisieren</a></li>
                        @else
                            <li><a href="{{ route('praxis.create')}}">Praxis Erstellen</a></li>
                        @endif --}}

                        {{--  TODO закрыть в конце разработки сайта --}}
                        <li><a href="{{ route('admin.praxis.create')}}">Praxis Erstellen</a></li>
                        @if(isset(Auth::user()->clinic->id))
                            <li><a href="{{ route('admin.praxis.edit', Auth::user()->clinic->id) }}">Praxis Aktualisieren</a></li>
                        @endif
                        
                        <li>Praxis löschen</li>
                    </ul>
                    <div class="font-semibold mb-2">Profil</div>
                    <ul class="mb-6 flex flex-col gap-2">
                        {{--  TODO сделать линк --}}
                        <li><a href="{{ route('admin.user.edit', Auth::user()->id) }}">Profil Aktualisieren</a></li>
                        <li>Profil löschen</li>
                    </ul>
                </div>
            </section>
            <section class="mb-40 container">
                @yield('content')
            </section>
        </div>
    </main>

</body>
</html>
