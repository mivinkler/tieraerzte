@extends('layouts.main')

@section('content')
   <!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<form action="{{ route('praxis.store') }}" method="post" class="container my-14 px-40">
  @csrf
  <div class="space-y-12">
      <h1 class="text-base font-semibold leading-7 text-gray-900">Praxis eintragen</h1>

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

        <div class="sm:col-span-4 sm:col-start-1">
          <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Strasse</label>
          <div class="mt-2">
            <input type="text" name="title" id="name" autocomplete="name" class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500">
          </div>
        </div>

        <div class="sm:col-span-4 sm:col-start-1">
          <label for="street" class="block text-sm font-medium leading-6 text-gray-900">Strasse</label>
          <div class="mt-2">
            <input type="text" name="street" id="street" autocomplete="address-line1" class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500">
          </div>
        </div>

        <div class="sm:col-span-1">
          <label for="street-address" class="block text-sm font-medium leading-6 text-gray-900">Hausnummer</label>
          <div class="mt-2">
            <input type="text" name="street-address" id="street-address" autocomplete="street-address" class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500">
          </div>
        </div>

        <div class="sm:col-span-2 sm:col-start-1">
          <label for="locality" class="block text-sm font-medium leading-6 text-gray-900">Stadt</label>
          <div class="mt-2">
            <input type="text" name="locality" id="locality" autocomplete="address-level2" class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500">
          </div>
        </div>

        <div class="sm:col-span-2">
          <label for="region" class="block text-sm font-medium leading-6 text-gray-900">Ortschaft / Bezirk</label>
          <div class="mt-2">
            <input type="text" name="region" id="region" autocomplete="address-level1" class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500">
          </div>
        </div>

        <div class="sm:col-span-2">
          <label for="postcode" class="block text-sm font-medium leading-6 text-gray-900">PLZ</label>
          <div class="mt-2">
            <input type="text" name="postcode" id="postcode" autocomplete="postal-code" class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500">
          </div>
        </div>

        <div class="sm:col-span-4 sm:col-start-1">
          <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
          <div class="mt-2">
            <input id="email" name="email" type="email" autocomplete="email" class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500">
          </div>
        </div>

        <div class="sm:col-span-2 sm:col-start-1">
          <label for="tel" class="block text-sm font-medium leading-6 text-gray-900">Telefon</label>
          <div class="mt-2">
            <input type="text" name="tel" id="tel" autocomplete="tel" class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500">
          </div>
        </div>

        <div class="sm:col-span-2">
          <label for="ansprechpartner" class="block text-sm font-medium leading-6 text-gray-900">Ansprechpartner</label>
          <div class="mt-2">
            <input type="text" name="ansprechpartner" id="ansprechpartner" autocomplete="name" class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500">
          </div>
        </div>
      </div>

      <div class="border-b my-14"></div>

      <div class="mt-10 grid grid-cols-2 gap-6 sm:grid-cols-8">
        <div class="col-span-2">
          <label class="block text-sm font-medium leading-6 text-gray-900">Photo</label>
          <div class="mt-2 flex items-center gap-x-3">
            <svg class="h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
            </svg>
            <button type="button" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Foto wählen</button>
          </div>
        </div>

        <div class="col-span-6">
          <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Text über Praxis</label>
          <div class="mt-2">
            <textarea id="about" name="about" rows="3" class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-600"></textarea>
          </div>
          <p class="mt-3 text-sm leading-6 text-gray-600">Schreiben Sie ein paar Sätze über sich.</p>
        </div>
      </div>

      <div class="border-b my-14"></div>

      <!-- Medizinische Leistungen -->
      <div>
        <h2 class="font-semibold leading-6 text-gray-900">Medizinische Leistungen</h2>
        <p class="mt-1 text-sm leading-6 text-gray-600">Schwerpunkte / Leistungsangebote / Fachbereiche</p>

        <div class="grid grid-cols-2 gap-8 mt-14">

          <div>
            <div class="mb-4">
              <div class="flex text-sm flex-wrap gap-4 items-center">
                  <input name="areas_title[]" id="areas_title" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                  <label for="areas_title" id="area" class="basis-11/12 p-1.5 font-medium text-gray-900">Allgemeinmedizin</label>
                  <textarea name="areas_text[]" id="text" class="w-full ml-8 rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-600 hidden"></textarea>
              </div>
            </div>
          </div>
            

          
          </div>
          <!-- <div>
            @include('components.checkbox', ['catalog_id' => '1', 'id' => 'med1', 'title' => 'Allgemeinmedizin', 'text' => 'Text1'])
            @include('components.checkbox', ['catalog_id' => '2', 'id' => 'med2', 'title' => 'Augenheilkunde', 'text' => 'Text2'])
            @include('components.checkbox', ['catalog_id' => '3', 'id' => 'med3', 'title' => 'Chirurgie', 'text' => 'Text3'])
            @include('components.checkbox', ['catalog_id' => '4', 'id' => 'med4', 'title' => 'Dermatologie', 'text' => 'Text4'])
            @include('components.checkbox', ['catalog_id' => '5', 'id' => 'med5', 'title' => 'Gastroenterologie', 'text' => 'Text5'])
            @include('components.checkbox', ['catalog_id' => '6', 'id' => 'med6', 'title' => 'Geburtshilfe', 'text' => 'Text6'])
            @include('components.checkbox', ['catalog_id' => '7', 'id' => 'med7', 'title' => 'HNO-Heilkunde', 'text' => 'Text7'])
            @include('components.checkbox', ['catalog_id' => '8', 'id' => 'med8', 'title' => 'Kardiologie', 'text' => 'Text8'])
          </div>
          <div>
            @include('components.checkbox', ['catalog_id' => '9', 'id' => 'med9',  'title' => 'Neurologie', 'text' => 'Text9'])
            @include('components.checkbox', ['catalog_id' => '10', 'id' => 'med10', 'title' => 'Onkologie', 'text' => 'Text10'])
            @include('components.checkbox', ['catalog_id' => '11', 'id' => 'med11', 'title' => 'Orthopädie', 'text' => 'Text11'])
            @include('components.checkbox', ['catalog_id' => '12', 'id' => 'med12', 'title' => 'Pneumologie', 'text' => 'Text12'])
            @include('components.checkbox', ['catalog_id' => '13', 'id' => 'med13', 'title' => 'Urologie', 'text' => 'Text13'])
            @include('components.checkbox', ['catalog_id' => '14', 'id' => 'med14', 'title' => 'Zahnmedizin', 'text' => 'Text14'])           
            @include('components.checkbox_another', ['catalog_id' => 'med15', 'title' => 'med15', 'text' => 'Text15'])
            @include('components.checkbox_another', ['catalog_id' => 'med16', 'title' => 'med16', 'text' => 'Text16'])
          </div> -->
        </div>
      </div>

      <style>
        input[type="checkbox"]:checked ~ textarea,
        input[type="text"]:focus + textarea {
            display: block;
        }
      </style>





        <fieldset>
          <legend class="text-sm font-semibold leading-6 text-gray-900">Ausstattung</legend>
          <p class="mt-1 text-sm leading-6 text-gray-600">Wählen Sie besondere Medizinische Geräte</p>
          <div class="mt-6 space-y-6">
            <div class="flex items-center gap-x-3">
              <input id="push-everything" name="push-notifications" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
              <label for="push-everything" class="block text-sm font-medium leading-6 text-gray-900">Ultraschall</label>
            </div>
            <div class="flex items-center gap-x-3">
              <input id="push-email" name="push-notifications" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
              <label for="push-email" class="block text-sm font-medium leading-6 text-gray-900">Röntgen</label>
            </div>
            <div class="flex items-center gap-x-3">
              <input id="push-nothing" name="push-notifications" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
              <label for="push-nothing" class="block text-sm font-medium leading-6 text-gray-900">Endoskopie</label>
            </div>
          </div>
        </fieldset>

      </div>
      
      <div class="mt-6 flex items-center justify-end gap-x-6">
        <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
      </div>


  </div>
</form>





@endsection
