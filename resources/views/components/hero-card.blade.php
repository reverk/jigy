<section class="hero-card container d-flex flex-column justify-content-center py-2">
    <desc class="d-flex flex-column flex-lg-row jumbotron justify-content-between bg-white">
        <div class="hero-card-text d-inline-flex flex-column justify-content-center p-2 ml-lg-3">
            <h1 class="font-weight-light">{{env('APP_NAME')}}</h1>
            <h2 class="font-weight-light">Where activities held are told.</h2>
        </div>
        <div class="hero-card-image d-inline-flex p-2 mr-lg-3 mt-2 mt-lg-0"
        >
            <img src="{{asset('static/images/hero_logo.svg')}}"
                 alt="Hero Image"
                 class="mw-100 mh-100">
        </div>
    </desc>
</section>

<div class="d-flex justify-content-center py-3">
    <button onclick="scrollToContent();" class="material-icons align-self-center btn"
       style="font-size: 32px;">keyboard_arrow_down</button>
</div>
