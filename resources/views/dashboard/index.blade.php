<x-layouts.layout>
    <link rel="stylesheet"
          href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"
            defer></script>
    <script>
        $(document).ready(function () {
            $('#articles').DataTable({
                "scrollX": true,
            });
        });
    </script>


    <div class="container">
        <table id="articles">
            <thead>
            <tr>
                <th>Title</th>
                <th>Excerpt</th>
                <th>Thumbnail</th>
                <th>Category</th>
                <th>Tags</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
            </thead>
            <tbody>
            @foreach($articles as $article)
                <tr>
                    <td>{{$article->title}}</td>
                    <td>{{Str::limit($article->excerpt, 100)}}</td>
                    <td><img src="{{$article->thumbnail_image}}"
                             alt="Thumbnail Image"
                             width="100px"></td>
                    <td>{{$article->category->name}}</td>
                    <td>
                        @foreach($article->tags->toArray() as $tag)
                            <a href="{{route('tag', $tag['slug'])}}"
                               class="text-decoration-none text-dark px-2 align-self-center">
                                {{$tag['name']}}
                            </a>
                        @endforeach
                    </td>
                    <td>{{$article->created_at}}</td>
                    <td>{{$article->updated_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{--    <ul class="nav nav-pills mb-3"--}}
    {{--        id="pills-tab"--}}
    {{--        role="tablist">--}}
    {{--        <li class="nav-item">--}}
    {{--            <a class="nav-link active"--}}
    {{--               id="pills-home-tab"--}}
    {{--               data-toggle="pill"--}}
    {{--               href="#pills-home"--}}
    {{--               role="tab"--}}
    {{--               aria-controls="pills-home"--}}
    {{--               aria-selected="true">Home</a>--}}
    {{--        </li>--}}
    {{--        <li class="nav-item">--}}
    {{--            <a class="nav-link"--}}
    {{--               id="pills-profile-tab"--}}
    {{--               data-toggle="pill"--}}
    {{--               href="#pills-profile"--}}
    {{--               role="tab"--}}
    {{--               aria-controls="pills-profile"--}}
    {{--               aria-selected="false">Profile</a>--}}
    {{--        </li>--}}
    {{--        <li class="nav-item">--}}
    {{--            <a class="nav-link"--}}
    {{--               id="pills-contact-tab"--}}
    {{--               data-toggle="pill"--}}
    {{--               href="#pills-contact"--}}
    {{--               role="tab"--}}
    {{--               aria-controls="pills-contact"--}}
    {{--               aria-selected="false">--}}
    {{--                Contact</a>--}}
    {{--        </li>--}}
    {{--    </ul>--}}
    {{--    <div class="tab-content"--}}
    {{--         id="pills-tabContent">--}}
    {{--        <div class="tab-pane fade show active"--}}
    {{--             id="pills-home"--}}
    {{--             role="tabpanel"--}}
    {{--             aria-labelledby="pills-home-tab">A--}}
    {{--        </div>--}}
    {{--        <div class="tab-pane fade"--}}
    {{--             id="pills-profile"--}}
    {{--             role="tabpanel"--}}
    {{--             aria-labelledby="pills-profile-tab">B--}}
    {{--        </div>--}}
    {{--        <div class="tab-pane fade"--}}
    {{--             id="pills-contact"--}}
    {{--             role="tabpanel"--}}
    {{--             aria-labelledby="pills-contact-tab">C--}}
    {{--        </div>--}}
    {{--    </div>--}}

</x-layouts.layout>
