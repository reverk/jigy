<section class="d-flex justify-content-between flex-column hero-card overflow-hidden position-relative hero-image"
         style="background-image: url({{asset('static/images/hero_img.jpg')}})">
    @if(Request::routeIs('index'))
        <div class="hero-card-navbar">
            <x-layouts.navbar/>
        </div>
    @endif
    <desc class="text-center hero-card-text">
        <h1 class="font-weight-light text-white">{{config('app.name', 'Laravel')}}</h1>
        <h2 class="font-weight-light text-white">Where activities held are told.</h2>
    </desc>
    <button onclick="scrollToContent();"
            class="material-icons align-self-center btn mb-4"
            style="font-size: 32px; color: white">keyboard_arrow_down
    </button>
</section>
