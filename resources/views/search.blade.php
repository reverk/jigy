<html>
<style>
.radius{
    border-radius: 75px;
}
</style>
</html>
<x-layouts.layout>

    <div class="container d-flex align-items-center justify-content-center my-5"
         style="height: 30vh">
        <div class="p-2 col-lg-7">
{{--            search title--}}
            <div class="mb-5 text-center">
                <x-title name="Search"/>
            </div>
            {{--seach bar--}}
            <div class="input-group mb-5 border border-secondary radius m-3">
                <input type="text" class="form-control m-2 border-0" placeholder="Look for..."
                       aria-label="Look for...">
                <div class="input-group-append">
                    <button class="btn m-2" type="button" id="button-addon2"><span
                            class="material-icons">search</span>
                    </button>
                </div>
            </div>
{{--            tag title--}}
            <div class="mb-5">
            <x-title name="Tags"/>
            </div>
{{--            tag--}}
        <div class="container-fluid alert-secondary p-3">
            @forelse($tags as $tag)
                <x-tags name="{{$tag->name}}" />
                <x-tags name="{{$tag->slug}}" />
            @empty
                <p>There's nothing here!</p>
            @endforelse
            </div>
        </div>
    </div>
</x-layouts.layout>
