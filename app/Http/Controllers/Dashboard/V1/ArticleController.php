<?php

namespace App\Http\Controllers\Dashboard\V1;

use App\Article;
use Gate;
use Illuminate\Http\Request;
use Validator;

class ArticleController extends DashboardController
{
    private function getPageTitle()
    {
        return "تاپیک";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('article-show') || Gate::allows('article-update') || Gate::allows('article-destroy'))
            $articles = Article::latest()->paginate(10);
        else
            abort(403);

        $pageTitle = $this->getPageTitle() . " - لیست";
        return view('Dashboard.Article.index', compact('pageTitle', 'articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {

        if (Gate::denies('article-update'))
            abort(403);

        //-----------------------------
        $pageTitle = $this->getPageTitle() . " - ویرایش";

        return view('Dashboard.Article.edit', compact(
            'article',
            'pageTitle'
          ));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Article $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        if (Gate::denies('article-update'))
            abort(403);
        //-----------------------------
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:2|max:255',
            'body' => 'required'
        ]);
        if ($validator->fails()) {
            $this->errorMessage($validator);
            return redirect()->back()->withInput();
        }
        $article->slug = null;

        $article->update([
            "title" => $request->title,
            "body" => $request->body,
            "confirmed" => (bool) $request->confirmed ,
            "closed" => (bool) $request->closed ,
        ]);
        //-----------------------------
        $this->successMessage(['عملیات موفقیت آمیز بود']);
        return redirect()->to($request->input('redirects_to'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param  \App\Article $article
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Article $article)
    {
        if (Gate::denies('article-destroy'))
            abort(403);
        //-----------------------------
        $article->delete();
        //-----------------------------
        $this->successMessage(['عملیات موفیت آمیز بود']);
        return redirect()->to($request->input('redirects_to'));
    }





}
