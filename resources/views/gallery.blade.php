<x-layouts.layout>

    <x-title name="Gallery"/>

    @if($articles->count() == 0)
        <div class="text-center">
            <x-error-post/>
        </div>
    @endisset

    <div class="container grid mt-3">
        @forelse($articles as $article)
            <div class="grid-item position-relative p-1">
                <img src="{{$article->thumbnail_image}}"
                     class="mh-100 mw-100"
                     alt="{{$article->title}}">
                <a href="{{route('article', $article->slug)}}"
                   class="h5 position-absolute p-0 m-1 border-0 d-flex align-items-end text-dark">
                    <div class="p-2 mb-1">
                        {{$article->title}}
                    </div>
                </a>
            </div>
        @empty

        @endforelse
    </div>

</x-layouts.layout>
