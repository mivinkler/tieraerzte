<div class="mt-16">
    <div class="relative w-2/3 mt-2">
        <input class="w-full rounded-sm border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-indigo-500"
            type="text" 
            name="title_{{ $name }}" 
            id="title_{{ $name }}" 
            maxlength="60"
            value="@if(!empty($praxis)){{ $praxis->text->{'title_'.$name} }}@endif">
        <div id="count_title_{{ $name }}" class="absolute bottom-1 right-0 pr-1.5 text-xs text-gray-500"></div>
    </div>
    <div class="relative w-full mt-2">
        <textarea 
            name="text_{{ $name }}" 
            id="text_{{ $name }}" 
            maxlength="1000" 
            class="overflow-hidden w-full min-h-36 h-auto mt-1 rounded-sm border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-indigo-500"
        >@if(!empty($praxis)){{ $praxis->text->{'text_'.$name} }}@endif</textarea>
        <div id="count_text_{{ $name }}" class="absolute bottom-1 right-0 pr-2.5 text-xs text-gray-500"></div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const title = document.getElementById('title_{{ $name }}');
        const content = document.getElementById('text_{{ $name }}');
        const titleCount = document.getElementById('count_title_{{ $name }}');
        const contentCount = document.getElementById('count_text_{{ $name }}');
    
        title.addEventListener('input', function () {
            updateCount(this, titleCount, 60);
        });
    
        content.addEventListener('input', function () {
            updateCount(this, contentCount, 1000);
        });
    
        function updateCount(element, countDiv, maxChars) {
            const textLength = element.value.length;
            countDiv.textContent = `${textLength}/${maxChars}`;
        }
    });
</script>
