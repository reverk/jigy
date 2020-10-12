<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class CategoryController extends Controller
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
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        return view('dashboard.taxonomy.category.form', [
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
            'name' => 'required|unique:categories,name'
        ]);

        $tag = new Category([
            'name' => request('name')
        ]);
        $tag->user_id = auth()->user()->id;

        $tag->save();

        request()->session()->flash('alert-success', 'Category added!');
        return redirect()->route('dashboard.taxonomy');
    }

    /**
     * Display the specified resource.
     *
     * @param int $slug
     * @return Application|Factory|View
     */
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstorFail();
        return view('category', [
            'articles' => $category->articles,
            'name' => $category->name
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
        $category = Category::where('slug', $slug)->firstorFail();
        return view('dashboard.taxonomy.category.form', [
            'name' => 'Editing ' . '"' . $category->name . '"',
            'action' => 'Update category',
            'category' => $category,
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

        $category = Category::where('slug', $slug)->firstorFail();

        $category->slug = null; // Reset slug name

        $category->update(request()->all());

        request()->session()->flash('alert-success', 'Category updated!');
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
        $category = Category::where('slug', $slug)->firstorFail();

        $category->delete();

        request()->session()->flash('alert-success', 'Category deleted!');
        return redirect()->route('dashboard.taxonomy');
    }
}
