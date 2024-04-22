@extends('layouts.admin')

@section('content')
<main class="mx-auto px-4 mt-8">
    <section class="border-collapse text-left text-sm mb-1 rounded-sm bg-slate-200">
        <form id="UserForm" action="{{ route('admin.user.index') }}" method="get" class="flex items-center h-14">
            <div name="filter_result" class="flex text-gray-600">
                <div class="px-2 py-4 w-[4rem]">
                    <input type="text" name="id" id="user_id" placeholder="id" value="{{ request('id') }}" class="w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500">
                </div>
                <div class="px-2 py-4 w-[14rem]">
                    <input type="text" name="name" id="user_name" placeholder="User" value="{{ request('name') }}" class="w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500">
                </div>
                <div class="px-2 py-4 w-[6rem]">
                    <input type="text" name="role" id="role" placeholder="Role" value="{{ request('role') }}" class="w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500">
                </div>
                <div class="px-2 py-4 w-[14rem]">
                    <input type="text" name="praxis" placeholder="Praxis" value="{{ request('praxis') }}" class="w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500">
                </div>
                <div class="px-2 py-4 w-[6rem]">
                    <input type="text" name="praxis_id" id="praxis_id" placeholder="Praxis ID" value="{{ request('praxis_id') }}" class="w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500">
                </div>
                <div class="px-2 py-4 w-[11rem]">
                    <input type="text" name="locality" placeholder="Stadt" value="{{ request('locality') }}" class="w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500">
                </div>
                <div class="px-2 py-4 w-[14rem]">
                    <input type="text" name="email" placeholder="Email" value="{{ request('email') }}" class="w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500">
                </div>
            </div>
            <div class="flex">
                <svg xmlns="http://www.w3.org/2000/svg"  class="h-5 w-5" fill="#71717a" viewBox="0 0 29.957 122.88">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.978,0c8.27,0,14.979,6.708,14.979,14.979c0,8.27-6.709,14.976-14.979,14.976 C6.708,29.954,0,23.249,0,14.979C0,6.708,6.708,0,14.978,0L14.978,0z M14.978,92.926c8.27,0,14.979,6.708,14.979,14.979 s-6.709,14.976-14.979,14.976C6.708,122.88,0,116.175,0,107.904S6.708,92.926,14.978,92.926L14.978,92.926z M14.978,46.463 c8.27,0,14.979,6.708,14.979,14.979s-6.709,14.978-14.979,14.978C6.708,76.419,0,69.712,0,61.441S6.708,46.463,14.978,46.463 L14.978,46.463z"/>
                </svg>
            </div>
            <div class="flex px-2">
                <button onclick="clearFilters()" class="pt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 409.32">
                        <title>Suche löschen</title> 
                        <path fill="#71717a" d="M5.4 281.99h181.22c2.22 27.53 10.52 53.34 23.57 76.07H5.4c-2.8 0-5.4-2.42-5.4-5.4V287.4c0-2.99 2.42-5.41 5.4-5.41zm0-64.93h187.52c8.18-28.84 23.25-54.82 43.32-76.07H5.4c-2.8 0-5.4 2.52-5.4 5.4v65.26c0 2.89 2.42 5.41 5.4 5.41zM5.4 0h395.95c2.99 0 5.41 2.6 5.41 5.4v65.26c0 2.8-2.61 5.41-5.41 5.41H5.4c-2.8 0-5.4-2.42-5.4-5.41V5.4C0 2.42 2.42 0 5.4 0z"/>
                        <path fill="#f87171" d="M369.69 124.69c78.6 0 142.31 63.71 142.31 142.32 0 78.6-63.71 142.31-142.31 142.31s-142.32-63.71-142.32-142.31c0-78.61 63.72-142.32 142.32-142.32zm-65.66 112.79c-5.46-5.38-9.83-8.74-3.01-15.37l22.03-21.49c6.98-7.06 11.06-6.7 17.56-.04l29.68 29.68 29.5-29.5c5.38-5.46 8.74-9.82 15.37-3.01l21.49 22.02c7.06 6.98 6.7 11.08.04 17.57l-29.65 29.67 29.65 29.65c6.66 6.5 7.02 10.6-.04 17.58l-21.49 22.01c-6.63 6.82-9.99 2.45-15.37-3.01l-29.5-29.5-29.68 29.68c-6.5 6.67-10.58 7.02-17.56-.04l-22.03-21.49c-6.82-6.63-2.45-10 3.01-15.37l29.52-29.51-29.52-29.53z"/>
                    </svg>
                </button>
            </div>
            <div class="flex p-2 h-12 ml-6">
                <button type="submit" class="rounded-md bg-indigo-600 px-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Suchen</button>
            </div>
        </form>
    </section>

    <section class="w-full border-collapse bg-white text-left text-sm rounded-sm border border-gray-200">
        <div class="flex bg-gray-50 font-medium text-gray-600">
            <div scope="col" class="border-r px-2 py-4 w-[4rem]">ID</div>
            <div scope="col" class="border-r px-2 py-4 w-[14rem]">User</div>
            <div scope="col" class="border-r px-2 py-4 w-[6rem]">Role</div>
            <div scope="col" class="border-r px-2 py-4 w-[14rem]">Praxis</div>
            <div scope="col" class="border-r px-2 py-4 w-[6rem]">Praxis ID</div>
            <div scope="col" class="border-r px-2 py-4 w-[11rem]">Stadt</div>
            <div scope="col" class="px-2 py-4 w-[14rem]">Email</div>
        </div>
        <div class="divide-y divide-gray-100 border-t border-gray-100 text-gray-600">
            @forelse($users as $user)
                <div name="filter_result" class="flex items-center hover:bg-gray-50 h-[3rem] relative">
                    <div class="px-2 w-[4rem]">
                        {{ $user->id }}
                    </div>
                    <div class="px-2 w-[14rem]">
                        {{ $user->name }}
                    </div>
                    <div class="px-2 w-[6rem]">
                        {{ $user->getRoles()[$user->role]}}
                    </div>
                    <div class="px-2 w-[14rem]">
                        {{ optional($user->clinic)->title }}
                    </div>
                    <div class="px-2 w-[6rem]">
                        {{ $user->clinic_id }}
                    </div>
                    <div class="px-2 w-[12rem]">
                        {{ optional($user->clinic)->locality }}
                    </div>
                    <div class="px-2 w-[14rem]">
                        {{ $user->email }}
                    </div>
                    <div class="px-4 flex gap-4 absolute right-0 items-center">
                        @if($user->role === '1')
                            @if($user->clinic_id)
                                <a href="{{ route('main.praxis.show', $user->clinic_id) }}" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="#71717a" fill-rule="evenodd" viewBox="0 0 122.88 68.18">
                                        <title>Praxis ansehen</title>
                                        <path d="M61.44,13.81a20.31,20.31,0,1,1-14.34,6,20.24,20.24,0,0,1,14.34-6ZM1.05,31.31A106.72,106.72,0,0,1,11.37,20.43C25.74,7.35,42.08,.36,59,0s34.09,5.92,50.35,19.32a121.91,121.91,0,0,1,12.54,12,4,4,0,0,1,.25,5,79.88,79.88,0,0,1-15.38,16.41A69.53,69.53,0,0,1,63.43,68.18,76,76,0,0,1,19.17,53.82,89.35,89.35,0,0,1,.86,36.44a3.94,3.94,0,0,1,.19-5.13Zm15.63-5A99.4,99.4,0,0,0,9.09,34,80.86,80.86,0,0,0,23.71,47.37,68.26,68.26,0,0,0,63.4,60.3a61.69,61.69,0,0,0,38.41-13.72,70.84,70.84,0,0,0,12-12.3,110.45,110.45,0,0,0-9.5-8.86C89.56,13.26,74.08,7.58,59.11,7.89S29.63,14.48,16.68,26.27Zm39.69-7.79a7.87,7.87,0,1,1-7.87,7.87,7.86,7.86,0,0,1,7.87-7.87Z"/>
                                    </svg>
                                </a>
                                <a href="{{ route('admin.praxis.edit', $user->clinic_id) }}" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="#71717a" viewBox="0 0 122.88 112.04">
                                        <title>Praxis bearbeiten</title>
                                        <path d="M109.28,19.61l12.21,9.88a3.77,3.77,0,0,1,.56,5.29l-5.46,6.75L98.53,26.93,104,20.17a3.79,3.79,0,0,1,5.29-.56ZM21.07,30.81a3.18,3.18,0,0,1,0-6.36H74.12a3.18,3.18,0,0,1,0,6.36ZM9.49,0H85.71A9.53,9.53,0,0,1,95.2,9.49v5.63l-4.48,5.53a9.81,9.81,0,0,0-1.18,1.85c-.24.19-.48.4-.71.62V9.49a3.14,3.14,0,0,0-3.12-3.13H9.49A3.14,3.14,0,0,0,6.36,9.49v93.06a3.16,3.16,0,0,0,.92,2.21,3.11,3.11,0,0,0,2.21.92H85.71a3.12,3.12,0,0,0,3.12-3.13V88.2l1.91-.81a10,10,0,0,0,4.34-3.13l.12-.14v18.43A9.54,9.54,0,0,1,85.71,112H9.49A9.51,9.51,0,0,1,0,102.55V9.49A9.53,9.53,0,0,1,9.49,0ZM21.07,87.6a3.19,3.19,0,0,1,0-6.37H56.19a37.1,37.1,0,0,0-.3,6.37Zm0-18.93a3.19,3.19,0,0,1,0-6.37H59.22l0,.27-1.05,6.1Zm0-18.93a3.18,3.18,0,0,1,0-6.36H72.44l-5.11,6.36ZM87.25,78,74.43,83.47c-9.35,3.47-8.93,5.43-8-3.85L69.24,63.4h0l0,0,26.56-33,18,14.6L87.27,78ZM72.31,65.89l11.86,9.59-8.42,3.6c-6.6,2.83-6.42,4.23-5.27-2.53l1.83-10.66Z"/>
                                    </svg>
                                </a>
                            @else   
                                <a href="{{ route('admin.praxis.create') }}">Praxis create</a>
                            @endif
                            <div class="align-center">
                                <a href="{{ route('admin.user.edit', $user) }}" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg"  class="h-4 w-4" fill="#71717a" viewBox="0 0 118.04 122.88">
                                        <title>User update</title>
                                        <path d="M16.08,59.26A8,8,0,0,1,0,59.26a59,59,0,0,1,97.13-45V8a8,8,0,1,1,16.08,0V33.35a8,8,0,0,1-8,8L80.82,43.62a8,8,0,1,1-1.44-15.95l8-.73A43,43,0,0,0,16.08,59.26Zm22.77,19.6a8,8,0,0,1,1.44,16l-10.08.91A42.95,42.95,0,0,0,102,63.86a8,8,0,0,1,16.08,0A59,59,0,0,1,22.3,110v4.18a8,8,0,0,1-16.08,0V89.14h0a8,8,0,0,1,7.29-8l25.31-2.3Z"/>
                                    </svg>
                                </a>
                            </div>
                            <div>
                                <form action="{{ route('admin.user.delete', $user) }}" method="post" onsubmit="return confirm('Möchten Sie wirklich löschen?');">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn pt-[11px]">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="#71717a" class="h-5 w-5" viewBox="0 0 108.294 122.88">
                                            <title>User löschen</title>    
                                            <path fill-rule="evenodd" color="green" clip-rule="evenodd" d="M2.347,9.633h38.297V3.76c0-2.068,1.689-3.76,3.76-3.76h21.144 c2.07,0,3.76,1.691,3.76,3.76v5.874h37.83c1.293,0,2.347,1.057,2.347,2.349v11.514H0V11.982C0,10.69,1.055,9.633,2.347,9.633 L2.347,9.633z M8.69,29.605h92.921c1.937,0,3.696,1.599,3.521,3.524l-7.864,86.229c-0.174,1.926-1.59,3.521-3.523,3.521h-77.3 c-1.934,0-3.352-1.592-3.524-3.521L5.166,33.129C4.994,31.197,6.751,29.605,8.69,29.605L8.69,29.605z M69.077,42.998h9.866v65.314 h-9.866V42.998L69.077,42.998z M30.072,42.998h9.867v65.314h-9.867V42.998L30.072,42.998z M49.572,42.998h9.869v65.314h-9.869 V42.998L49.572,42.998z"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>

                        @endif
                    </div>
                </div>
            @empty
                <div>Keine Ergebnisse gefunden</div>
            @endforelse
        </div>
    </section>
<main>
@endsection

<script>
    
document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('UserForm');
    var inputs = form.querySelectorAll('input[name]:not([type="submit"])');

    function handleInputChange() {
        inputs.forEach(input => input.value.trim() === '' ? input.removeAttribute('name') : null);
        form.submit();
    }

    function clearFilters() {
        inputs.forEach(input => {
            input.value = '';
            input.removeAttribute('name');
        });
        form.submit();
    }

    inputs.forEach(input => input.addEventListener('blur', handleInputChange));

    window.clearFilters = clearFilters;
});
</script>

