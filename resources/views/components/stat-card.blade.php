<div class="border rounded px-lg-4 py-lg-5 px-3 py-4 my-lg-4 mx-lg-2 my-2 mx-0 d-flex justify-content-between flex-column" style="flex-basis: 100%">
    <div class="h5 mb-5">{{$name}}</div>
    @if(is_array($value))
        <div class="h2 font-weight-bold">{{$value['name']}} <span class="h6">({{$value['count']}})</span></div>
    @else
        <div class="h2 font-weight-bold">{{$value}}</div>
    @endif
</div>
