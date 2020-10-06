<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use phpDocumentor\Reflection\Types\AbstractList;

class BackendArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        return view('dashboard.articles.article', [
            'name' => "Your Articles",
            'articles' => Article::where('user_id', auth()->user()->id)->latest()->paginate(5),
        ]);
    }

    /**
     * Display a listing of the resource as Admin or higher.
     *
     * @return View|void
     */
    public function index_all()
    {
        if (auth()->user()->can('manage all articles')) {
            return view('dashboard.articles.article', [
                'name' => "All Articles",
                'articles' => Article::latest()->paginate(5)
            ]);
        } else {
            return abort(403);
        }
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
     * @param \App\Article $article
     * @return Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Article $article
     * @return Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Article $article
     * @return Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Article $article
     * @return Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
