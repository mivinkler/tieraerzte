<textarea class="w-full h-full rounded-sm border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus-visible:outline focus-visible-2 focus-visible:outline-offset-1 focus-visible:outline-indigo-500"
    name="{{ $name }}" 
    id="{{ $name }}" 
    placeholder="{{ !empty($placeholder) ? $placeholder : '' }}" 
    maxlength="{{ $maxlength }}"
>@if(!empty($praxis)){{ $praxis->text->$name }}@endif</textarea>
<div id="{{ $name }}_count" class="text-[12px] pr-3 text-right"></div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const content = document.getElementById('{{ $name }}');
        const count = document.getElementById('{{ $name }}_count');
   
        content.addEventListener('input', function () {
            if (this.value.length > 0) {
                count.classList.remove('hidden');
            } else {
                count.classList.add('hidden');
            }
            updateCount(this, count, {{ $maxlength }});
        });
   
        function updateCount(element, countDiv, maxChars) {
            const textLength = element.value.length;
            countDiv.textContent = `${textLength}/${maxChars}`;
        }
    });
</script>
