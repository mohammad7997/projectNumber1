<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\frontModel\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $articles = Article::orderBy('id', 'desc')->paginate(8);
        return view('front.article.articles', compact('articles'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
        $article->increment('hits', 2);
        $comments=$article->comments()->where('status',1)->get();
        return view('front.article.article', compact('article','comments'));
    }
}
