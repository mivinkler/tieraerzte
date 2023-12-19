@extends('layouts.main')

@section('content')

  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

<form action="{{ route('praxis.store') }}" method="post" enctype="multipart/form-data" class="container">
  @csrf
  <div>
    <div class="flex gap-14 border-b py-16">
        @include('components.form_sitebar', ['sitebar_title' => 'Praxis eintragen', 'sitebar_text' => 'Behandlung akuter Fälle wie Wunden und Erbrechen, sowie Diagnostik und Operationen'])

      <div class="basis-5/7 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          @include('components.form_area', ['name' => 'title', 'label' => 'Praxis', 'autocomplete' => 'name', 'column' => 'sm:col-span-4'])
          @include('components.form_area', ['name' => 'street', 'label' => 'Strasse', 'autocomplete' => 'address-line1', 'column' => 'sm:col-span-4'])
          @include('components.form_area', ['name' => 'street-address', 'label' => 'Hausnummer', 'autocomplete' => 'address-line2', 'column' => 'sm:col-span-1'])
          @include('components.form_area', ['name' => 'locality', 'label' => 'Stadt', 'autocomplete' => 'address-level2', 'column' => 'sm:col-span-4'])
          @include('components.form_area', ['name' => 'postcode', 'label' => 'PLZ', 'autocomplete' => 'postal-code', 'column' => 'sm:col-span-2'])
          @include('components.form_area', ['name' => 'email', 'label' => 'Email', 'autocomplete' => 'email', 'column' => 'sm:col-span-4'])
          @include('components.form_area', ['name' => 'tel', 'label' => 'Telefon', 'autocomplete' => 'tel', 'column' => 'sm:col-span-2'])
      </div>
    </div>
    
      <!-- Über Praxix -->
      <div class="flex gap-14 border-b py-16">
        @include('components.form_sitebar', ['sitebar_title' => 'Allgemein über Praxis', 'sitebar_text' => 'Behandlung akuter Fälle wie Wunden und Erbrechen, sowie Diagnostik und Operationen'])

        <div class="basis-5/7 grid grid-cols-1 gap-x-10 sm:grid-cols-8 items-center">

          <div class="border h-48 mb-6 sm:col-span-2 flex items-center">
            <img id="imagePreview" alt="Preview" >
          </div>

          <div class="sm:col-span-2 order-last rounded-md bg-white py-1.5 text-sm text-center font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
            <label for="imageInput">Foto wählen</label>
            <input type="file" name="image" id="imageInput" class="hidden" onchange="previewImage(this)">
          </div>

          <div class="sm:col-span-6 text-sm">
            <label for="about_text" class="mb-6 block font-medium text-gray-900">Text über Praxis</label>
            <textarea id="about_text" name="freitext_aboutus" rows="3" maxlength="255" class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-600"></textarea>
            <p class="my-4 text-gray-600">Schreiben Sie ein paar Sätze über sich.</p>
          </div>
        </div>
      </div>
      
    <!-- Freitext -->
    <div class="flex gap-14 border-b py-16">
        @include('components.form_sitebar', ['sitebar_title' => 'Freitext', 'sitebar_text' => ''])
      <div class="basis-5/7">
      <textarea name="freitext_one" rows="2" class="w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-600"></textarea>
      </div>
    </div>

      <!-- Schwerpunkte -->
      <div class="flex gap-14 border-b py-16">
        @include('components.form_sitebar', ['sitebar_title' => 'Schwerpunkte', 'sitebar_text' => 'Behandlung akuter Fälle wie Wunden und Erbrechen, sowie Diagnostik und Operationen'])
        <div class="basis-5/7">
          <div class="grid grid-cols-1 gap-x-10 gap-y-14 sm:grid-cols-3">
            @include('components.form_focuses', ['focus_title_name' => 'focus_title_one', 'focus_title' => '', 'focus_text_name' => 'focus_text_one', 'focus_text' => ''])
            @include('components.form_focuses', ['focus_title_name' => 'focus_title_two', 'focus_title' => '', 'focus_text_name' => 'focus_text_two', 'focus_text' => ''])
            @include('components.form_focuses', ['focus_title_name' => 'focus_title_three', 'focus_title' => '', 'focus_text_name' => 'focus_text_three', 'focus_text' => ''])
            @include('components.form_focuses', ['focus_title_name' => 'focus_title_four', 'focus_title' => '', 'focus_text_name' => 'focus_text_four', 'focus_text' => ''])
          </div>
        </div>
      </div>
    <!-- Freitext -->
    <div class="flex gap-14 border-b py-20">
        @include('components.form_sitebar', ['sitebar_title' => 'Freitext', 'sitebar_text' => ''])
      <div class="basis-5/7">
      <textarea name="freitext_two" rows="2" class="w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-600"></textarea>
      </div>
    </div>
    <!-- Unsere Leistungen -->
    <div class="flex gap-14 py-20">
      @include('components.form_sitebar', ['sitebar_title' => 'Lestungen', 'sitebar_text' => 'Behandlung akuter Fälle wie Wunden und Erbrechen, sowie Diagnostik und Operationen'])
      <div class="basis-5/7">
        <div class="flex gap-8">
          <div class="basis-1/3">
            @foreach($services->take(10) as $service)
              <div class="flex text-sm flex-wrap gap-x-4 gap-y-3 items-center mb-6">
                <input type="checkbox" name="services[]" value="{{ $service->id }}" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600" data-textarea-id="{{ $service->id }}" id="checkbox_{{ $service->id }}" onchange="toggleTextarea(this)" />
                <label for="checkbox_{{ $service->id }}" class="font-medium text-gray-900">{{ $service->service_title }}</label>
                <textarea name="service_text[{{ $service->id }}]" id="service_text_{{ $service->id }}" maxlength="255" class="w-full h-16 rounded-md border-1 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500 hidden"></textarea>
              </div>
            @endforeach
          </div>
            
          <div class="basis-1/3">
            @foreach($services->skip(10)->take(10) as $service)
              <div class="flex text-sm flex-wrap gap-x-4 gap-y-3 items-center mb-6">
                <input type="checkbox" name="services[]" value="{{ $service->id }}" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600" data-textarea-id="{{ $service->id }}" id="checkbox_{{ $service->id }}" onchange="toggleTextarea(this)" />
                <label for="checkbox_{{ $service->id }}" class="font-medium text-gray-900">{{ $service->service_title }}</label>
                <textarea name="service_text[{{ $service->id }}]" id="service_text_{{ $service->id }}" maxlength="255" class="w-full h-16 rounded-md border-1 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500 hidden"></textarea>
              </div>
            @endforeach
          </div>

          <div class=" basis-1/3">
            @foreach($services->skip(20)->take(10) as $service)
            <div class="flex text-sm flex-wrap gap-x-4 gap-y-3 items-center mb-6">
              <input type="checkbox" name="services[]" value="{{ $service->id }}" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600" data-textarea-id="{{ $service->id }}" id="checkbox_{{ $service->id }}" onchange="toggleTextarea(this)" />
              <label for="checkbox_{{ $service->id }}" class="font-medium text-gray-900">{{ $service->service_title }}</label>
              <textarea name="service_text[{{ $service->id }}]" id="service_text_{{ $service->id }}" maxlength="255" class="w-full h-16 rounded-md border-1 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500 hidden"></textarea>
            </div>
            @endforeach
          </div>

        </div>
      </div>
    </div>

    <!-- Button -->
    <div class="flex justify-end">
      <button type="submit" class="object-right rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
    </div>
  </div>
</form>
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

  function toggleTextarea(checkbox) {
    var textareaId = "service_text_" + checkbox.dataset.textareaId;
    var textarea = document.getElementById(textareaId);

    if (checkbox.checked) {
      textarea.classList.remove('hidden');
    } else {
      textarea.classList.add('hidden');
    }
  }
</script>

