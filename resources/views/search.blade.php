<html>
<style>
    .radius {
        border-radius: 75px;
    }

    .line {
        border-top: 1px solid gray;
    }
</style>
</html>
<x-layouts.layout>

    <div class="container d-flex align-items-center justify-content-center my-5">
        <div class="p-2 col-lg-9">
            {{--            search title--}}
            <div class="mb-5 text-center">
                <x-title name="Search"/>
            </div>
            {{--seach bar--}}
            <form action="{{URL::to('/search')}}" method="GET" role="search">
                {{csrf_field()}}
                <div class="input-group mb-5 border border-secondary radius m-3 col-lg-11">
                    <input type="text" class="form-control m-2 border-0" name="search" placeholder="Look for..."
                           aria-label="Look for...">
                    <div class="input-group-append">
                        <button class="btn m-2" type="submit" id="button-addon2"><span
                                class="material-icons">search</span>
                        </button>
                    </div>
                </div>

                {{--            tag title--}}
                <div class="mb-5">
                    <x-title name="Tags"/>
                </div>
                {{--            tag--}}
                <div class="mb-5 p-3 d-flex flex-wrap justify-content-center">
                    @forelse($tags as $tag)
                        <x-tags placeholder="{{$tag->name}}"/>
                        <x-tags placeholder="{{$tag->slug}}"/>
                    @empty
                        <p>There's nothing here!</p>
                    @endforelse
                </div>
                {{--            date range--}}
                <div class="mb-5">
                    <x-title name="Date Range"/>
                </div>
                {{--            date picker--}}
                <div class="row mb-5">
                    <div class="col-sm-4">
                        <x-datepicker placeholder="From..."/>
                    </div>
                    <div class="col">
                        <hr class="line">
                    </div>
                    <div class="col-sm-4">
                        <x-datepicker placeholder="To..."/>
                    </div>
                </div>
            </form>
            {{--show result--}}
            <div class="mb-5">
                <x-title name="Results"/>
            </div>

        </div>
    </div>
</x-layouts.layout>
