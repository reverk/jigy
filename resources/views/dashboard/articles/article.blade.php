<x-layouts.dashboard-layout>
    <div class="container">
        <x-dashboard-header :name="$name"/>

        <div class="list-group-flush">
            @forelse($articles as $article)
                <x-dashboard-article :article="$article"/>
            @empty
                <x-error-post/>
            @endforelse
        </div>

        {{ $articles->links() }}
    </div>
</x-layouts.dashboard-layout>
