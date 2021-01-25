<?php

namespace App\Http\Controllers\Website\V1;

use App\Article;
use App\Comment;
use Illuminate\Http\Request;
use Validator;

class CommentController extends WebsiteController
{
    public function commentReply(Request $request  , Comment $comment)
    {
        $validator = Validator::make($request->all(), [
            'body2' => 'required',
        ]);
        if ($validator->fails()) {
            $this->errorMessage($validator);
            return redirect()->back()->withInput();
        }
        $comment->comments()->create([
            "body" => $request->body2 ,
            "user_id" => auth()->user()->id ,
            "confirm" => true
        ]);
        //-----------------------------
        $this->successMessage(['عملیات موفقیت آمیز بود']);
        return redirect()->back() ;
    }

    public function articleCommentStore(Request $request , Article $article)
    {
        $validator = Validator::make($request->all(), [
            'body' => 'required',
        ]);
        if ($validator->fails()) {
            $this->errorMessage($validator);
            return redirect()->back()->withInput();
        }
        //-----------------------------
        $article->comments()->create([
           "body" => $request->body ,
           "user_id" => auth()->user()->id ,
            "confirm" => true
        ]);
        //-----------------------------
        $this->successMessage(['عملیات موفقیت آمیز بود']);
        return redirect()->to(route("website.article.show" , ['article' => $article->slug]));
    }

    public function update(Comment $comment , Request $request)
    {
        if (!auth()->check() || $comment->user->id != auth()->user()->id)
            return redirect(route("website.home"));

        $validator = Validator::make($request->all(), [
            'body' => 'required',
        ]);
        if ($validator->fails()) {
            $this->errorMessage($validator);
            return redirect()->back()->withInput();
        }

        $comment->update([
            "body" => $request->body ,
        ]);

        $this->successMessage(['عملیات موفقیت آمیز بود']);
        return redirect()->back();

    }

    public function destroy(Comment $comment)
    {
        if (!auth()->check() || $comment->user->id != auth()->user()->id)
            return redirect(route("website.home"));
        $comment->delete();
        $this->successMessage(['عملیات موفقیت آمیز بود']);
        return redirect()->back();

    }
}
