<x-layouts.layout>
    <div class="container">
        <x-title name="Statistics"/>
    </div>
    <div class="container">
        <div class="border rounded m-1 p-3">
            <div class="h5 text-center mb-3"># of articles posted</div>
            <canvas id="articles" width="150"></canvas>
        </div>
    </div>
    <div class="d-flex flex-lg-row flex-column container">
        <div class="flex-grow-1 border rounded m-1 p-3" style="flex-basis: 0;">
            <div class="h5 text-center mb-3"># of category associated with articles</div>
            <canvas id="category" width="150" height="150"></canvas>
        </div>
        <div class="flex-grow-1 border rounded m-1 p-3" style="flex-basis: 0;">
            <div class="h5 text-center mb-3"># of tags associated with articles</div>
            <canvas id="tag" width="150" height="150"></canvas>
        </div>
        <div class="flex-grow-1 border rounded m-1 p-3" style="flex-basis: 0;">
            <div class="h5 text-center mb-3"># of activities held inside/outside</div>
            <canvas id="venue" width="150" height="150"></canvas>
        </div>
    </div>

    <script src="{{asset('node_modules/chart.js/dist/Chart.bundle.js')}}"></script>
    <script src="{{asset('node_modules/chart.js/dist/Chart.bundle.min.js')}}"></script>
    <script>
        let dynamicColors = function() {
            let r = Math.floor(Math.random() * 255);
            let g = Math.floor(Math.random() * 255);
            let b = Math.floor(Math.random() * 255);
            return "rgb(" + r + "," + g + "," + b + ")";
        };

        let colors_cat = []
        for (let i in @json($category['name'])) {
            colors_cat.push(dynamicColors())
        }

        let cat_elem = document.getElementById('category');
        let cat_chart = new Chart(cat_elem, {
            type: 'doughnut',
            data: {
                labels: @json($category['name']),
                datasets: [{
                    label: '# of category associated with articles',
                    data: @json($category['count']),
                    backgroundColor: colors_cat,
                }]
            },
        });

        let colors_tag = []
        for (let j in @json($tag['name'])) {
            colors_tag.push(dynamicColors())
        }

        let tag_elem = document.getElementById('tag');
        let tag_chart = new Chart(tag_elem, {
            type: 'doughnut',
            data: {
                labels: @json($tag['name']),
                datasets: [{
                    label: '# of tags associated with articles',
                    data: @json($tag['count']),
                    backgroundColor: colors_tag,
                }]
            },
        });

        let colors_venue = []
        for (let j in @json($venue['name'])) {
            colors_venue.push(dynamicColors())
        }

        let venue_elem = document.getElementById('venue');
        let venue_chart = new Chart(venue_elem, {
            type: 'doughnut',
            data: {
                labels: @json($venue['name']),
                datasets: [{
                    label: '# of activities held inside/outside',
                    data: @json($venue['values']),
                    backgroundColor: colors_venue,
                }]
            },
        });

        let colors_art = []
        for (let i in @json($articles['name'])) {
            colors_art.push(dynamicColors())
        }

        let art_elem = document.getElementById('articles');
        let art_chart = new Chart(art_elem, {
            type: 'bar',
            data: {
                labels: @json($articles['name']),
                datasets: [{
                    label: '# of articles posted',
                    data: @json($articles['count']),
                    backgroundColor: colors_art,
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</x-layouts.layout>
