@extends('layouts.admin')

@section('content')

<form action="{{ route('admin.praxis.store') }}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="flex flex-col gap-20 container py-24 px-48">
    <section class="basis-5/7 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
      @include('components.input_area', ['name' => 'title', 'label' => 'Praxis','width' => 'col-span-6'])
      @include('components.input_area', ['name' => 'street', 'label' => 'Strasse', 'width' => 'col-span-4'])
      @include('components.input_area', ['name' => 'street-address', 'label' => 'Hausnummer', 'width' => 'col-span-2'])
      @include('components.input_area', ['name' => 'postcode', 'label' => 'PLZ','width' => 'col-span-2'])
      @include('components.input_area', ['name' => 'locality', 'label' => 'Stadt','width' => 'col-span-4'])
      @include('components.input_area', ['name' => 'email', 'label' => 'Email','width' => 'col-span-3'])
      @include('components.input_area', ['name' => 'tel', 'label' => 'Telefon','width' => 'col-span-3'])
    </section>

    <section class="basis-5/7 grid grid-cols-1 gap-x-10 sm:grid-cols-8 items-center">
      <div class="border h-48 mb-6 sm:col-span-2 flex items-center">
        <img id="imagePreview" alt="Preview">
      </div>

      <div class="sm:col-span-2 order-last rounded-md bg-white py-1.5 text-sm text-center font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
        <label for="imageInput">Foto wählen</label>
        <input type="file" name="image" id="imageInput" class="hidden" onchange="previewImage(this)">
      </div>

      <div class="sm:col-span-6 text-sm">
        <label for="about_text" class="mb-6 block font-medium text-gray-900">Text über Praxis</label>
        <textarea id="about_text" name="text_aboutus" rows="3" maxlength="255" class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-600"></textarea>
        <p class="my-4 text-gray-600">Schreiben Sie ein paar Sätze über sich.</p>
      </div>
    </section>

    <section>
      <label for="about_text" class="mb-6 block font-medium text-gray-900">Text Body</label>
      <textarea name="text_one" rows="2" class="w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-600"></textarea>
    </section>

    <section>
      <div class="flex gap-8">
        <div class="basis-1/3">
          @foreach($therapies->take(10) as $therapy)
            <div class="flex text-sm flex-wrap gap-x-4 gap-y-3 items-center mb-6">
              <input type="checkbox" name="therapy[]" value="{{ $therapy->id }}" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600" data-textarea-id="{{ $therapy->id }}" id="checkbox_{{ $therapy->id }}" onchange="toggleTextarea(this)" />
              <label for="checkbox_{{ $therapy->id }}" class="font-medium text-gray-900">{{ $therapy->therapy_title }}</label>
              <textarea name="therapy_text[{{ $therapy->id }}]" id="therapy_{{ $therapy->id }}" maxlength="255" class="w-full h-16 rounded-md border-1 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500 hidden"></textarea>
            </div>
          @endforeach
          @for ($i = 0; $i < 3; $i++)
            <div class="flex text-sm flex-wrap gap-x-4 gap-y-3 items-center mb-6">
                <input type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600"/>
                <input type="text" name="other_therapy[{{ $i }}]" class="font-medium basis-3/5 rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-900 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500">
                <textarea name="other_therapy_text[{{ $i }}]" maxlength="255" class="w-full h-16 rounded-md border-1 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500"></textarea>
            </div>
          @endfor
        </div>
    </section>

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
    var textareaId = "therapy_" + checkbox.dataset.textareaId;
    var textarea = document.getElementById(textareaId);

    if (checkbox.checked) {
      textarea.classList.remove('hidden');
    } else {
      textarea.classList.add('hidden');
    }
  }
</script>

