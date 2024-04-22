<div class="relative w-full mt-2">
    <textarea class="w-full h-36 rounded-sm border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-indigo-500"
        name="{{ $name }}" 
        id="{{ $name }}" 
        placeholder="Schreiben Sie ein paar Sätze über ihre Praxis" 
        maxlength="1000" 
    >@if(!empty($praxis)){{ $praxis->text->$name }}@endif
    </textarea>
    <div id="{{ $name }}_count" class="absolute text-xs bottom-1 right-0 pr-2.5 text-gray-500">0/1000</div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const content = document.getElementById('{{ $name }}');
        const count = document.getElementById('{{ $name }}_count');
    
        content.addEventListener('input', function () {
            updateCount(this, count, 1000);
        });
    
        function updateCount(element, countDiv, maxChars) {
            const textLength = element.value.length;
            countDiv.textContent = `${textLength}/${maxChars}`;
        }
    });
</script>
