@extends('layouts.admin')

@section('content')

<form action="{{ route('admin.user.update', $user->id) }}" method="post" enctype="multipart/form-data">
  @csrf
  @method('patch')
  <div class="flex flex-col gap-20 py-24 w-[800px] ml-64">
    <section class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-8">
      <div class="sm:col-span-1">
        <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Anrede</label>
        <div class="mt-2">
          <select id="country" value="{{ $user->gender }}" name="country" autocomplete="country-name" class="outline-none block w-full rounded-sm border-0 p-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
            <option>Herr</option>
            <option>Frau</option>
          </select>
        </div>
      </div>
      @include('components.input_area', ['name' => 'name', 'label' => 'Name', 'width' => 'col-span-6', 'value' => $user->name])
      <div class="sm:col-span-1">
        <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Role</label>
        <div class="mt-2">
          <select id="country" name="country" autocomplete="country-name" class="outline-none block w-full rounded-sm border-0 p-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
            <option>Admin</option>
            <option>Praxis</option>
          </select>
        </div>
      </div>
      <div class="sm:col-span-8">
        <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Praxis</label>
        <div class="mt-2 w-full">
          <select id="country" name="country" autocomplete="country-name" class="outline-none block w-full rounded-sm border-0 p-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            <option>Keine</option>
            <option>Praxis</option>
          </select>
        </div>
      </div>
      @include('components.input_area', ['name' => 'email', 'label' => 'Email', 'width' => 'col-span-8', 'value' => $user->email])
    </section>
    <div class="flex justify-end">
      <button type="submit" class="object-right rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Speichern</button>
    </div>
  </div>
</form>
@endsection

