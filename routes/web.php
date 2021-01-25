<?php


//dashboard
Route::name('dashboard.')
    ->middleware(["auth", "dashboard"])
    ->prefix('dashboard')
    ->namespace('Dashboard\V1')
    ->group(function () {


        $this->get('/', 'DashboardController@home')->name('home');
        $this->resource('/article', 'ArticleController')->middleware(['can:article']);
        $this->resource('/comment', 'CommentController')->middleware(['can:comment-update']);
        $this->resource('/access', 'AccessController')->middleware(['can:access']);
        $this->resource('/role', 'RoleController')->middleware('super_admin');
        $this->patch('/permission/reset', 'PermissionController@resetPermissions')->name('permission.reset');
        $this->resource('/permission', 'PermissionController')->middleware('super_admin');
        $this->resource('/user', 'UserController')->middleware(['can:user-update']);







    });


Route::name('website.')
    ->namespace('Website\V1')
    ->group(function(){

        $this->get('/', 'HomeController@home')->name('home');
        $this->get('/article' , 'ArticleController@index')->name("article.index");
        $this->get('/article/create' , 'ArticleController@create')->name("article.create")->middleware("auth");
        $this->post('/article/store' , 'ArticleController@store')->name("article.store")->middleware("auth");
        $this->get('/article/{article}' , 'ArticleController@show')->name("article.show");
        $this->get('/article/edit/{article}' , 'ArticleController@edit')->name("article.edit")->middleware("auth");
        $this->delete('/article/destroy/{article}' , 'ArticleController@destroy')->name("article.destroy")->middleware("auth");
        $this->patch('/article/update/{article}' , 'ArticleController@update')->name("article.update")->middleware("auth");


        $this->post('/comment/{article}' , 'CommentController@articleCommentStore')->name("comment.article.store")->middleware("auth");
        $this->post('/comment/reply/{comment}' , 'CommentController@commentReply')->name("comment.reply.store")->middleware("auth");
        $this->delete('/comment/destroy/{comment}' , 'CommentController@destroy')->name("comment.destroy")->middleware("auth");
        $this->patch('/comment/update/{comment}' , 'CommentController@update')->name("comment.update")->middleware("auth");



        $this->post("/vote/like/{comment}" , 'VoteController@like' )->name("vote.like")->middleware("auth");
        $this->post("/vote/dislike/{comment}" , 'VoteController@dislike' )->name("vote.dislike")->middleware("auth");




    });




// Auth
Route::middleware(["guest"])
    ->group(function () {

        $this->get('/login', 'AuthController@loginView')->name('login');
        $this->post('/login', 'AuthController@loginSubmit')->name('login');
        $this->get('/register', 'AuthController@registerView')->name('register');
        $this->post('/register', 'AuthController@registerSubmit')->name('register');


    });



Route::get('/logout', 'AuthController@logout')->name('logout');
