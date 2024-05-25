@extends('layouts.layout_user')

@section('content')

@if(isset($praxis) && $praxis->id)
  {{-- update --}}
  <form action="{{ route('praxis.update', $praxis->id) }}" method="post" enctype="multipart/form-data" id="myForm">
    @method('patch')
@else
  {{-- create --}}
  <form action="{{ route('praxis.store') }}" method="post" enctype="multipart/form-data" id="myForm">
@endif
  @csrf
  <div class="flex flex-col gap-20 container w-[1280px] py-6">
    <section class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
      @include('components.form.input', ['name' => 'title', 'label' => 'Praxis','width' => 'col-span-6', 'value' => $praxis->title ?? '' ])
      @include('components.form.input', ['name' => 'street', 'label' => 'Strasse', 'width' => 'col-span-4', 'value' => $praxis->street ?? ''])
      @include('components.form.input', ['name' => 'house', 'label' => 'Hausnummer', 'width' => 'col-span-2', 'value' => $praxis->house ?? ''])
      @include('components.form.input', ['name' => 'postcode', 'label' => 'PLZ', 'width' => 'col-span-2', 'value' => $praxis->postcode ?? ''])
      @include('components.form.input', ['name' => 'locality', 'label' => 'Stadt', 'width' => 'col-span-4', 'value' => $praxis->locality ?? ''])
      @include('components.form.input', ['name' => 'tel', 'label' => 'Telefon', 'width' => 'col-span-2', 'value' => $praxis->tel ?? ''])
      @include('components.form.input', ['name' => 'website', 'label' => 'Website', 'width' => 'col-span-4', 'value' => $praxis->website ?? ''])
    </section>

    <section class="basis-5/7 grid grid-cols-1 gap-x-10 sm:grid-cols-8 items-center">
      <div class="border h-48 sm:col-span-2 flex items-center rounded-sm">
        @if (!empty($praxis) && $praxis->images)
          <img id="imagePreview" src="{{ asset('storage/' . $praxis->images->foto_path) }}" alt="Preview">
        @endif
      </div>

      <div class="sm:col-span-2 order-last rounded-sm bg-white py-1.5 mt-4 text-sm text-center font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
        <label for="imageInput">Foto wählen</label>
        <input type="file" name="image" id="imageInput" class="hidden" onchange="previewImage(this)">
      </div>

      <div class="sm:col-span-6">
        @include('components.form.textarea', ['name' => 'text_aboutus'])
      </div>
    </section>
    
    
    <section>
      @include('components.form.textarea-with-header', ['name' => 'one'])
      @include('components.form.textarea-with-header', ['name' => 'two'])
      @include('components.form.textarea-with-header', ['name' => 'three'])
      @include('components.form.textarea-with-header', ['name' => 'sitebar'])
    </section>

    <section>
      <div>
        <h3 class="font-bold mb-6 text-lg">Fachbereiche</h3>
        <x-form.form-therapy-list :category="1" :therapies="$therapies" :praxis="$praxis ?? ''" />
      </div>
      <div>
        <h3 class="font-bold my-6 pt-4 border-t border-gray-300 text-lg">Leistungen</h3>
        <x-form.form-therapy-list :category="2" :therapies="$therapies" :praxis="$praxis ?? ''"/>
      </div>
    </section>

    <div class="flex justify-end">
      <button type="submit" class="object-right rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
    </div>
  </div>
</form>
@endsection

<script src="https://code.jquery.com/jquery-3.6.4.min.js">
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

