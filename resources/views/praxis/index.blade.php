@extends('layouts.main')

@section('content')

<div class="bg-white container">
    <div>
      <div class="relative z-40 lg:hidden" role="dialog" aria-modal="true">

        <div class="fixed inset-0 bg-black bg-opacity-25"></div>
  
        <div class="fixed inset-0 z-40 flex">

          <div class="relative ml-auto flex h-full w-full max-w-xs flex-col overflow-y-auto bg-white py-4 pb-12 shadow-xl">
            <div class="flex items-center justify-between px-4">
              <h2 class="text-lg font-medium text-gray-900">Filters</h2>
              <button type="button" class="-mr-2 flex h-10 w-10 items-center justify-center rounded-md bg-white p-2 text-gray-400">
                <span class="sr-only">Close menu</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
  
            <!-- Filters -->

            <div>
                <form class="mt-4 border-t border-gray-200">
                    <div class="border-t border-gray-200 px-4 py-6">
                        <h3 class="-mx-2 -my-3 flow-root">
                        <!-- Expand/collapse section button -->
                        <button type="button" class="flex w-full items-center justify-between bg-white px-2 py-3 text-gray-400 hover:text-gray-500" aria-controls="filter-section-mobile-0" aria-expanded="false">
                            <span class="font-medium text-gray-900">Color</span>
                        </button>
                        </h3>
                        <!-- Filter section, Mobile -->
                        <div class="pt-6" id="filter-section-mobile-0">
                        <div class="space-y-6">
                            <div class="flex items-center">
                            <input id="filter-mobile-color-0" name="color[]" value="white" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <label for="filter-mobile-color-0" class="ml-3 min-w-0 flex-1 text-gray-500">Whites</label>
                            </div>
                            <div class="flex items-center">
                            <input id="filter-mobile-color-1" name="color[]" value="beige" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <label for="filter-mobile-color-1" class="ml-3 min-w-0 flex-1 text-gray-500">Beige</label>
                            </div>
                            <div class="flex items-center">
                            <input id="filter-mobile-color-2" name="color[]" value="blue" type="checkbox" checked class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <label for="filter-mobile-color-2" class="ml-3 min-w-0 flex-1 text-gray-500">Blue</label>
                            </div>
                            <div class="flex items-center">
                            <input id="filter-mobile-color-3" name="color[]" value="brown" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <label for="filter-mobile-color-3" class="ml-3 min-w-0 flex-1 text-gray-500">Brown</label>
                            </div>
                            <div class="flex items-center">
                            <input id="filter-mobile-color-4" name="color[]" value="green" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <label for="filter-mobile-color-4" class="ml-3 min-w-0 flex-1 text-gray-500">Green</label>
                            </div>
                            <div class="flex items-center">
                            <input id="filter-mobile-color-5" name="color[]" value="purple" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <label for="filter-mobile-color-5" class="ml-3 min-w-0 flex-1 text-gray-500">Purple</label>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="border-t border-gray-200 px-4 py-6">
                        <h3 class="-mx-2 -my-3 flow-root">
                        <!-- Expand/collapse section button -->
                        <button type="button" class="flex w-full items-center justify-between bg-white px-2 py-3 text-gray-400 hover:text-gray-500" aria-controls="filter-section-mobile-1" aria-expanded="false">
                            <span class="font-medium text-gray-900">Category</span>
                        </button>
                        </h3>
                        <!-- Filter section, show/hide based on section state. -->
                        <div class="pt-6" id="filter-section-mobile-1">
                            <div class="space-y-6">
                                <div class="flex items-center">
                                    <input id="filter-mobile-category-0" name="category[]" value="new-arrivals" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    <label for="filter-mobile-category-0" class="ml-3 min-w-0 flex-1 text-gray-500">New Arrivals</label>
                                </div>
                                    <div class="flex items-center">
                                    <input id="filter-mobile-category-1" name="category[]" value="sale" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    <label for="filter-mobile-category-1" class="ml-3 min-w-0 flex-1 text-gray-500">Sale</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="filter-mobile-category-2" name="category[]" value="travel" type="checkbox" checked class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    <label for="filter-mobile-category-2" class="ml-3 min-w-0 flex-1 text-gray-500">Travel</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="filter-mobile-category-3" name="category[]" value="organization" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    <label for="filter-mobile-category-3" class="ml-3 min-w-0 flex-1 text-gray-500">Organization</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="filter-mobile-category-4" name="category[]" value="accessories" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    <label for="filter-mobile-category-4" class="ml-3 min-w-0 flex-1 text-gray-500">Accessories</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border-t border-gray-200 px-4 py-6">
                        <h3 class="-mx-2 -my-3 flow-root">
                        <!-- Expand/collapse section button -->
                        <button type="button" class="flex w-full items-center justify-between bg-white px-2 py-3 text-gray-400 hover:text-gray-500" aria-controls="filter-section-mobile-2" aria-expanded="false">
                            <span class="font-medium text-gray-900">Size</span>
                            <span class="ml-6 flex items-center">
                            <!-- Expand icon, show/hide based on section open state. -->
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                            </svg>
                            <!-- Collapse icon, show/hide based on section open state. -->
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                            </svg>
                            </span>
                        </button>
                        </h3>
                        <!-- Filter section, show/hide based on section state. -->
                        <div class="pt-6" id="filter-section-mobile-2">
                        <div class="space-y-6">
                            <div class="flex items-center">
                            <input id="filter-mobile-size-0" name="size[]" value="2l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <label for="filter-mobile-size-0" class="ml-3 min-w-0 flex-1 text-gray-500">2L</label>
                            </div>
                            <div class="flex items-center">
                            <input id="filter-mobile-size-1" name="size[]" value="6l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <label for="filter-mobile-size-1" class="ml-3 min-w-0 flex-1 text-gray-500">6L</label>
                            </div>
                            <div class="flex items-center">
                            <input id="filter-mobile-size-2" name="size[]" value="12l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <label for="filter-mobile-size-2" class="ml-3 min-w-0 flex-1 text-gray-500">12L</label>
                            </div>
                            <div class="flex items-center">
                            <input id="filter-mobile-size-3" name="size[]" value="18l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <label for="filter-mobile-size-3" class="ml-3 min-w-0 flex-1 text-gray-500">18L</label>
                            </div>
                            <div class="flex items-center">
                            <input id="filter-mobile-size-4" name="size[]" value="20l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <label for="filter-mobile-size-4" class="ml-3 min-w-0 flex-1 text-gray-500">20L</label>
                            </div>
                            <div class="flex items-center">
                            <input id="filter-mobile-size-5" name="size[]" value="40l" type="checkbox" checked class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <label for="filter-mobile-size-5" class="ml-3 min-w-0 flex-1 text-gray-500">40L</label>
                            </div>
                        </div>
                        </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
  
      <main class="mx-auto max-w-7xl">
        <div class="flex items-baseline justify-between border-b border-gray-200 pb-6 pt-24">
          <h1 class="text-4xl font-semibold tracking-tight text-gray-800">Tierarzt suchen</h1>
        </div>
  
        <section aria-labelledby="products-heading" class="pb-24 pt-6">
            <h2 id="products-heading" class="sr-only">Products</h2>
  
            <div class="flex gap-10">
                <!-- Filters -->
                <div class="basis-1/4">
                    <form class="hidden lg:block">
                        <div class="border-b border-gray-200 py-6">
                            <h3 class="-my-3 flow-root">
                            <!-- Expand/collapse section button -->
                            <button type="button" class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500" aria-controls="filter-section-0" aria-expanded="false">
                                <span class="font-medium text-gray-900">Color</span>
                            </button>
                            </h3>
                            <!-- Filter section, Desktop -->
                            <div class="pt-6" id="filter-section-0">
                            <div class="space-y-4">
                                <div class="flex items-center">
                                <input id="filter-color-0" name="color[]" value="white" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="filter-color-0" class="ml-3 text-sm text-gray-600">Whites</label>
                                </div>
                                <div class="flex items-center">
                                <input id="filter-color-1" name="color[]" value="beige" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="filter-color-1" class="ml-3 text-sm text-gray-600">Beige</label>
                                </div>
                                <div class="flex items-center">
                                <input id="filter-color-2" name="color[]" value="blue" type="checkbox" checked class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="filter-color-2" class="ml-3 text-sm text-gray-600">Blue</label>
                                </div>
                                <div class="flex items-center">
                                <input id="filter-color-3" name="color[]" value="brown" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="filter-color-3" class="ml-3 text-sm text-gray-600">Brown</label>
                                </div>
                                <div class="flex items-center">
                                <input id="filter-color-4" name="color[]" value="green" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="filter-color-4" class="ml-3 text-sm text-gray-600">Green</label>
                                </div>
                                <div class="flex items-center">
                                <input id="filter-color-5" name="color[]" value="purple" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="filter-color-5" class="ml-3 text-sm text-gray-600">Purple</label>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="border-b border-gray-200 py-6">
                            <h3 class="-my-3 flow-root">
                            <!-- Expand/collapse section button -->
                            <button type="button" class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500" aria-controls="filter-section-1" aria-expanded="false">
                                <span class="font-medium text-gray-900">Category</span>
                            </button>
                            </h3>
                            <!-- Filter section, Desktop. -->
                            <div class="pt-6" id="filter-section-1">
                            <div class="space-y-4">
                                <div class="flex items-center">
                                <input id="filter-category-0" name="category[]" value="new-arrivals" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="filter-category-0" class="ml-3 text-sm text-gray-600">New Arrivals</label>
                                </div>
                                <div class="flex items-center">
                                <input id="filter-category-1" name="category[]" value="sale" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="filter-category-1" class="ml-3 text-sm text-gray-600">Sale</label>
                                </div>
                                <div class="flex items-center">
                                <input id="filter-category-2" name="category[]" value="travel" type="checkbox" checked class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="filter-category-2" class="ml-3 text-sm text-gray-600">Travel</label>
                                </div>
                                <div class="flex items-center">
                                <input id="filter-category-3" name="category[]" value="organization" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="filter-category-3" class="ml-3 text-sm text-gray-600">Organization</label>
                                </div>
                                <div class="flex items-center">
                                <input id="filter-category-4" name="category[]" value="accessories" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="filter-category-4" class="ml-3 text-sm text-gray-600">Accessories</label>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="border-b border-gray-200 py-6">
                            <h3 class="-my-3 flow-root">
                            <!-- Expand/collapse section button -->
                            <button type="button" class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500" aria-controls="filter-section-2" aria-expanded="false">
                                <span class="font-medium text-gray-900">Size</span>
                            </button>
                            </h3>
                            <!-- Filter section, Desktop -->
                            <div class="pt-6" id="filter-section-2">
                            <div class="space-y-4">
                                <div class="flex items-center">
                                <input id="filter-size-0" name="size[]" value="2l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="filter-size-0" class="ml-3 text-sm text-gray-600">2v</label>
                                </div>
                                <div class="flex items-center">
                                <input id="filter-size-1" name="size[]" value="6l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="filter-size-1" class="ml-3 text-sm text-gray-600">6L</label>
                                </div>
                                <div class="flex items-center">
                                <input id="filter-size-2" name="size[]" value="12l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="filter-size-2" class="ml-3 text-sm text-gray-600">12L</label>
                                </div>
                                <div class="flex items-center">
                                <input id="filter-size-3" name="size[]" value="18l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="filter-size-3" class="ml-3 text-sm text-gray-600">18L</label>
                                </div>
                                <div class="flex items-center">
                                <input id="filter-size-4" name="size[]" value="20l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="filter-size-4" class="ml-3 text-sm text-gray-600">20L</label>
                                </div>
                                <div class="flex items-center">
                                <input id="filter-size-5" name="size[]" value="40l" type="checkbox" checked class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="filter-size-5" class="ml-3 text-sm text-gray-600">40L</label>
                                </div>
                            </div>
                            </div>
                        </div>
                    </form>
                </div>
  

            <div class="basis-3/4">
                @foreach($praxen as $praxis)
                    <div class="my-6 p-4 border rounded border-gray-100 bg-sky-50/25">
                        <a href="{{ route('praxis.show', $praxis->id) }}">
                            <div class="font-medium">{{ $praxis->title }}</div>
                            <div class="text-sm">{{ $praxis->street }}</div>
                            <div class="text-sm">{{ $praxis->postcode }} {{ $praxis->locality }}</div>         
                            <div class="pt-4">{{ optional($praxis->text)->about_text }}</div>            
                        </a>
                    </div>      
                @endforeach   
                <div>
                    {{ $praxen->links() }}
                </div> 
            </div>

          </div>
        </section>
      </main>
    </div>
  </div>
  
@endsection
