<x-layouts.layout>
    <x-title name="Category related to: {{$name}}"/>
    @foreach ($articles as $article)
        <div class="container">
            <x-related-card :article="$article"/>
        </div>
    @endforeach
</x-layouts.layout>
