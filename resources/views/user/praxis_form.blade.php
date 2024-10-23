@extends('layouts.layout_user')

@section('content')
<div class="h-full flex flex-col mb-40">
  @if(isset($praxis) && $praxis->id)
    {{-- update --}}
    <form action="{{ route('praxis.update', $praxis->id) }}" method="post" enctype="multipart/form-data" id="myForm">
      @method('patch')
  @else
    {{-- create --}}
    <form action="{{ route('praxis.store') }}" method="post" enctype="multipart/form-data" id="myForm">
  @endif
    @csrf
      <section class="mb-20 mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        @include('components.form.input', ['name' => 'title', 'label' => 'Praxis','width' => 'col-span-6', 'value' => $praxis->title ?? '' ])
        @include('components.form.input', ['name' => 'street', 'label' => 'Strasse', 'width' => 'col-span-4', 'value' => $praxis->street ?? ''])
        @include('components.form.input', ['name' => 'house', 'label' => 'Hausnummer', 'width' => 'col-span-2', 'value' => $praxis->house ?? ''])
        @include('components.form.input', ['name' => 'postcode', 'label' => 'PLZ', 'width' => 'col-span-2', 'value' => $praxis->postcode ?? ''])
        @include('components.form.input', ['name' => 'locality', 'label' => 'Stadt', 'width' => 'col-span-4', 'value' => $praxis->locality ?? ''])
        @include('components.form.input', ['name' => 'tel', 'label' => 'Telefon', 'width' => 'col-span-2', 'value' => $praxis->tel ?? ''])
        @include('components.form.input', ['name' => 'website', 'label' => 'Website', 'width' => 'col-span-4', 'value' => $praxis->website ?? ''])
      </section>

      <section class="mb-20 grid grid-cols-1 gap-x-10 sm:grid-cols-8 items-start">
        <div class="sm:col-span-2 object-top w-48">
          <div class="h-48 w-full rounded shadow-sm ring-1 ring-inset ring-gray-300 flex">
              @if (!empty($praxis) && $praxis->images)
              <img id="imagePreview" src="{{ asset('storage/' . $praxis->images->foto_path) }}" alt="Preview">
              @else
              <div class="w-7 h-7 m-auto">
                  <svg xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill="#71717a" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 510 512.432">
                      <path d="M292.331 252.932h124.754l28.423 50.611h58.56c3.118 0 5.663 2.63 5.663 5.663V506.73c0 3.032-2.603 5.663-5.663 5.663H164.003c-3.031-.03-5.66-2.575-5.66-5.663V309.206c0-3.117 2.544-5.663 5.66-5.663h94.216c7.349-14.526 14.699-29.023 22.047-43.549 4.461-8.834 2.001-7.062 12.065-7.062zm-193.127 259.5H0V398.441h46.052v67.939h53.152v46.052zM0 336.014V176.42h46.052v159.594H0zm0-222.021V0h112.776v46.052H46.052v67.941H0zM175.203 0h159.594v46.052H175.203V0zm222.021 0H510v206.503h-46.052V46.052h-66.724V0zm75.849 328.562c9.321 0 16.871 7.55 16.871 16.871 0 9.321-7.55 16.869-16.871 16.869-9.322 0-16.869-7.548-16.869-16.869.027-9.321 7.577-16.871 16.869-16.871zm-124.182 19.645c28.22 0 51.125 22.903 51.125 51.126 0 28.221-22.904 51.127-51.125 51.127-28.222 0-51.128-22.904-51.128-51.127.002-28.223 22.906-51.126 51.128-51.126zm0-33.282c46.635 0 84.436 37.8 84.436 84.437 0 46.606-37.801 84.437-84.436 84.437-46.608 0-84.437-37.831-84.437-84.437.027-46.637 37.829-84.437 84.437-84.437z"/>
                  </svg>
              </div>
              @endif
          </div>
          <div class="sm:col-span-2 order-last rounded bg-white py-1.5 mt-4 text-sm text-center font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
              <label for="imageInput">Foto wählen</label>
              <input type="file" name="image" id="imageInput" class="hidden" onchange="previewImage(this)">
          </div>
        </div>

        <div class="sm:col-span-6">
          @include('components.form.textarea', ['name' => 'text_aboutus', 'maxlength' => '500', 'placeholder' => 'Schreiben Sie ein paar Sätze über ihre Praxis',])
        </div>
      </section>
      

      <section class="flex justify-between gap-20 mb-32">
        <div class="w-1/2">
          @include('components.form.work-time')
        </div>
        <div class="w-1/2 flex flex-col justify-between">
          <div>
            <h3 class="font-semibold mb-8">Der nächste freie Termin</h3>
            <div class="mb-8">Viele übersetzte Beispielsätze mit "der nächste freie Termin wäre" – Englisch-Deutsch Wörterbuch und Suchmaschine für Millionen von Englisch-Übersetzungen</div>
          </div>
          <div>
            <label for="dayInput" class="mr-4">Tagesintervall eingeben:</label>
            <input type="number" id="dayInput" name="days_interval" min="0" max="120" class="w-14 rounded border-0 py-0.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500">
            <span id="textOutput" class="ml-2"></span>
          </div>
          <div class="w-full mt-20 flex justify-end">
            <textarea rows="4" class="w-full rounded-sm border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500"
                name="postscript" 
                id="postscript" 
                placeholder="Fügen Sie zusätzliche Informationen zu"
                maxlength="255" 
            >@if(!empty($praxis)){{ $praxis->timeTable->postscript }}@endif</textarea>
          </div>
        </div>
      </section>

      <script>
        // Функция для обновления текста рядом с полем ввода
        function updateTextOutput(value) {
            const textOutput = document.getElementById("textOutput");
            
            // Проверяем значение и обновляем текст
            if (value == 0) {
                textOutput.textContent = "Heute";
            } else if (value == 1) {
                textOutput.textContent = "Tag";
            } else {
                textOutput.textContent = "Tagen";
            }
        }
      
        // Обработка событий ввода
        document.getElementById("dayInput").addEventListener("input", function(event) {
            updateTextOutput(event.target.value);
        });
      
        // Устанавливаем начальное значение текста
        updateTextOutput(document.getElementById("dayInput").value);
      </script>

      <section class="mb-20">
        @include('components.form.textarea-with-header', ['name' => 'one'])
        <details @if(!empty($praxis->text->title_two)) open @endif class="group">
          <summary class="flex items-center cursor-pointer">
            <span class="mr-2 font-semibold pb-1">Weitere Texte einfühgen</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-300 group-open:rotate-90" fill="#15458b"shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 512"><path d="M0 256c0 70.68 28.66 134.7 74.98 181.02C121.3 483.34 185.32 512 256 512c70.69 0 134.7-28.66 181.02-74.98C483.34 390.7 512 326.69 512 256c0-70.69-28.66-134.7-74.98-181.02C390.7 28.66 326.69 0 256 0 185.32 0 121.3 28.66 74.98 74.98 28.66 121.3 0 185.31 0 256zm231.67-109.04L340.7 256 231.67 365.04l-40.52-40.51 68.51-68.52-68.52-68.52 40.53-40.53zM101.01 410.99c-39.66-39.66-64.2-94.47-64.2-154.99 0-60.53 24.54-115.33 64.2-154.99 39.66-39.66 94.47-64.2 154.99-64.2 60.53 0 115.33 24.54 154.99 64.2 39.66 39.66 64.2 94.46 64.2 154.99 0 60.53-24.54 115.33-64.2 154.99-39.66 39.66-94.46 64.2-154.99 64.2-60.52 0-115.33-24.54-154.99-64.2z"/></svg>
          </summary>
          @include('components.form.textarea-with-header', ['name' => 'two'])
          @include('components.form.textarea-with-header', ['name' => 'three'])
        </details>
      </section>
    
      <section class="mb-20">
        <div>
          <h3 class="font-bold mb-10 text-lg">Medizinische Leistungen</h3>
          <div class="flex gap-12 w-full">
            @include('components.form.checkbox-medical', [
                'prefix' => 'therapy',
                'itemTitle' => 'therapy_title',
                'items' => $therapyList,
                'itemClinics' => $therapyClinics ?? [], 
                'itemOther' => $therapyOthers ?? [],
            ])
          </div>
        </div>

        <div class="mt-20">
          <h3 class="font-bold mb-10 text-lg">Pflegerische Leistungen</h3>
          <div class="flex gap-12 w-full">
            @include('components.form.checkbox-medical', [
                'prefix' => 'nursing',
                'itemTitle' => 'nursing_title',
                'items' => $nursingList,
                'itemClinics' => $nursingClinics ?? [], 
                'itemOther' => $nursingOthers ?? [],
            ])
          </div>
        </div>
        
        <div class="mt-20">
          <h3 class="font-bold mb-10 text-lg">Service</h3>
          <div class="grid grid-cols-4 gap-4 w-full">
              @include('components.form.checkbox-service', [
                  'prefix' => 'service',
                  'items' => $serviceList,
                  'itemClinics' => $serviceClinics ?? [],
              ])
          </div>
        </div>

        <div class="mt-20">
          <h3 class="font-bold mb-10 text-lg">Apparative Ausstattung</h3>
          <div class="grid grid-cols-4 w-full">
              @include('components.form.checkbox-service', [
                  'prefix' => 'device',
                  'items' => $deviceList,
                  'itemClinics' => $deviceClinics ?? [], 
              ])
          </div>
        </div>

        <div class="mt-20">
          <h3 class="font-bold mb-10 text-lg">Tiearten</h3>
          <div class="grid grid-cols-4 gap-4 w-full">
              @include('components.form.checkbox-service', [
                  'prefix' => 'animal',
                  'items' => $animalList,
                  'itemClinics' => $animalClinics ?? [], 
              ])
          </div>
        </div>

        <div class="mt-20">
          <h3 class="font-bold mb-10 text-lg">Sprachen</h3>
          <div class="grid grid-cols-4 w-full">
              @include('components.form.checkbox-service', [
                  'prefix' => 'language',
                  'items' => $languageList,
                  'itemClinics' => $languageClinics ?? [], 
              ])
          </div>
        </div>


      </section>
        <div class="flex justify-end">
          <button type="submit" class="rounded bg-sky-700 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-sky-800">Speichern</button>
        </div>

  </form>
</div>
@endsection




<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
  $(document).ready(function () {
      // Отслеживаем изменения в файловом поле
      $('#imageInput').change(function () {
          previewImage(this);
      });
  });

  function previewImage(input) {
    var file = input.files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#imagePreview').attr('src', e.target.result).show();
        };
        reader.readAsDataURL(file);
    }
  }
</script>

