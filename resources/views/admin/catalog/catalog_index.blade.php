{{-- @extends('layouts.layout_admin')

@section('content')

<div class="mt-12 ml-20 w-1/4">
    <h2 class="font-semibold mb-5 text-xl">Fachbereiche</h2>

    @foreach($therapyList as $item)
    <div class="flex justify-between items-center pb-3">
        <span>{{$item->therapy_title}}</span>
        <div class="flex items-center gap-4">
            @if($item->icon_path)
                <img src="{{ $item->icon_url }}" alt="{{ $item->therapy_title }}" class="w-6 h-6" id="icon-therapy-{{ $item->id }}">
                <form action="{{ route('admin.catalog.deleteTherapyIcon', $item->id) }}" method="POST" class="icon-delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:underline">Delete Icon</button>
                </form>
            @else
                <img src="{{ asset('default-icon.png') }}" alt="No Icon" class="w-6 h-6" id="icon-therapy-{{ $item->id }}">
            @endif

            <form action="{{ route('admin.catalog.updateTherapyIcon', $item->id) }}" method="POST" enctype="multipart/form-data" class="icon-upload-form">
                @csrf
                @method('POST')
                <input type="file" name="icon" class="hidden file-input" data-id="{{ $item->id }}">
                <label for="icon-therapy-{{ $item->id }}" class="cursor-pointer text-blue-500 hover:underline">
                    @if($item->icon_path) 
                        Change Icon 
                    @else 
                        Add Icon 
                    @endif
                </label>
            </form>
        </div>
    </div>
@endforeach


    <!-- Аналогично для nursing, service, device, animal -->

</div>

<script>
    document.querySelectorAll('.file-input').forEach(input => {
        input.addEventListener('change', function() {
            const form = this.closest('.icon-upload-form');
            const formData = new FormData(form);
            const itemId = this.getAttribute('data-id');

            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('icon-therapy-' + itemId).src = data.icon_url;
                } else {
                    alert('Failed to update icon');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
</script>

@endsection --}}
