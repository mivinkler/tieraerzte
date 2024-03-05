@extends('layouts.admin')

@section('content')

<form action="{{ route('admin.user.store') }}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="flex flex-col gap-20 py-24 w-[800px] ml-64">
    <section class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-8">
      @include('components.input_area', ['name' => 'name', 'label' => 'Name', 'width' => 'col-span-8'])
      @include('components.input_area', ['name' => 'email', 'label' => 'Email','width' => 'col-span-8'])
      @include('components.input_area', ['name' => 'password', 'label' => 'Passwort','width' => 'col-span-6'])
      <div class="sm:col-span-1 justify-end">
        <label for="role" class="block text-sm font-medium leading-6 text-gray-900">Role</label>
          <select id="role" name="role" class="w-full mt-2 ounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500">
            <option>User</option>
            <option>Admin</option>
          </select>
      </div>
    </section>
    <div class="flex justify-end">
      <button type="submit" class="object-right rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Speichern</button>
    </div>
  </div>
</form>
@endsection

