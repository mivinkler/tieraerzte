@extends('layouts.admin')

@section('content')
  <form action="{{ route('admin.user.update', $user->id) }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('patch')
      <div class="flex flex-col gap-20 py-24 w-[800px] ml-64">
          <div class="grid gap-x-6 gap-y-8 grid-cols-8">
              @include('components.input_area', [
                  'name' => 'name',
                  'label' => 'Name',
                  'width' => 'col-span-7',
                  'value' => $user->name,
              ])
              <div class="sm:col-span-1 justify-end">
                  <label for="role" class="block text-sm font-medium leading-6 text-gray-900">Role</label>
                  <select id="role" name="role"
                      class="w-full mt-2 ounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500">
                      @foreach ($roles as $id => $role)
                          <option value="{{ $id }}" {{ $id == $user->role ? 'selected' : '' }}>
                              {{ $role }}</option>
                      @endforeach
                      @error('role')
                          <div>{{ $message }}</div>
                      @enderror
                      <div>
                          <input type="hidden" name="user_id" value="{{ $user->id }}">
                      </div>
                  </select>
              </div>
              @include('components.input_area', [
                  'name' => 'email',
                  'label' => 'Email',
                  'width' => 'sm:col-span-6',
                  'value' => $user->email,
              ])
              <div class="flex justify-end">
                <button type="submit"
                    class="object-right rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Speichern</button>
              </div>
          </div>
      </div>
  </form>
@endsection
