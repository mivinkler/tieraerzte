<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tierärzte</title>
    @vite('resources/css/app.css')
</head>


<body>
    <header class="fixed w-screen h-20 top-0 border-b border-gray-200 bg-slate-500">
        <div class="container w-[1280px] h-full flex gap-2 items-center justify-end">
            @include('components.icone_admin')  
        </div>
    </header>

    <main class="h-full w-screen mt-20">
        <div class="flex flex-col gap-8 container w-[1280px]">
            {{-- <section name="leftbar" class="fixed w-64 flex h-full justify-center bg-gray-200 text-sm">
                <div class="mt-12">
                    <ul class="mb-8 flex flex-col gap-2">
                        @if(isset(Auth::user()->clinic->id))
                            <li>
                                <a href="{{ route('praxis.edit', Auth::user()->clinic->id) }}">Praxis ändern</a>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('praxis.create')}}">Praxis Erstellen</a>
                            </li>
                        @endif

                        <li>
                            <a href="{{ route('user.edit', Auth::user()->id) }}">Profil ändern</a>
                        </li>
                        <li>
                            <form action="{{ route('user.delete', Auth::user()->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit">Profile löschen</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </section> --}}


            <section class="mt-12 border-b pb-4 border-gray-200">
                <div class="flex items-center justify-center gap-x-2 text-sm font-medium text-gray-400 ">
                    <div class="">
                        <a href="{{ route('user.edit', Auth::user()->id) }}" class="inline-flex items-center justify-center p-4 border-b-2 hover:text-gray-600 hover:border-gray-300 group {{ Request::routeIs('user.edit') ? 'text-blue-600 border-b-2 border-blue-600' : 'border-transparent' }}">
                            <svg class="w-4 h-4 me-2 group-hover:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                            </svg>Profile
                        </a>
                    </div>
                    <div class="">
                        <a href="{{ isset(Auth::user()->clinic->id) ? route('praxis.edit', Auth::user()->clinic->id) : route('praxis.create') }}" class="inline-flex items-center justify-center p-4 border-b-2 hover:text-gray-600 hover:border-gray-300 group {{ Request::routeIs('praxis.create') ? 'text-blue-600 border-b-2 border-blue-600' : 'border-transparent' }}">
                            <svg class="w-4 h-4 me-2 group-hover:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                            </svg>Praxis
                        </a>
                    </div>
                    <div class="">
                        <a href="#" class="inline-flex items-center justify-center p-4 border-b-2 hover:text-gray-600 hover:border-gray-300 group {{ Request::routeIs('#') ? 'text-blue-600 border-b-2 border-blue-600' : 'border-transparent' }}">
                            <svg class="w-4 h-4 me-2 group-hover:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 96.108 122.88">
                                <path d="M2.892,56.036h8.959v-1.075V37.117c0-10.205,4.177-19.484,10.898-26.207v-0.009 C29.473,4.177,38.754,0,48.966,0C59.17,0,68.449,4.177,75.173,10.901l0.01,0.009c6.721,6.723,10.898,16.002,10.898,26.207v17.844 v1.075h7.136c1.59,0,2.892,1.302,2.892,2.891v61.062c0,1.589-1.302,2.891-2.892,2.891H2.892c-1.59,0-2.892-1.302-2.892-2.891 V58.927C0,57.338,1.302,56.036,2.892,56.036L2.892,56.036z M26.271,56.036h45.387v-1.075V36.911c0-6.24-2.554-11.917-6.662-16.03 l-0.005,0.004c-4.111-4.114-9.787-6.669-16.025-6.669c-6.241,0-11.917,2.554-16.033,6.665c-4.109,4.113-6.662,9.79-6.662,16.03 v18.051V56.036L26.271,56.036z M49.149,89.448l4.581,21.139l-12.557,0.053l3.685-21.423c-3.431-1.1-5.918-4.315-5.918-8.111 c0-4.701,3.81-8.511,8.513-8.511c4.698,0,8.511,3.81,8.511,8.511C55.964,85.226,53.036,88.663,49.149,89.448L49.149,89.448z"/>
                            </svg>Password
                        </a>
                    </div>
                    <div class="">
                        <a href="{{ route('profile.delete') }}" class="inline-flex items-center justify-center p-4 border-b-2 hover:text-gray-600 hover:border-gray-300 group {{ Request::routeIs('#') ? 'text-blue-600 border-b-2 border-blue-600' : 'border-transparent' }}">
                            <svg class="w-4 h-4 me-2 group-hover:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 96.108 122.88">
                                <path d="M2.892,56.036h8.959v-1.075V37.117c0-10.205,4.177-19.484,10.898-26.207v-0.009 C29.473,4.177,38.754,0,48.966,0C59.17,0,68.449,4.177,75.173,10.901l0.01,0.009c6.721,6.723,10.898,16.002,10.898,26.207v17.844 v1.075h7.136c1.59,0,2.892,1.302,2.892,2.891v61.062c0,1.589-1.302,2.891-2.892,2.891H2.892c-1.59,0-2.892-1.302-2.892-2.891 V58.927C0,57.338,1.302,56.036,2.892,56.036L2.892,56.036z M26.271,56.036h45.387v-1.075V36.911c0-6.24-2.554-11.917-6.662-16.03 l-0.005,0.004c-4.111-4.114-9.787-6.669-16.025-6.669c-6.241,0-11.917,2.554-16.033,6.665c-4.109,4.113-6.662,9.79-6.662,16.03 v18.051V56.036L26.271,56.036z M49.149,89.448l4.581,21.139l-12.557,0.053l3.685-21.423c-3.431-1.1-5.918-4.315-5.918-8.111 c0-4.701,3.81-8.511,8.513-8.511c4.698,0,8.511,3.81,8.511,8.511C55.964,85.226,53.036,88.663,49.149,89.448L49.149,89.448z"/>
                            </svg>Account löschen
                        </a>
                    </div>
                    
                    {{-- <div class="">
                        <a href="#" class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                            <svg class="w-4 h-4 me-2 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                <path d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Zm-3 14H5a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-5H5a1 1 0 0 1 0-2h2V2h4v2h2a1 1 0 1 1 0 2Z"/>
                            </svg>Nachricht senden
                        </a>
                    </div> --}}
                    <div>
                        <a class="inline-block p-4 text-gray-400 rounded-t-lg cursor-not-allowed dark:text-gray-500">Blog</a>
                    </div>
                    <div>
                        <a class="inline-block p-4 text-gray-400 rounded-t-lg cursor-not-allowed dark:text-gray-500">Forum</a>
                    </div>
                </div>
            </section>
            
            <section class="container w-[1000px] mb-40">
                @yield('content')
            </section>
        </div>
    </main>

</body>
</html>
