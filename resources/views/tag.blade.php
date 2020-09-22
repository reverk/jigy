<x-layouts.layout>
    <x-title name="Tags related to: {{$name}}"/>
    @forelse ($articles as $article)
        <div class="container">
            <x-related-card :article="$article"/>
        </div>
    @empty
        <x-error_post/>
    @endforelse
</x-layouts.layout>
