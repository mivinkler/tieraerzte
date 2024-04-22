@if(isset($praxis->text->$title))
    <h2 class="font-bold mb-6 text-[1.4rem] text-sky-800">
        {{ $praxis->text->$title }}
    </h2>
@endif
@if(isset($praxis->text->$text))
    <p style="line-height: 1.8em; margin-bottom: 3rem">
        {!! nl2br(e($praxis->text->$text )) !!}
    </p>
@endif
