<div class="flex gap-20 leading-8 relative text-violet-950">
    <div class="basis-1/2 relative">
        <div class="sticky top-[30svh] pr-12">
            <h3 class="text-2xl font-semibold mb-6">Tierarztpraxis vergleichen</h3>
            <p class="text-lg leading-8">Unser Portal ermöglicht es Ihnen, aus einer breiten Palette von tierärztlichen Dienstleistungen zu wählen, von Routineuntersuchungen bis hin zu spezialisierten Behandlungen. Nutzen Sie unsere Vergleichsfunktionen, um sicherzustellen, dass Ihr Haustier die beste verfügbare Pflege erhält</p>
        </div>
    </div>
    
    <div class="basis-1/2 font-semibold">
        <div>
            <h2 class="text-2xl mb-6">Fachbereiche</h2>
            <div class="grid gap-y-4 gap-2 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($therapyList as $therapy)
                        <a href="">
                            &bull; &nbsp; {{ $therapy->therapy_title }}
                        </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
