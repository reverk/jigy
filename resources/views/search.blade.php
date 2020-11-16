<x-layouts.layout>
    <div class="container d-flex align-items-center justify-content-center my-5">
        <div class="p-2 col-lg-9">
            {{--            search title--}}
            <div class="mb-5 text-center">
                <x-title name="Search"/>
            </div>
            {{--seach bar--}}
            <form action="{{route('search')}}" method="GET">
                @csrf
                <div class="d-flex flex-row  justify-content-center">
                    <div class="input-group border border-secondary radius p-1" style="max-width: 750px">
                        <input type="text" class="form-control m-2 border-0" name="search" id="search" placeholder="Look for..."
                               aria-label="Look for...">
                        <div class="input-group-append">
                            <button class="btn d-flex align-items-center" type="submit" id="button-addon2">
                                <span class="material-icons">search</span>
                            </button>
                        </div>
                    </div>
                    <button type="button" class="btn d-flex align-items-center" onclick="showAdvancedSearch()">
                        <span class="material-icons">keyboard_arrow_down</span>
                    </button>
                </div>

{{--                Advanced search: Hidden --}}
                <section class="d-none mt-5" id="advanced_search">
                    {{--            tag title--}}
                    <div class="mb-5">
                        <x-title name="Tags"/>
                    </div>
                    {{--            tag--}}
                    <div class="mb-5 p-3 d-flex flex-wrap justify-content-center">
                        @forelse($tags as $tag)
                            <x-tags placeholder="{{$tag->name}}" name="{{$tag->id}} "/>
                        @empty
                            <p>There's nothing here!</p>
                        @endforelse
                    </div>

                    {{--                category--}}
                    <div class="mb-5">
                        <x-title name="Category"/>
                    </div>
                    {{--   category tag--}}
                    <div class="mb-5 p-3 d-flex flex-wrap justify-content-center">
                        @forelse($categories as $category)
                            <x-category-tag placeholder="{{$category->name}}" name="{{$category->id}}"/>
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
                            <x-datepicker placeholder="From..." name="date1" id="date1"/>
                        </div>
                        <div class="col">
                            <hr class="line">
                        </div>
                        <div class="col-sm-4">
                            <x-datepicker placeholder="To..." name="date2" id="date2"/>
                        </div>
                    </div>
                </section>
            </form>
        </div>
    </div>

    <section class="container">
        {{--show result--}}
        @if(isset($articles))
            <div class="mb-5">
                <x-title name="Results"/>
            </div>
            <div class="mb-5">
                @forelse($articles as $article)
                    <x-related-card :article="$article"/>
                @empty
                    <x-error-post/>
                @endforelse
            </div>
        @endif

    </section>
</x-layouts.layout>
