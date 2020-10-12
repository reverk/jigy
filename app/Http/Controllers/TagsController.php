<?php

namespace App\Http\Controllers;

use App\Category;
use App\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View|Void
     */
    public function create()
    {
        return view('dashboard.taxonomy.tag.form', [
            'name' => 'Create Tag',
            'action' => 'Create tag',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return RedirectResponse
     */
    public function store()
    {
        request()->validate([
            'name' => 'required|unique:tags,name'
        ]);

        $tag = new Tag([
            'name' => request('name')
        ]);
        $tag->user_id = auth()->user()->id;

        $tag->save();

        request()->session()->flash('alert-success', 'Tag added!');
        return redirect()->route('dashboard.taxonomy');
    }

    /**
     * Display the article based on tag.
     *
     * @param int $slug
     * @return Application|Factory|View
     */
    public function show($slug)
    {
        $tag = Tag::where('slug', $slug)->firstorFail();
        return view('tag', [
            'articles' => $tag->articles->sortBy('created_at'),
            'name' => $tag->name
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|Response|View
     */
    public function edit($slug)
    {
        $tag = Tag::where('slug', $slug)->firstorFail();
        return view('dashboard.taxonomy.tag.form', [
            'name' => 'Editing ' . '"' . $tag->name . '"',
            'action' => 'Update tag',
            'tag' => $tag,
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
            'name' => 'required|unique:tags,name',
        ]);

        $tag = Tag::where('slug', $slug)->firstorFail();

        $tag->slug = null; // Reset slug name

        $tag->update(request()->all());

        request()->session()->flash('alert-success', 'Tag updated!');
        return redirect()->route('dashboard.taxonomy');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $slug
     * @return RedirectResponse
     */
    public function destroy($slug)
    {
        $tag = Tag::where('slug', $slug)->firstorFail();

        $tag->delete();

        request()->session()->flash('alert-success', 'Tag deleted!');
        return redirect()->route('dashboard.taxonomy');
    }
}
