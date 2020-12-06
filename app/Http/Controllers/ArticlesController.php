<?php

namespace App\Http\Controllers;

use App\Http\Requests\article\createArticleRequest;
use App\Http\Requests\article\updateArticleRequest;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $articles = Article::all();
        $articles = ArticleResource::collection($articles);
        return $articles;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreateArticleRequest $request)
    {
        //
        $user = auth('api')->user();
        $request->validate([
            'title'=>'required|string|min:10|max:50|unique:articles',
            'body'=>'required|string'
        ]);
        $data = $request->all();
        $data['user_id'] = $user['id'];
        return Article::create($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $articles
     * @return \Illuminate\Http\Response
     */
    public function show($article)
    {
        $article = Article::findOrFail($article);
        $article = new ArticleResource($article);
        return $article;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $articles
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $articles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $articles
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, $article)
    {
        $data = $request->all();
        $data['user_id']=1;
        $article = Article::findOrFail($article);
        $article->update($data);
        return $article;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $articles
     * @return \Illuminate\Http\Response
     */
    public function destroy($article)
    {
        //
        $article = Article::FindOrFail($article);
        $article->delete();
    }
}
