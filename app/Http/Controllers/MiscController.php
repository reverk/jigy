<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class MiscController extends Controller
{
    /**
     * Show stats page.
     *
     * @return Application|Factory|Response|View
     */
    public function stats()
    {
        $history = Article::selectRaw('YEAR(created_at) year, MONTH(created_at) month, MONTHNAME(created_at) month_name, COUNT(*) post_count')
            ->groupByRaw('year, MONTH(created_at)')
            ->orderByRaw('year DESC, month DESC')
            ->whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])
            ->get();
        $history_name = [];
        $history_count = [];
        foreach ($history as $his) {
            array_push($history_name, $his->month_name . ' ' . $his->year);
            array_push($history_count, $his->post_count);
        }

        $category_count = Article::select('category_id')
            ->selectRaw('COUNT(*) AS count')
            ->groupBy('category_id')
            ->orderByDesc('count')
            ->whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])
            ->get()
            ->pluck('count')
            ->toArray();
        $category_id = Article::select('category_id')
            ->selectRaw('COUNT(*) AS count')
            ->groupBy('category_id')
            ->orderByDesc('count')
            ->whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])
            ->get()
            ->pluck('category_id')
            ->toArray();
        $category_name = [];
        foreach ($category_id as $cat) {
            array_push($category_name, Category::find($cat)->name);
        }

        $tag_count = Tag::join('article_tag', 'article_tag.tag_id', '=', 'tags.id')
            ->groupBy('tags.id')
            ->whereBetween('article_tag.created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])
            ->get(['tags.id', DB::raw('count(tags.id) as tag_count')])
            ->sortByDesc('tag_count')
            ->pluck('tag_count')
            ->toArray();
        $tag_id = Tag::join('article_tag', 'article_tag.tag_id', '=', 'tags.id')
            ->groupBy('tags.id')
            ->whereBetween('article_tag.created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])
            ->get(['tags.id', DB::raw('count(tags.id) as tag_count')])
            ->sortByDesc('tag_count')
            ->pluck('id')
            ->toArray();
        $tag_name = [];
        foreach ($tag_id as $tag) {
            array_push($tag_name, Tag::find($tag)->name);
        }
        return view('stats', [
            'category' => [
                'count' => $category_count,
                'name' => $category_name
            ],
            'tag' => [
                'count' => $tag_count,
                'name' => $tag_name,
            ],
            'venue' => [
                'values' => [
                    Article::where('is_outside', 1)->count(),
                    Article::where('is_outside', 0)->count(),
                ],
                'name' => [
                    'outside',
                    'inside',
                ],
            ],
            'articles' => [
                'count' => $history_count,
                'name' => $history_name,
            ]
        ]);
    }

    /**
     * Show about page.
     *
     * @return Application|Factory|Response|View
     */
    public function about()
    {
        return view('about');
    }

}
