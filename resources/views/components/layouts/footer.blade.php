<footer class="footer d-flex justify-content-center align-items-center d-flex">
    <div class="row flex-lg-row flex-column">
        <div class="col p-2 mr-lg-5 mb-lg-0 mb-2 mb-lg-0 mb-4 px-lg-0 px-2 d-flex footer-left">
            <div class="align-self-center">
                <h1 class="footer-title">{{env('APP_NAME')}}</h1>
                <h5>&#169; JiGy - Made by JiGy team</h5>
            </div>
        </div>
        <div class="col p-2 ml-lg-5 d-flex">
            <div class="row align-self-center">
                <ul class="col list-unstyled mb-0 mr-lg-2 px-3">
                    {{--                    TODO: Replace links with the apporiate links --}}
                    <li class="py-3 mb-0 h5"><a href="{{route('index')}}">Home</a></li>
                    <li class="py-3 mb-0 h5"><a href="{{route('index')}}">Gallery</a></li>
                </ul>
                <ul class="col list-unstyled mb-0 px-3">
                    <li class="py-3 mb-0 h5"><a href="{{route('index')}}">Search</a></li>
                    <li class="py-3 mb-0 h5"><a href="{{route('index')}}">About</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>