<div class="mt-12">
    <div class="w-2/3 my-3">
        <input class="w-full rounded border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-indigo-500"
            type="text" 
            name="title_{{ $name }}" 
            id="title_{{ $name }}" 
            maxlength="60"
            value="@if(!empty($praxis)){{ $praxis->text->{'title_'.$name} }}@endif">
    </div>
    
    <div class="w-full h-24">
        <textarea class="w-full h-full rounded border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500"
            name="text_{{ $name }}" 
            id="text_{{ $name }}" 
            placeholder="{{ !empty($placeholder) ? $placeholder : '' }}"
            maxlength="1000"
        >@if(!empty($praxis)){{ $praxis->text->{'text_'.$name} }}@endif</textarea>
        <div id="{{ $name }}_count" class="text-[12px] pr-3 text-right"></div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const content = document.getElementById('text_{{ $name }}');
        const count = document.getElementById('{{ $name }}_count');
   
        content.addEventListener('input', function () {
            if (this.value.length > 0) {
                count.classList.remove('hidden');
            } else {
                count.classList.add('hidden');
            }
            updateCount(this, count, 1000);
        });
   
        function updateCount(element, countDiv, maxChars) {
            const textLength = element.value.length;
            countDiv.textContent = `${textLength}/${maxChars}`;
        }
    });
</script>
