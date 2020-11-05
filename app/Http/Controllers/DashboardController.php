<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $cat = Article::where('user_id', auth()->user()->id)
            ->select('category_id')
            ->selectRaw('COUNT(*) as count')
            ->groupBy('category_id')
            ->orderByDesc('count')
            ->first();
        $tag = Tag::join('article_tag', 'article_tag.tag_id', '=', 'tags.id')
            ->join('articles', 'articles.id', '=', 'article_tag.article_id')
            ->where('articles.user_id', auth()->user()->id)
            ->groupBy('tags.id')
            ->get(['tags.id',DB::raw('count(tags.id) as count')])
            ->sortByDesc('count')->first();

        if ($cat == null) {
            $most_tag = [
                'name' => "None",
                'count' => 0,
            ];
        } else {
            $most_tag = [
                'name' => Tag::find($tag->id)->name,
                'count' => $tag->count,
            ];
        }

        if ($tag == null) {
            $most_cat = [
                'name' => "None",
                'count' => 0,
            ];
        } else {
            $most_cat = [
                'name' => Category::find($cat->category_id)->name,
                'count' => $cat->count,
            ];
        }

        return view('dashboard.index', [
            'articles' => Article::where('user_id', auth()->user()->id)->latest()->take(5)->get(),
            'stats' => [
                'articles_posted' => Article::where('user_id', auth()->user()->id)->count(),
                'past_month' => Article::where('created_at', '>', Carbon::now()->subMonths(1))->where('user_id', auth()->user()->id)->count(),
                'most_tag' => $most_tag,
                'most_category' => $most_cat,
            ],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
