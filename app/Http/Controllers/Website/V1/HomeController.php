<?php

namespace App\Http\Controllers\Website\V1;

use App\Article;
use Illuminate\Http\Request;
use Validator;
use SEO;
use OpenGraph;

class HomeController extends WebsiteController
{



    public function home()
    {
        $prerequisites = parent::prerequisites();

        $articles = Article::published()->latest()->paginate(10);
        //------------------------------------------------------ Seo
        SEO::setTitle($prerequisites['brandName'] . ' - ' . $prerequisites['siteMainTitle']);
        SEO::setDescription($prerequisites['siteMainDescription']);
        SEO::opengraph()->addProperty('type', 'articles');
        OpenGraph::addImage(env('APP_URL') . '/assets/images/logo.jpg');
        OpenGraph::addProperty('locale', 'fa-ir');
        //-------------------------------------------------------
        return view("Website.home" , compact(
            'prerequisites' ,
            'articles'
        ));
    }







}
