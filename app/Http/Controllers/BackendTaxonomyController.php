<?php

namespace App\Http\Controllers;

use App\Category;
use App\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Response;
use Illuminate\View\View;

class BackendTaxonomyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View|Void
     */
    public function index()
    {
        if (auth()->user()->can('manage taxonomies')) {
            return view('dashboard.taxonomy.taxonomy', [
                'name' => 'Tags & Categories',
                'tags' => Tag::latest()->get(),
                'categories' => Category::latest()->get(),
            ]);
        } else {
            return abort(403);
        }
    }
}
