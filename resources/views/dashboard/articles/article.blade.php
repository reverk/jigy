<x-layouts.dashboard-layout>
    <div class="container">
        <div class="d-flex justify-content-between my-5">
            <div class="h2 font-weight-bold">{{$name}}</div>
            <x-dashboard-create-actions/>
        </div>

        @forelse($articles as $article)
            <x-dashboard-article :article="$article"/>
        @empty
            <x-error-post/>
        @endforelse

        {{ $articles->links() }}
    </div>
</x-layouts.dashboard-layout>
