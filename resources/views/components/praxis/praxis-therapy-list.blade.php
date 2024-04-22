<div class="columns-2 gap-20">
    @foreach($praxis->therapyClinics->where('category_id', $category) as $therapy)
    <div class="box break-inside-avoid">
        <div class="pb-2 font-semibold">{{ $therapy->therapy_title }}</div>       
        <div class="mb-10 text-justify">{{ $therapy->therapy_text }}</div>
    </div>
    @endforeach
    @foreach($praxis->therapyOthers->where('category', $category) as $therapyOther)
        <div class="box break-inside-avoid">
            <div class="pb-2 font-semibold">{{ $therapyOther->therapy_other }}</div>       
            <div class="mb-10">{{ $therapyOther->therapy_other_text }}</div>
        </div>
    @endforeach
<div>
