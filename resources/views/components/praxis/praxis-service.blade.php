<div>
    <div class="grid grid-cols-2 gap-x-16 gap-y-10 text-base">
        @foreach($praxis->{$prefix . 'Clinics'} as $item)
            <div>
                <div class="pb-2 font-semibold">{{ $item->{$prefix . '_title'} }}</div>
            </div>
        @endforeach
    </div>
</div>
