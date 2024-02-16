@extends('layouts.user_praxis')

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

<form action="{{ route('user.praxis.update', $praxis->id) }}" method="post" enctype="multipart/form-data" class="container">
  @csrf
  @method('patch')
  <div>
    <div class="flex gap-14 py-16">
      <div class="basis-1/4 flex flex-wrap gap-y-14 content-start px-5">
        <p>Behandlung akuter Fälle wie Wunden und Erbrechen, sowie Diagnostik und Operationen</p>  
      </div>
      <div class="flex basis-3/4 flex-col gap-6 text-sm w-full">

          @include('components.input_area', ['id' => 'anrede', 'value' => $praxis->user->anrede, 'width' => '1/4', 'label' => 'Anrede'])

          @include('components.input_area', ['id' => 'name', 'value' => $praxis->user->name, 'width' => '1/2', 'label' => 'Name'])

          @include('components.input_area', ['id' => 'email', 'value' => $praxis->user->email, 'width' => '1/2', 'label' => 'Email'])

        <hr class="w-full"/>

        <button type="submit" class="w-24 right-0 bottom-0 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">Speichern</button>
      </div>
     
    </div>

  </div> 
</form>

@endsection


