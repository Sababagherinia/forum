<?php

namespace App\Http\Controllers\Website\V1;

use App\Article;
use Illuminate\Http\Request;
use Validator;
use SEO;
use OpenGraph;

class ArticleController extends WebsiteController
{


    public function show(Article $article)
    {
        $prerequisites = parent::prerequisites();
        //------------------------------------------------------ Seo
        SEO::setTitle($prerequisites['brandName'] . ' - ' . $article->title);
        SEO::setDescription($prerequisites['brandName'] . ' - ' . $article->lead);
        SEO::opengraph()->addProperty('type', 'articles');
        OpenGraph::addImage(env('APP_URL') . '/assets/images/logo.jpg');
        OpenGraph::addProperty('locale', 'fa-ir');
        //-------------------------------------------------------
        return view("Website.Article.show" , compact(
            'prerequisites' ,
            'article'
        ));
    }

    public function create()
    {
        $prerequisites = parent::prerequisites();
        //------------------------------------------------------ Seo
        SEO::setTitle($prerequisites['brandName'] . ' - ' . "ایجاد تاپیک");
        SEO::setDescription($prerequisites['brandName'] . ' - ' . "ایجاد تاپیک");
        SEO::opengraph()->addProperty('type', 'articles');
        OpenGraph::addImage(env('APP_URL') . '/assets/images/logo.jpg');
        OpenGraph::addProperty('locale', 'fa-ir');
        //-------------------------------------------------------
        return view("Website.Article.create" , compact(
            'prerequisites'
        ));
    }

    public function store(Request $request)
    {
        //-----------------------------
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:2|max:255',
            'body' => 'required',
        ]);
        if ($validator->fails()) {
            $this->errorMessage($validator);
            return redirect()->back()->withInput();
        }
        //-----------------------------
        $article = Article::create([
            "title" => $request->title,
            "body" => $request->body,
            "user_id" => auth()->user()->id
        ]);
        //-----------------------------
        $this->successMessage(['عملیات موفقیت آمیز بود']);
        return redirect()->to($request->input('redirects_to'));
    }

    public function edit(Article $article)
    {
        if (!auth()->check() || $article->user->id != auth()->user()->id)
            return redirect(route("website.home"));


        $prerequisites = parent::prerequisites();
        //------------------------------------------------------ Seo
        SEO::setTitle($prerequisites['brandName'] . ' - ' . "ایجاد تاپیک");
        SEO::setDescription($prerequisites['brandName'] . ' - ' . "ایجاد تاپیک");
        SEO::opengraph()->addProperty('type', 'articles');
        OpenGraph::addImage(env('APP_URL') . '/assets/images/logo.jpg');
        OpenGraph::addProperty('locale', 'fa-ir'); //-------------------------------------------------------
        return view("Website.Article.edit" , compact(
            'prerequisites' ,
            "article"
        ));
    }



    public function update(Request $request, Article $article)
    {
        if (!auth()->check() || $article->user->id != auth()->user()->id)
            return redirect(route("website.home"));

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
            "confirmed" => false
        ]);
        //-----------------------------
        $this->successMessage(['عملیات موفقیت آمیز بود']);
        return redirect()->to($request->input('redirects_to'));
    }

    public function destroy(Article $article)
    {
        if (!auth()->check() || $article->user->id != auth()->user()->id)
            return redirect(route("website.home"));
        $article->delete();
        $this->successMessage(['عملیات موفقیت آمیز بود']);
        return redirect(route("website.home"));

    }
}
