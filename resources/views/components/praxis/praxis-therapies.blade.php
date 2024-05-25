<div class="grid grid-cols-2 gap-x-16 gap-y-10 text-base">
    @foreach($praxis->therapyClinics->where('category', $category) as $therapy)
    <div class="">
        <div class="pb-2 font-semibold">{{ $therapy->therapy_title }}</div>       
        <div class="">{{ $therapy->therapy_text }}</div>
    </div>
    @endforeach
    @foreach($praxis->therapyOthers->where('category', $category) as $therapyOther)
        <div class="">
            <div class="pb-2 font-semibold">{{ $therapyOther->other_title }}</div>       
            <div class="">{{ $therapyOther->other_text }}</div>
        </div>
    @endforeach
<div>
