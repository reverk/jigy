<x-layouts.layout>
    <x-hero-card/>

    @isset($latest)
        <x-title name="Latest Article"/>
        <x-latest-article :article="$latest"/>
    @endisset

    <x-title name="Articles"/>
    <div class="container">
        <div class="row">
            @forelse($articles as $article)
                <div class="col-lg py-3">
                    <x-card :article="$article"/>
                </div>
                @if ($loop->iteration % 2 == 0)
                    <div class="w-100"></div>
                @endif
            @empty
                <x-error-post/>
            @endforelse

        </div>
    </div>


    <div class="container">
        {{ $articles->links() }}
    </div>
</x-layouts.layout>

