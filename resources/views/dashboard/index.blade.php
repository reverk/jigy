<x-layouts.dashboard-layout>

    <x-dashboard-profile/>

    <section class="container">
        <div class="h2 font-weight-bold py-2 mb-3">Stats</div>
        <div class="d-flex flex-lg-row flex-column mb-2">
            <x-stat-card name="Number of articles posted" :value="$stats['articles_posted']" />
            <x-stat-card name="Number of articles posted in the past month" :value="$stats['past_month']" />
            <x-stat-card name="Most used tag" :value="$stats['most_tag']" />
            <x-stat-card name="Most used categories" :value="$stats['most_category']" />
        </div>

        <div class="h2 font-weight-bold py-2 mb-3">Articles</div>
        <div class="list-group-flush">
            @forelse($articles as $article)
                <x-dashboard-article :article="$article"/>
            @empty
                <x-error-post/>
            @endforelse
        </div>

        <div class="d-flex justify-content-end">
            <a href="{{route('dashboard.articles')}}"
               class="d-inline-flex my-lg-5 mt-3 py-1 text-dark">
                <span class="align-self-center">
                    View More
                </span>
                <span class="material-icons"
                      style="font-size: 32px">
                    keyboard_arrow_right
                </span>
            </a>
        </div>
    </section>
</x-layouts.dashboard-layout>
