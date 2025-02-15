<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $seo->title_tag ?? 'Tierärzte' }}</title>
    <meta name="description" content="{{ $seo->meta_description ?? 'Beschreibung der Tierarztpraxis' }}">
    <meta property="og:title" content="{{ $seo->title_tag ?? 'Tierärzte' }}">
    <meta property="og:description" content="{{ $seo->meta_description ?? 'Beschreibung der Tierarztpraxis' }}">
    @vite('resources/css/app.css')
</head>

<body>
    <header class="h-20">
        <div class="fixed w-full h-20 top-0 border-b border-gray-200 bg-indigo-300">
            <nav class="container w-[1280px] h-full flex items-center justify-between p-4">
                <div>
                    <a href="{{ route('main')}}" class="flex items-center gap-x-2">
                        
                        <span>Healpets</span>    
                    </a>
                </div>
                <div class="flex gap-x-12 text-sm font-semibold text-gray-900">
                    <a href="{{ route('admin.praxis.index')}}">Tierarzt suchen</a>
                    <a href="{{ route('admin.praxis.index')}}">Kontakt</a>
                </div>
                <div class="flex gap-6 h-8 items-center">
                    @include('components.icone_login')
                    <button class="bg-transparent hover:bg-blue-500 font-semibold text-sm hover:text-white py-1 px-2 border border-zinc-300 text-zinc-600 hover:border-transparent rounded">
                        <a href="{{ route('service')}}">
                            Für Tierärzte
                        </a>
                    </button>          
                </div>
            </nav>
        </div>
    </header>

    <main>
        <div class="mb-40">
            @yield('content')
        </div>
    </main>

    <footer class="fixed bottom-0 left-0 z-20 w-full p-4 bg-white border-t border-gray-200 shadow md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800 dark:border-gray-600">
        <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="#" class="hover:underline">Tierärzte™</a>. All Rights Reserved.
        </span>
        <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
            <li>
                <a href="{{ route('agb')}}" class="mr-4 hover:underline md:mr-6">AGB</a>
            </li>
            <li>
                <a href="{{ route('impressum')}}" class="mr-4 hover:underline md:mr-6">Impressum</a>
            </li>
        </ul>
    </footer>

</body>
</html>
