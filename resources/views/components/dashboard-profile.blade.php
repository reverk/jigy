<section class="container d-flex justify-content-between align-items-center flex-lg-row flex-column p-2 my-5">
    <div class="d-inline-flex align-items-center">
        <img src="{{auth()->user()->avatar}}"
             alt="Profile image"
             width=100px>
        <div class="d-inline-flex align-items-center ml-4">
            <span class="h2 font-weight-bold">{{auth()->user()->name}}</span>
            <div class="dot mx-3 d-none d-lg-block"></div>
            {{--            TODO: Add edit link--}}
            <a href="{{route('dashboard.profile')}}"
               class="small d-none d-lg-block">Edit</a>
        </div>
    </div>
    <x-dashboard-create-actions margins="m-lg-0 mt-5"/>
</section>
