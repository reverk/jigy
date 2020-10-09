<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\View\View;

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
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        return view('dashboard.articles.create', [
            'categories' => Category::latest()->pluck('name', 'id'),
            'tags' => Tag::latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required|min:10',
            'excerpt' => 'required',
            'body' => 'required',
            'category' => 'required',
            'tags' => '',
            'isOutside' => '',
            'thumbnail' => 'image'
        ]);

        $article = new Article([
            'title' => request('title'),
            'slug' => Str::slug(request('title'), '-'),
            'excerpt' => request('excerpt'),
            'body' => request('body'),
            'category_id' => request('category'),
            'isOutside' => isOutside(request('isOutside')),
        ]);

        // Image upload
        if (request('thumbnail') != null) {
            $article->thumbnail_image = 'storage/' . request('thumbnail')->store('thumbnail');
        }
        $article->user_id = auth()->user()->id; // I've no idea why it can't be used inside Article class

        // Save article
        $article->save();

        // Add tags
        if (request('tags') != null) {
            $article->tags()->attach(request('tags'));
        }

        request()->session()->flash('alert-success', 'Article added!');
        return redirect()->route('dashboard.articles');
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
     * @param $slug
     * @return Application|Factory|Response|View
     */
    public function edit($slug)
    {
        return view('dashboard.articles.create', [
            'article' => Article::where('slug', $slug)->firstorFail(),
            'categories' => Category::latest()->pluck('name', 'id'),
            'tags' => Tag::latest()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
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
