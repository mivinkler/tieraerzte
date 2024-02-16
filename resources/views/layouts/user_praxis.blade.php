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
        <div class="fixed w-full h-20 top-0 border-b border-gray-200 bg-sky-50">
            <div class="container h-full flex gap-2 items-center justify-end">
                @include('components.icone_admin')  
            </div>
        </div>
</header>


    <main>
        <div class="mb-40 flex gap-8">
            <section name="leftbar" class="h-screen basis-1/5 flex justify-center bg-gray-200 font-bold text-sm">
                <div class="p-4">
                    <ul class="space-y-4 pt-24 text-gray-600">
                        <li><a href="{{ route('praxis.profile.edit', $praxis->id) }}">User</a></li>
                        <li><a href="{{ route('praxis.create')}}">Erstellen</a></li>
                        <li><a href="{{ route('praxis.edit', $praxis->id) }}">Aktualisieren</a></li>
                        <li>Profil löschen</li>
                    </ul>
                </div>
            </section>
            <section class="basis-3/5 mb-40 pt-24 mx-8">
                @yield('content')
            </section>
        </div>
    </main>


    <footer class="fixed bottom-0 left-0 z-20 w-full p-4 bg-white border-t border-gray-200 shadow md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800 dark:border-gray-600">
        <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="#" class="hover:underline">Tierärzte™</a>. All Rights Reserved.
        </span>
        <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
            <li>
                <a href="{{ route('agb.index')}}" class="mr-4 hover:underline md:mr-6">AGB</a>
            </li>
            <li>
                <a href="{{ route('impressum.index')}}" class="mr-4 hover:underline md:mr-6">Impressum</a>
            </li>
        </ul>
    </footer>

</body>
</html>
