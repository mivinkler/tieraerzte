<h1 class="text-[28px] font-semibold tracking-tight text-gray-800">Tierarzt suchen</h1>
<div class="flex gap-2 items-center">
    <input 
        type="text" 
        name="title" 
        id="name_title" 
        placeholder="Name der Praxis" 
        value="{{ request('title') }}" 
        class="w-96 rounded-md p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500"
    >
    <input 
        type="text" 
        name="postcode" 
        placeholder="PLZ" 
        value="{{ request('postcode') }}" 
        class="w-20 ml-4 rounded-md p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500"
    >
    <input 
        type="number" 
        name="radius" 
        placeholder="Radius" 
        value="{{ request('radius') }}" 
        class="w-20 rounded-md p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500"
    >
    <button 
        type="submit" 
        class="object-right rounded-md bg-blue-500 ml-4 px-4 py-[8px] text-sm font-bold text-white shadow-sm hover:bg-blue-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2"
    >Suchen</button>
</div>



