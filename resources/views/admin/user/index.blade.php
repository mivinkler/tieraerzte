@extends('layouts.user_admin')

@section('content')
<main class="mx-auto px-4 mt-8">
    <section class="border-collapse text-left text-sm mb-1 rounded-sm border border-gray-200 bg-slate-200">
        <form id="myForm" action="{{ route('praxis.index') }}" method="get" class="flex items-center h-14">
            <div name="filter_result" class="flex text-gray-600">
                <div class="px-2 py-4 w-[4rem]">
                    <input type="text" name="title" id="user_id" placeholder="id" value="{{ request('title') }}" class="w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500">
                </div>
                <div class="px-2 py-4 w-[14rem]">
                    <input type="text" name="title" id="user_name" placeholder="User" value="{{ request('title') }}" class="w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500">
                </div>
                <div class="px-2 py-4 w-[6rem]">
                    <input type="text" name="role" id="user_id" placeholder="Role" value="{{ request('title') }}" class="w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500">
                </div>
                <div class="px-2 py-4 w-[14rem]">
                    <input type="text" name="postcode" placeholder="Praxis" value="{{ request('postcode') }}" class="w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500">
                </div>
                <div class="px-2 py-4 w-[6rem]">
                    <input type="text" name="role" id="praxis_id" placeholder="Praxis ID" value="{{ request('title') }}" class="w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500">
                </div>
                <div class="px-2 py-4 w-[11rem]">
                    <input type="text" name="postcode" placeholder="Stadt" value="{{ request('postcode') }}" class="w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500">
                </div>
                <div class="px-2 py-4 w-[12rem]">
                    <input type="text" name="postcode" placeholder="Telefon" value="{{ request('postcode') }}" class="w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500">
                </div>
                <div class="px-2 py-4 w-[14rem]">
                    <input type="text" name="postcode" placeholder="Email" value="{{ request('postcode') }}" class="w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500">
                </div>
            </div>
            <div class="flex">
                <button title="Erweitern" type="submit" class="hover:bg-gray-100 border rounded">
                    <svg xmlns="http://www.w3.org/2000/svg"  class="h-5 w-5" fill="#71717a" viewBox="0 0 29.957 122.88">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.978,0c8.27,0,14.979,6.708,14.979,14.979c0,8.27-6.709,14.976-14.979,14.976 C6.708,29.954,0,23.249,0,14.979C0,6.708,6.708,0,14.978,0L14.978,0z M14.978,92.926c8.27,0,14.979,6.708,14.979,14.979 s-6.709,14.976-14.979,14.976C6.708,122.88,0,116.175,0,107.904S6.708,92.926,14.978,92.926L14.978,92.926z M14.978,46.463 c8.27,0,14.979,6.708,14.979,14.979s-6.709,14.978-14.979,14.978C6.708,76.419,0,69.712,0,61.441S6.708,46.463,14.978,46.463 L14.978,46.463z"/>
                </svg>
                </button>
            </div>
            <div class="flex px-2">
                <button href="" class="p-1 hover:bg-gray-100 border rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 122.88 110.668" fill="#71717a" fill-rule="evenodd">
                        <title>Suche löschen</title> 
                        <path d="M91.124,15.645c12.928,0,23.406,10.479,23.406,23.406 c0,12.927-10.479,23.406-23.406,23.406c-12.927,0-23.406-10.479-23.406-23.406C67.718,26.125,78.197,15.645,91.124,15.645 L91.124,15.645z M2.756,0h117.322c1.548,0,2.802,1.254,2.802,2.802c0,0.848-0.368,1.622-0.996,2.139l-10.667,13.556 c-1.405-1.375-2.95-2.607-4.614-3.672l6.628-9.22H9.43l37.975,46.171c0.59,0.516,0.958,1.254,0.958,2.102v49.148l21.056-9.623 V57.896c1.651,1.9,3.548,3.582,5.642,4.996v32.133c0,1.105-0.627,2.064-1.586,2.506l-26.476,12.758 c-1.327,0.773-3.023,0.332-3.798-1.033c-0.258-0.441-0.368-0.92-0.368-1.4V55.02L0.803,4.756c-1.07-1.106-1.07-2.839,0-3.945 C1.355,0.258,2.056,0,2.756,0L2.756,0z M96.93,28.282c1.328-1.349,3.489-1.355,4.825-0.013c1.335,1.342,1.341,3.524,0.013,4.872 l-5.829,5.914l5.836,5.919c1.317,1.338,1.299,3.506-0.04,4.843c-1.34,1.336-3.493,1.333-4.81-0.006l-5.797-5.878l-5.807,5.889 c-1.329,1.349-3.489,1.355-4.826,0.013c-1.335-1.342-1.341-3.523-0.013-4.872l5.83-5.913l-5.836-5.919 c-1.317-1.338-1.3-3.507,0.04-4.843c1.339-1.336,3.492-1.333,4.81,0.006l5.796,5.878L96.93,28.282L96.93,28.282z"/>
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
            <div scope="col" class="border-r px-2 py-4 w-[12rem]">Telefon</div>
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
                        {{ $user->role }}
                    </div>

                    <div class="px-2 w-[14rem]">
                        {{ optional($user->clinic)->title }}
                    </div>
                    <div class="px-2 w-[6rem]">
                        {{ optional($user->clinic)->id }}
                    </div>
                    <div class="px-2 w-[12rem]">
                        {{  optional($user->clinic)->locality }}
                    </div>
                    <div class="px-2 w-[11rem]">
                        {{ optional($user->clinic)->tel }}
                    </div>
                    <div class="px-2 w-[14rem]">
                        {{ optional($user)->email }}
                    </div>
                    
                    <div class="px-4 flex gap-4 absolute right-0">
                    @if($user->role == 'praxis') 
                        @if($user->clinic_id)
                            <a href="{{ route('main.praxis.show', $user->clinic_id) }}" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="#71717a" fill-rule="evenodd" viewBox="0 0 122.88 68.18">
                                    <title>Praxis ansehen</title>
                                    <path d="M61.44,13.81a20.31,20.31,0,1,1-14.34,6,20.24,20.24,0,0,1,14.34-6ZM1.05,31.31A106.72,106.72,0,0,1,11.37,20.43C25.74,7.35,42.08.36,59,0s34.09,5.92,50.35,19.32a121.91,121.91,0,0,1,12.54,12,4,4,0,0,1,.25,5,79.88,79.88,0,0,1-15.38,16.41A69.53,69.53,0,0,1,63.43,68.18,76,76,0,0,1,19.17,53.82,89.35,89.35,0,0,1,.86,36.44a3.94,3.94,0,0,1,.19-5.13Zm15.63-5A99.4,99.4,0,0,0,9.09,34,80.86,80.86,0,0,0,23.71,47.37,68.26,68.26,0,0,0,63.4,60.3a61.69,61.69,0,0,0,38.41-13.72,70.84,70.84,0,0,0,12-12.3,110.45,110.45,0,0,0-9.5-8.86C89.56,13.26,74.08,7.58,59.11,7.89S29.63,14.48,16.68,26.27Zm39.69-7.79a7.87,7.87,0,1,1-7.87,7.87,7.86,7.86,0,0,1,7.87-7.87Z"/>
                                </svg>
                            </a>
                        @else
                            <a href="{{ route('admin.praxis.create')}}">
                                <p class="mr-4 text-blue-600 dark:text-blue-500 hover:underline">Praxis create</p>
                            </a>
                        @endif
                    @endif
                    @if($user->clinic)
                        <a href="{{ route('admin.praxis.edit', $user->clinic->id) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="#71717a" viewBox="0 0 122.88 112.04">
                                <title>Praxis bearbeiten</title>
                                <path d="M109.28,19.61l12.21,9.88a3.77,3.77,0,0,1,.56,5.29l-5.46,6.75L98.53,26.93,104,20.17a3.79,3.79,0,0,1,5.29-.56ZM21.07,30.81a3.18,3.18,0,0,1,0-6.36H74.12a3.18,3.18,0,0,1,0,6.36ZM9.49,0H85.71A9.53,9.53,0,0,1,95.2,9.49v5.63l-4.48,5.53a9.81,9.81,0,0,0-1.18,1.85c-.24.19-.48.4-.71.62V9.49a3.14,3.14,0,0,0-3.12-3.13H9.49A3.14,3.14,0,0,0,6.36,9.49v93.06a3.16,3.16,0,0,0,.92,2.21,3.11,3.11,0,0,0,2.21.92H85.71a3.12,3.12,0,0,0,3.12-3.13V88.2l1.91-.81a10,10,0,0,0,4.34-3.13l.12-.14v18.43A9.54,9.54,0,0,1,85.71,112H9.49A9.51,9.51,0,0,1,0,102.55V9.49A9.53,9.53,0,0,1,9.49,0ZM21.07,87.6a3.19,3.19,0,0,1,0-6.37H56.19a37.1,37.1,0,0,0-.3,6.37Zm0-18.93a3.19,3.19,0,0,1,0-6.37H59.22l0,.27-1.05,6.1Zm0-18.93a3.18,3.18,0,0,1,0-6.36H72.44l-5.11,6.36ZM87.25,78,74.43,83.47c-9.35,3.47-8.93,5.43-8-3.85L69.24,63.4h0l0,0,26.56-33,18,14.6L87.27,78ZM72.31,65.89l11.86,9.59-8.42,3.6c-6.6,2.83-6.42,4.23-5.27-2.53l1.83-10.66Z"/>
                            </svg>
                        </a>
                    @endif

                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="#71717a" viewBox="0 0 512 511.142">
                                <title>User</title>    
                                <path fill-rule="nonzero" d="M147.532 262.835c-9.491-15.114-27.284-35.632-27.284-53.334 0-10.001 7.88-23.041 19.17-25.943-.898-14.966-1.485-30.172-1.485-45.209 0-8.905.168-17.894.504-26.715 3.507-39.979 32.149-68.182 68.492-81.43C221.504 24.89 214.44.343 230.431.02c37.366-.968 98.79 33.225 122.753 59.168 15.251 16.864 23.961 38.69 24.469 61.43l-1.52 65.434c6.645 1.621 14.069 6.807 15.712 13.451 5.109 20.652-16.32 46.356-26.28 62.779-9.196 15.164-44.304 64.211-44.337 64.551-.167 1.771.741 4.024 3.155 7.637C378.895 409.396 512 362.119 512 511.142H0c0-149.115 133.15-101.744 187.617-176.67 2.691-3.957 3.92-6.089 3.89-7.826-.016-.93-40.362-58.059-43.975-63.811z"/>
                            </svg>
                        </a>

                    @if($user->clinic)
                        <a href="{{ $user->clinic->website }}" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="#71717a" viewBox="0 0 122.88 122.88">
                                <title>Website</title>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M61.439,0c33.928,0,61.44,27.513,61.44,61.439c0,33.929-27.513,61.44-61.44,61.44 C27.512,122.88,0,95.368,0,61.439C0,27.513,27.512,0,61.439,0L61.439,0z M78.314,6.495c20.618,6.853,36.088,24.997,39.068,47.101 l-1.953-0.209c-0.347,1.495-0.666,1.533-0.666,3.333c0,1.588,2,2.651,2,6.003c0,0.898-2.109,2.694-2.202,3.007l-3.132-3.674v4.669 l-0.476-0.018l-0.844-8.615l-1.749,0.551l-2.081-6.409l-6.855,7.155l-0.082,5.239l-2.238,1.501l-2.377-13.438l-1.422,1.039 l-3.22-4.345l-4.813,0.143l-1.844-2.107l-1.887,0.519l-3.712-4.254l-0.717,0.488l2.3,5.878h2.669v-1.334h1.333 c0.962,2.658,2.001,1.084,2.001,2.669c0,5.547-6.851,9.625-11.339,10.669c0.24,1.003,0.147,2.003,1.333,2.003 c2.513,0,1.264-0.44,4.003-0.667c-0.127,5.667-6.5,12.435-9.221,16.654l1.218,8.69c0.321,1.887-3.919,3.884-5.361,6.009 l0.692,3.329l-1.953,0.789c-0.342,3.42-3.662,7.214-7.386,7.214h-4c0-4.683-3.336-11.366-3.336-14.675 c0-2.81,1.333-3.188,1.333-6.669c0-3.216-3.333-7.828-3.333-8.67v-5.336h-2.669c-0.396-1.487-0.154-2-2-2h-0.667 c-2.914,0-2.422,1.333-5.336,1.333h-2.669c-2.406,0-6.669-7.721-6.669-8.671v-8.003c0-3.454,3.161-7.214,5.336-8.672v-3.333 l3.002-3.052l1.667-0.284c3.579,0,3.154-2,5.336-2H49.4v4.669L56,43.532l0.622-2.848c2.991,0.701,3.769,2.032,7.454,2.032h1.333 c2.531,0,2.667-3.358,2.667-6.002l-5.343,0.528l-2.324-5.064l-2.311,0.615c0.415,1.812,0.642,1.059,0.642,2.587 c0,0.9-0.741,1-1.335,1.334l-2.311-5.865l-4.969-3.549l-0.66,0.648l4.231,4.452c-0.562,1.597-0.628,6.209-2.961,2.979l2.182-1.05 l-5.438-5.699l-3.258,1.274l-3.216,3.08c-0.336,2.481-1.012,3.729-3.608,3.729c-1.728,0-0.685-0.447-3.336-0.667v-6.669h6.002 l-1.945-4.442l-0.721,0.44V24.04l9.747-4.494c-0.184-1.399-0.408-0.649-0.408-2.175c0-0.091,0.655-1.322,0.667-1.336l2.521,1.565 l-0.603-2.871l-3.889,0.8l-0.722-3.49c3.084-1.624,9.87-7.34,12.028-7.34h2.002c2.107,0,7.751,2.079,8.669,3.333L62.057,7.49 l3.971,3.271l0.381-1.395l2.964-0.812l0.036-1.855h1.336v2L78.314,6.495L78.314,6.495z M116.963,71.835 c-0.154,0.842-0.324,1.676-0.512,2.504l-0.307-2.152L116.963,71.835L116.963,71.835z M115.042,79.398 c-0.147,0.446-0.297,0.894-0.455,1.336h-0.49v-1.336H115.042L115.042,79.398z M11.758,93.18 c-3.624-5.493-6.331-11.641-7.916-18.226l10.821,5.218l0.055,3.229c0,1.186-2.025,3.71-2.667,4.669L11.758,93.18L11.758,93.18z"/>
                            </svg>
                        </a>
                    @endif
                        <a href="#">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" fill="#71717a" fill-rule="evenodd" clip-rule="evenodd" class="h-5 w-5" viewBox="0 0 122.9 98.9">
                                <title>{{ optional($user->clinic)->tel }}</title>
                                <path class="st0" d="M109,98.9H13.7v-14c0.5-16.3,14.9-28.7,23.6-42.8V29.7h14.5v8.9h19.5v-8.9h14.5v12.4 C95.2,57.2,109,67,109,84.7V98.9L109,98.9z M122.5,42.1c0-2.2,0.4-4.4,0.1-6.8c-10.7,3.5-21.1,2.5-31.3-3.1 c-0.4,3.8,0.2,7.2,1.6,10.4C96.5,50.6,122.2,53.3,122.5,42.1L122.5,42.1z M0.3,42.1c0-2.2-0.4-4.4-0.1-6.8 c10.7,3.5,21.1,2.5,31.3-3.1c0.4,3.8-0.2,7.2-1.6,10.4C26.3,50.6,0.5,53.3,0.3,42.1L0.3,42.1z M0,31.9C8.6-8.2,115.4-13,122.9,32 c-10.4,2.9-21,1.2-31.6-3.6c0.3-2.1-0.2-3.8-1.3-5.2c-6.3-7.9-51.4-8.2-57.2,0.3c-0.9,1.3-1.3,2.9-1.2,4.7 C21.1,34.6,10.5,36.1,0,31.9L0,31.9z M47.2,47.7c2.4,0,4.3,1.9,4.3,4.3c0,2.4-1.9,4.3-4.3,4.3c-2.4,0-4.3-1.9-4.3-4.3 C43,49.7,44.9,47.7,47.2,47.7L47.2,47.7z M74.8,71.7c2.4,0,4.3,1.9,4.3,4.3c0,2.4-1.9,4.3-4.3,4.3c-2.4,0-4.3-1.9-4.3-4.3 C70.5,73.7,72.4,71.7,74.8,71.7L74.8,71.7z M61,71.7c2.4,0,4.3,1.9,4.3,4.3c0,2.4-1.9,4.3-4.3,4.3c-2.4,0-4.3-1.9-4.3-4.3 C56.7,73.7,58.6,71.7,61,71.7L61,71.7z M47.2,71.7c2.4,0,4.3,1.9,4.3,4.3c0,2.4-1.9,4.3-4.3,4.3c-2.4,0-4.3-1.9-4.3-4.3 C43,73.7,44.9,71.7,47.2,71.7L47.2,71.7z M74.8,59.7c2.4,0,4.3,1.9,4.3,4.3c0,2.4-1.9,4.3-4.3,4.3c-2.4,0-4.3-1.9-4.3-4.3 C70.5,61.7,72.4,59.7,74.8,59.7L74.8,59.7z M61,59.7c2.4,0,4.3,1.9,4.3,4.3c0,2.4-1.9,4.3-4.3,4.3c-2.4,0-4.3-1.9-4.3-4.3 C56.7,61.7,58.6,59.7,61,59.7L61,59.7z M47.2,59.7c2.4,0,4.3,1.9,4.3,4.3c0,2.4-1.9,4.3-4.3,4.3c-2.4,0-4.3-1.9-4.3-4.3 C43,61.7,44.9,59.7,47.2,59.7L47.2,59.7z M74.8,47.7c2.4,0,4.3,1.9,4.3,4.3c0,2.4-1.9,4.3-4.3,4.3c-2.4,0-4.3-1.9-4.3-4.3 C70.5,49.7,72.4,47.7,74.8,47.7L74.8,47.7z M61,47.7c2.4,0,4.3,1.9,4.3,4.3c0,2.4-1.9,4.3-4.3,4.3c-2.4,0-4.3-1.9-4.3-4.3 C56.7,49.7,58.6,47.7,61,47.7L61,47.7z"/>
                            </svg>
                        </a>
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#71717a" class="h-5 w-5" viewBox="0 0 108.294 122.88">
                                <title>Praxis löschen</title>    
                                <path fill-rule="evenodd" color="green" clip-rule="evenodd" d="M2.347,9.633h38.297V3.76c0-2.068,1.689-3.76,3.76-3.76h21.144 c2.07,0,3.76,1.691,3.76,3.76v5.874h37.83c1.293,0,2.347,1.057,2.347,2.349v11.514H0V11.982C0,10.69,1.055,9.633,2.347,9.633 L2.347,9.633z M8.69,29.605h92.921c1.937,0,3.696,1.599,3.521,3.524l-7.864,86.229c-0.174,1.926-1.59,3.521-3.523,3.521h-77.3 c-1.934,0-3.352-1.592-3.524-3.521L5.166,33.129C4.994,31.197,6.751,29.605,8.69,29.605L8.69,29.605z M69.077,42.998h9.866v65.314 h-9.866V42.998L69.077,42.998z M30.072,42.998h9.867v65.314h-9.867V42.998L30.072,42.998z M49.572,42.998h9.869v65.314h-9.869 V42.998L49.572,42.998z"/></g>
                            </svg>
                        </a>
                        
                    </div>
                </div>
            @empty
                <div>Keine Ergebnisse gefunden</div>
            @endforelse 
        </div>
    </section>
<main>
@endsection

