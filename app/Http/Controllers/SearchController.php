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
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $articles = null;

        if ($search != null) {
            $articles = Article::where('title', 'like', '%' . $search . '%')->get();
        }

        // Search w/ Algolia
        if ($search != null) {
            $articles = Article::search($search)->get();
        }

//        // The Below code relies on algolia. Go to README for more info.
//        // Tags/Categories (create 2 ifs for this)
//        // Tags & categories must be an array and contains their ID for this to work
//        // The array can be either string or integer. Both works too
//        if ($tags != null) {
//            $articles = Article::search($search)->whereIn('tags_id', $tags)->get();
//        }
//        if ($categories != null) {
//            $articles = Article::search($search)->whereIn('category_id', $categories)->get();
//        }
//
//        // Date range
//        // Dates must be in DD-MM-YYYY format
//        // The dates will be then converted to UNIX for searching
//        if ($date1 != null && $date2 != null) {
//            $articles = Article::search($search)
//                ->whereBetween('created_at', [strtotime($date1), strtotime($date2)])
//                ->get();
//        }

        return view('search', [
            'tags' => Tag::all(),
            'articles' => $articles,
            'categories' => Category::all(),
        ] );
    }

    /**
     * Filter Search Result
     *
     * @return \Illuminate\Http\Response
     */

    /*public function filter(){
        /*$search = Input::get('search');
        $date = Input::get('date');
        $tags = Input::get('tags');
        */

        /*if($search = Input::get('search')){
            if($date = Input::get('date')){
                if($tags = Input::get('tags')){
                    #
                }else{
                    #
                }
            }if($tags = Input::get('tags')){
                if($date = Input::get('date')){
                    #
                }
            } else{
                return view('article', [
                    'article' => Article::where('search', $search)->firstorFail()
                ]);
            }
        }
    }*/
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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
