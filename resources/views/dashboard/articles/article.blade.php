<x-layouts.dashboard-layout>
    <div class="container">
        <x-dashboard-header :name="$name"/>

        @forelse($articles as $article)
            <x-dashboard-article :article="$article"/>
        @empty
            <x-error-post/>
        @endforelse

        {{ $articles->links() }}
    </div>
</x-layouts.dashboard-layout>
