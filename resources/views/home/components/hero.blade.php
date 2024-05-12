<div class="flex h-screen items-center">
    <div class="w-1/2 text-violet-950">
        <h1 class="text-4xl font-bold">Finden Sie den Tierarzt in Ihrer Nähe</h1>
        <p class="text-lg leading-9 font-semibold mt-6 mb-16">Vergleichen Sie schnell und einfach Tierärzte in Ihrer Region! Finden Sie die passenden Dienstleistungen, die besten Preise und die höchsten Bewertungen, um die optimale Pflege für Ihr Haustier zu sichern</p>
        <div class="bg-white/20 rounded-md p-6">
            <form id="myForm" action="{{ route('praxis.search.index') }}" method="get">
                <div id="filter_header">
                    <x-filter.filter-header :title="request('title')" :postcode="request('postcode')" :radius="request('radius')"/>
                </div>
            </form>
        </div>   
    </div>
    <div class="w-1/2" id="image">
        <img src="{{ asset('storage/images/cat_and_dog.png') }}" alt="" class="bg-cover">
    </div>
</div>

<div id="smart">
    <div class="text-center text-violet-950">
        <h2 class="text-3xl font-semibold">Tierärzte vergleichen</h2>
        <p class="leading-8 font-semibold text-lg mt-8 mb-20">Entdecken Sie die beste tierärztliche Betreuung mit unserer benutzerfreundlichen Plattform. </br>Vergleichen Sie die Angebote von Tierärzten in Ihrer Gegend, um die beste Versorgung für Ihr Haustier zu gewährleisten</p>
    </div>

    <div class="flex gap-4 justify-between">
        <a href="#therapies">
            <div class="w-96 shadow-2xl rounded-md bg-white hover:bg-indigo-100 p-8 relative">
                {{-- <img width="64" src="https://uploads-ssl.webflow.com/6414640d6e0e2d7af389e640/6414703312a995c5e1a88c08_Medical%20Care%20(1).png" alt=""> --}}
                <div>
                    
                </div>
                <svg class="h-16 w-16 hover:w-32  hover:h-32 hover:absolute" fill="#2e10658a" viewBox="0 0 119.72 122.88"><g><path d="M40.06,0.37c9.4,0,17.03,11.69,17.03,26.1s-7.63,26.1-17.03,26.1c-9.4,0-17.03-11.68-17.03-26.1 C23.04,12.06,30.66,0.37,40.06,0.37L40.06,0.37z M61.71,63.55c19.94,0.04,22.42,13.25,39.23,35.86 c8.38,16.45-2.5,26.82-21.15,22.38c-8.46-4.31-14.41-5.83-20.38-5.63c-10.34,0.36-12.95,7.18-24.98,6.7 c-9.28-0.25-13.46-4.14-14.27-10.07c-0.87-6.3,1.56-10.28,4.52-15.49C36.18,77.02,48.07,61.01,61.71,63.55L61.71,63.55L61.71,63.55 z M7.17,39.08C0.14,41.86-2.1,52.85,2.16,63.62C6.42,74.39,15.57,80.87,22.6,78.09c7.03-2.78,9.27-13.77,5.01-24.54 C23.35,42.78,14.2,36.3,7.17,39.08L7.17,39.08z M112.55,39.08c7.03,2.78,9.27,13.77,5.01,24.54 c-4.26,10.77-13.42,17.25-20.44,14.47c-7.03-2.78-9.27-13.77-5.01-24.54C96.37,42.78,105.52,36.3,112.55,39.08L112.55,39.08z M79.35,0c9.4,0,17.03,11.69,17.03,26.1s-7.63,26.1-17.03,26.1c-9.4,0-17.03-11.68-17.03-26.1C62.33,11.69,69.95,0,79.35,0L79.35,0 z"/></g></svg>
                <h3 class="my-6 text-xl font-semibold">Tierarzt nach Facbereich suchen</h3>
                <p>Entdecken Sie die beste tierärztliche Betreuung mit unserer benutzerfreundlichen Plattform. Entdecken Sie die beste tierärztliche Betreuung mit unserer benutzerfreundlichen Plattform.</p>
            </div>
        </a>
        <div class="w-96 shadow-2xl rounded-md bg-white hover:bg-indigo-100 p-8">
            <a href="#therapies">
                <img width="64" src="https://uploads-ssl.webflow.com/6414640d6e0e2d7af389e640/641470221ebc5e3c9f735296_Walking%20(1).png" alt="">
                <h3 class="my-6 text-xl font-semibold">Tierarzt nach Leistung suchen</h3>
                <p>Entdecken Sie die beste tierärztliche Betreuung mit unserer benutzerfreundlichen Plattform. Entdecken Sie die beste tierärztliche Betreuung mit unserer benutzerfreundlichen Plattform.</p>
            </a>
        </div>
        <div class="w-96 shadow-2xl rounded-md bg-white hover:bg-indigo-100 p-8">
            <a href="#location">
                <img width="64" src="https://uploads-ssl.webflow.com/6414640d6e0e2d7af389e640/64146fd8dd2820431df2629a_Home%20(1).png" alt="">
                <h3 class="my-6 text-xl font-semibold">Tierarzt nach Ort suchen</h3>
                <p>Entdecken Sie die beste tierärztliche Betreuung mit unserer benutzerfreundlichen Plattform. Entdecken Sie die beste tierärztliche Betreuung mit unserer benutzerfreundlichen Plattform.</p>
            </a>
        </div>
    </div>
</div>

{{-- <script>
document.addEventListener("DOMContentLoaded", function() {
    const image = document.getElementById('image');
    const smart = document.getElementById('smart');
    const speed = 0.2; 

    window.addEventListener("scroll", function() {
        const scrolled = window.pageYOffset * speed;
        if (image) {
            image.style.transform = `translateY(-${scrolled}px)`;
        }
        if (smart) {
            smart.style.transform = `translateY(-${scrolled}px)`;
        }
    });
});
</script> --}}
