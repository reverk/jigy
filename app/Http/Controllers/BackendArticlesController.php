<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
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
        return view('dashboard.articles.form', [
            'name' => 'Create an article',
            'action' => 'Create article',
            'categories' => Category::latest()->pluck('name', 'id'),
            'tags' => Tag::latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
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
            'excerpt' => request('excerpt'),
            'body' => request('body'),
            'category_id' => request('category'),
            'isOutside' => convert_isOutside(request('isOutside')),
        ]);

        // Image upload
        if (request('thumbnail') != null) {
            $article->thumbnail_image = 'storage/' . request('thumbnail')->store('thumbnail');
        } else {
            $article->thumbnail_image = 'static/images/default_thumbpng.png';
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
        $article = Article::where('slug', $slug)->firstorFail();
        $title = $article->title;
        return view('dashboard.articles.form', [
            'name' => "Editing \"${title}\"",
            'action' => 'Update Article',
            'article' => $article,
            'categories' => Category::latest()->pluck('name', 'id'),
            'tags' => Tag::latest()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $slug
     * @return RedirectResponse
     */
    public function update($slug)
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

        $article = Article::where('slug', $slug)->firstorFail();

        // Update image
        if (request('thumbnail') != null) {
            $path = str_replace('storage/', '', $article->getraworiginal('thumbnail_image'));
            if (Storage::disk('public')->exists($path)) { // If file exists
                Storage::disk('public')->delete($path);
                $article->thumbnail_image = 'storage/' . \request('thumbnail')->store('thumbnail');
            }
        }
        // Update tags
        if (request('tags') != null) {
            $article->tags()->sync(request('tags'));
        }

        $article->slug = null; // Reset slug name

        $article->update(request()->all());

        request()->session()->flash('alert-success', 'Article updated!');
        return redirect()->route('dashboard.articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $slug
     * @return RedirectResponse
     */
    public function destroy($slug)
    {
        $article = Article::where('slug', $slug)->firstorFail();

        $path = str_replace('storage/', '', $article->getraworiginal('thumbnail_image'));
        if (Storage::disk('public')->exists($path)) { // If file exists
            Storage::disk('public')->delete($path);
        }
        $article->delete();

        request()->session()->flash('alert-success', 'Article deleted!');
        return redirect()->route('dashboard.articles');
    }
}
