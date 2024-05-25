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
    <header id="header" class="fixed z-10 w-full top-0 font-semibold text-sm text-gray-600">
        <nav class="container max-w-[1400px] h-16 flex items-center justify-between">
            <div>
                <a href="#" class="">Healpets</a>
            </div>
            <div class="flex gap-6">
                <a href="{{ route('praxis.index')}}">Tierarzt suchen</a>
                <a href="{{ route('praxis.index')}}">Kontakt</a>
            </div>
            <div class="flex gap-6 text-sm">
                @include('components.icone_login')
                <button id="buttonHeader" class="py-1 px-2 border rounded border-white hover:border-transparent hover:bg-blue-500 hover:text-white">
                    <a href="{{ route('service')}}">Für Tierärzte</a>
                </button>          
            </div>
        </nav>
    </header>
    <main class="pb-20">
        @yield('content')
    </main>
</body>
<footer class="bottom-0 left-0 z-20 w-full p-4 bg-white border-t border-gray-200 shadow md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800 dark:border-gray-600">
    <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a href="#" class="hover:underline">Tierärzte™</a>. All Rights Reserved.
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
</html>

<script>
    document.addEventListener("scroll", function() {
        const header = document.getElementById('header');
        const buttonHeader = document.getElementById('buttonHeader')
        if (window.scrollY > 50) {
            header.classList.add('bg-white');
            buttonHeader.classList.add('border-zinc-300')
        } else {
            header.classList.remove('bg-white');
            buttonHeader.classList.remove('border-zinc-300');
        }
    });
</script>
