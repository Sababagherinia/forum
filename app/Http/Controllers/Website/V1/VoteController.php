<?php

namespace App\Http\Controllers\Website\V1;

use App\Comment;
use App\Vote;
use Illuminate\Http\Request;

class VoteController extends WebsiteController
{
    public function like(Comment $comment)
    {
        Vote::where("user_id" , auth()->user()->id)->where("comment_id" , $comment->id)->delete();
        Vote::create([
           "like" => true ,
           "comment_id" => $comment->id ,
           "user_id" =>  auth()->user()->id
        ]);

        return redirect()->back();
    }
    public function dislike(Comment $comment)
    {

        Vote::where("user_id" , auth()->user()->id)->where("comment_id" , $comment->id)->delete();
        Vote::create([
            "dislike" => true ,
            "comment_id" => $comment->id ,
            "user_id" =>  auth()->user()->id
        ]);
        return redirect()->back();
    }
}
