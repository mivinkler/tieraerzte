@extends('layouts.app')

@section('content')
<div class="flex min-h-full flex-col justify-center p-6">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
      <h2 class="mt-4 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Regestrieren</h2>
    </div>

                <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
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

                        <div class="mt-6">
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
                                    <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Passwort vergessen?</a>
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
                            <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Registrieren</button>
                        </div>
                    </form>
                    <p class="mt-8 text-center text-sm text-gray-500">
                        Shon Mitglied?
                      <a href="{{ route('login') }}" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Hier Einloggen!</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
