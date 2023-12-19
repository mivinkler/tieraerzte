<div class="basis-1/4 flex flex-wrap gap-y-14 content-start px-5">
    <div class="flex h-7 basis-full justify-between">
        <label class="font-medium leading-6 text-gray-900">
            {{ $sitebar_title }}
        </label>

        <label class="flex items-center relative cursor-pointer select-none">
            <input type="checkbox" class="border border-slate-400 appearance-none transition-colors cursor-pointer w-9 h-5 rounded-full focus:outline-none focus:ring-1 focus:ring-offset-1 focus:ring-indigo-600 bg-red-400" />
            <span class="absolute font-medium text-[8px] uppercase right-1 text-white"> OFF </span>
            <span class="absolute font-medium text-[8px] uppercase right-5 text-white"> ON </span>
            <span class="w-4 h-4 right-[18px] absolute rounded-full transform transition-transform bg-zinc-300 border border-white"></span>
        </label>
    </div>
    
    <div class="basis-full text-sm">{{ $sitebar_text }}</div>

    <style>
        input:checked {
        background-color: #22c55e; /* bg-green-500 */
        }

        input:checked ~ span:last-child {
        --tw-translate-x: 1rem; /* translate-x-7 */
        }
    </style>
</div>
