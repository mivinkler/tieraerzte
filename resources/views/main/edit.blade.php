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

<form action="{{ route('praxis.update', $praxis->id) }}" method="post" enctype="multipart/form-data" class="container">
  @csrf
  @method('patch')
  <div>
    <div class="flex gap-14 border-b py-16">
        @include('components.form_sitebar', ['sitebar_title' => 'Praxis eintragen', 'sitebar_text' => 'Behandlung akuter Fälle wie Wunden und Erbrechen, sowie Diagnostik und Operationen'])
      <div class="basis-5/7 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          @include('components.form_area', ['name' => 'title', 'label' => 'Praxis', 'value' => $praxis->title, 'column' => 'sm:col-span-4'])
          @include('components.form_area', ['name' => 'street', 'label' => 'Strasse', 'value' => $praxis->street, 'column' => 'sm:col-span-4'])
          @include('components.form_area', ['name' => 'street-address', 'label' => 'Hausnummer', 'value' => $praxis->postcode, 'column' => 'sm:col-span-1'])
          @include('components.form_area', ['name' => 'locality', 'label' => 'Stadt', 'value' => $praxis->locality, 'column' => 'sm:col-span-4'])
          @include('components.form_area', ['name' => 'postcode', 'label' => 'PLZ', 'value' => $praxis->postcode, 'column' => 'sm:col-span-2'])
          @include('components.form_area', ['name' => 'email', 'label' => 'Email', 'value' => $praxis->email, 'column' => 'sm:col-span-4'])
          @include('components.form_area', ['name' => 'tel', 'label' => 'Telefon', 'value' => $praxis->tel, 'column' => 'sm:col-span-2'])
      </div>
    </div>
    
      <!-- Über Praxix -->
      <div class="flex gap-14 border-b py-16">
        @include('components.form_sitebar', ['sitebar_title' => 'Allgemein über Praxis', 'sitebar_text' => 'Behandlung akuter Fälle wie Wunden und Erbrechen, sowie Diagnostik und Operationen'])

        <div class="basis-5/7 grid grid-cols-1 gap-x-10 sm:grid-cols-8 items-center">
          
        <div class="border h-48 mb-6 sm:col-span-2 flex items-center">
            @if ($praxis->images)
                <img id="imagePreview" src="{{ asset('storage/' . $praxis->images->foto_path) }}" alt="Preview" class="w-full h-full object-contain">
            @endif
          </div>
          <div class="sm:col-span-2 order-last rounded-md bg-white py-1.5 text-sm text-center font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
              <label for="imageInput">Foto wählen</label>
              <input type="file" name="image" class="hidden" id="imageInput" onchange="previewImage(this)">
          </div>

          <div class="sm:col-span-6 text-sm">
            <label for="about_text" class="mb-6 block font-medium text-gray-900">Text über Praxis</label>
            <textarea id="about_text" name="text_aboutus" rows="5" maxlength="300" class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-600">{{ $praxis->text->text_aboutus }}</textarea>
            <p class="my-4 text-gray-600">Schreiben Sie ein paar Sätze über sich.</p>
          </div>
        </div>
      </div>
      
    <!-- Freitext -->
    <div class="flex gap-14 border-b py-16">
        @include('components.form_sitebar', ['sitebar_title' => 'Freitext', 'sitebar_text' => ''])
      <div class="basis-5/7">
        <textarea name="text_one" rows="2" class="w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-600">{{ $praxis->text->text_one }}</textarea>
      </div>
    </div>

    <!-- Unsere Leistungen -->
    <div class="flex gap-14 py-20">
        @include('components.form_sitebar', ['sitebar_title' => 'Lestungen', 'sitebar_text' => 'Behandlung akuter Fälle wie Wunden und Erbrechen, sowie Diagnostik und Operationen'])
        <div class="basis-5/7">     
          <div class="flex gap-8">
            <div class="basis-1/3">
            @foreach($therapies->take(10) as $therapy)
              <div class="flex text-sm flex-wrap gap-x-4 gap-y-3 items-center mb-6">
                  <input type="checkbox" name="therapy[]" value="{{ $therapy->id }}" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600" data-textarea-id="{{ $therapy->id }}" id="checkbox_{{ $therapy->id }}" onchange="toggleTextarea(this)" {{ in_array($therapy->id, $praxis->ClinicTherapies->pluck('therapy_id')->toArray()) ? 'checked' : '' }} />
                  <label for="checkbox_{{ $therapy->id }}" class="font-medium text-gray-900">{{ $therapy->therapy_title }}</label>
                  <textarea name="therapy_text[{{ $therapy->id }}]" id="$therapy_{{ $therapy->id }}" maxlength="255" class="w-full h-16 rounded-md border-1 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500 {{ in_array($therapy->id, $praxis->ClinicTherapies->pluck('therapy_id')->toArray()) ? '' : '' }}">{{ in_array($therapy->id, $praxis->ClinicTherapies->pluck('therapy_id')->toArray()) ? $praxis->ClinicTherapies->where('therapy_id', $therapy->id)->first()->therapy_text : '' }}</textarea>
              </div>
            @endforeach
            </div>    
            <div class="basis-1/3">
              @foreach($therapies->skip(10)->take(10) as $therapy)
              <div class="flex text-sm flex-wrap gap-x-4 gap-y-3 items-center mb-6">
                  <input type="checkbox" name="therapy[]" value="{{ $therapy->id }}" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600" data-textarea-id="{{ $therapy->id }}" id="checkbox_{{ $therapy->id }}" onchange="toggleTextarea(this)" {{ in_array($therapy->id, $praxis->ClinicTherapies->pluck('therapy_id')->toArray()) ? 'checked' : '' }} />
                  <label for="checkbox_{{ $therapy->id }}" class="font-medium text-gray-900">{{ $therapy->therapy_title }}</label>
                  <textarea name="therapy_text[{{ $therapy->id }}]" id="$therapy_{{ $therapy->id }}" maxlength="255" class="w-full h-16 rounded-md border-1 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500 {{ in_array($therapy->id, $praxis->ClinicTherapies->pluck('therapy_id')->toArray()) ? '' : 'hidden' }}">{{ in_array($therapy->id, $praxis->ClinicTherapies->pluck('therapy_id')->toArray()) ? $praxis->ClinicTherapies->where('therapy_id', $therapy->id)->first()->therapy_text : '' }}</textarea>
              </div>
              @endforeach
            </div>
            <div class=" basis-1/3">
              @foreach($therapies->skip(20)->take(10) as $therapy)
              <div class="flex text-sm flex-wrap gap-x-4 gap-y-3 items-center mb-6">
                  <input type="checkbox" name="therapy[]" value="{{ $therapy->id }}" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600" data-textarea-id="{{ $therapy->id }}" id="checkbox_{{ $therapy->id }}" onchange="toggleTextarea(this)" {{ in_array($therapy->id, $praxis->ClinicTherapies->pluck('therapy_id')->toArray()) ? 'checked' : '' }} />
                  <label for="checkbox_{{ $therapy->id }}" class="font-medium text-gray-900">{{ $therapy->therapy_title }}</label>
                  <textarea name="therapy_text[{{ $therapy->id }}]" id="$therapy_{{ $therapy->id }}" maxlength="255" class="w-full h-16 rounded-md border-1 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500 {{ in_array($therapy->id, $praxis->ClinicTherapies->pluck('therapy_id')->toArray()) ? '' : 'hidden' }}">{{ in_array($therapy->id, $praxis->ClinicTherapies->pluck('therapy_id')->toArray()) ? $praxis->ClinicTherapies->where('therapy_id', $therapy->id)->first()->therapy_text : '' }}</textarea>
              </div>
              @endforeach
              @include('components.form_checkbox_other', ['therapy_other' => 'other_one', 'therapy_other_text' => 'other_text_one'])
              @include('components.form_checkbox_other', ['therapy_other' => 'other_two', 'therapy_other_text' => 'other_text_two'])
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

<script>
    var input = document.getElementById('imageInput');
    input.addEventListener('change', function() {
      var file = this.files[0];
      var reader = new FileReader();
      reader.onloadend = function() {
        document.getElementById('imagePreview').src = reader.result;
      }
      reader.readAsDataURL(file);
    });

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
@endsection


