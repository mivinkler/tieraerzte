@if(isset($praxis->text->$title))
    <h2 class="font-bold mb-4 text-lg text-sky-800">
        {{ $praxis->text->$title }}
    </h2>
@endif
@if(isset($praxis->text->$text))
    <p class="mb-20 text-base">
        {!! nl2br(e($praxis->text->$text )) !!}
    </p>
@endif
