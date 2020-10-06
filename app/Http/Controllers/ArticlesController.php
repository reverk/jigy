<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ArticlesController extends Controller
{
    /**
     * Display a list of articles
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $articles = Article::latest()->paginate(10);
        $latest = $articles->shift();
        return view('index', [
            'latest' => $latest,
            'articles' => $articles,
        ]);
    }

    /**
     * Display an article.
     *
     * @param int $slug
     * @return Application|Factory|View
     */
    public function show($slug)
    {
        return view('article', [
            'article' => Article::where('slug', $slug)->firstorFail()
        ]);
    }
}
