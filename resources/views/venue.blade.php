<x-layouts.layout>
    <x-title name="Activities: {{$name}}"/>
    @forelse ($articles as $article)
        <div class="container">
            <x-related-card :article="$article"/>
        </div>
    @empty
        <x-error-post/>
    @endforelse
</x-layouts.layout>

