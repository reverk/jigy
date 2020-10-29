<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Helpers\Helper;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\User;


class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*$articles = $request->input('articles');

        $users = User::with('services', function($query) use ($articles) {
            $query->where('articles', 'LIKE', '%' . $articles . '%');
        })->get();

        return view('search', compact('users'));*/
        return view('search', [
            'tags' => Tag::all(),
            'categories' => Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('article', [
            'article' => Article::where('slug', $slug)->firstorFail()
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
