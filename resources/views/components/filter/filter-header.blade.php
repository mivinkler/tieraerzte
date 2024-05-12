<div class="flex gap-2 items-center">
    <input 
        type="text" 
        name="title" 
        id="name_title" 
        placeholder="Praxis" 
        value="{{ request('title') }}"
        class="w-full p-2 rounded text-gray-900 shadow ring-1 ring-offset ring-zinc-400/25 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500"
    >
    <input 
        type="text" 
        name="postcode" 
        placeholder="PLZ" 
        value="{{ request('postcode') }}" 
        class="w-20 flex-none p-2 rounded text-gray-900 shadow ring-1 ring-offset ring-zinc-400/25 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500"
    >
    <input 
        type="number" 
        name="radius" 
        min="0" 
        max="50"
        placeholder="Umkreis" 
        value="{{ request('radius') }}"
        class="w-20 flex-none py-2 px-1 rounded text-gray-900 text-center shadow ring-1 ring-offset ring-zinc-400/25 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500"
    >
    <button 
        type="submit" 
        class="w-20 flex-none p-2 object-right rounded bg-[#247BA0] font-semibold text-white shadow hover:bg-[#247BA0]/75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2"
    >Suchen</button>
</div>
