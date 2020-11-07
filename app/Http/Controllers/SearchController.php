<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;


class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $tags = $request->input('tags');
        $categories = $request->input('categories');
        $date1 = $request->input('date1');
        $date2 = $request->input('date2');
        $articles = null;

        // The Below code relies on algolia. Go to README for more info.
        // Search w/ Algolia
        if ($search != null) {
            $articles = Article::search($search)->get();
        }

        // Tags & categories must be an array and contains their ID for this to work
        // The array can be either string or integer. Both works too
        if ($tags != null) {
            $articles = Article::search($search)->whereIn('tags_id', $tags)->get();
        }

        if ($categories != null) {
            $articles = Article::search($search)->whereIn('category_id', $categories)->get();
        }

        // Date range
        // Dates must be in DD-MM-YYYY format
        // The dates will be then converted to UNIX for searching
        if ($date1 != null && $date2 != null) {
            $articles = Article::search($search)
                ->whereBetween('created_at', [strtotime($date1), strtotime($date2)])
                ->get();
        }

        return view('search', [
            'tags' => Tag::all(),
            'articles' => $articles,
            'categories' => Category::all(),
        ]);
    }
}
