<?php

namespace App\Http\Controllers\Dashboard\V1;

use App\Comment;
use Gate;
use Illuminate\Http\Request;
use Validator;

class CommentController extends DashboardController
{
    private function getPageTitle()
    {
        return "کامنت";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('comment-update') )
            $comments = comment::latest()->paginate(10);
        else
            abort(403);

        $pageTitle = $this->getPageTitle() . " - لیست";
        return view('Dashboard.Comment.index', compact('pageTitle', 'comments'));
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
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param  \App\Comment $comment
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Comment $comment)
    {
        if (Gate::denies('comment-update'))
            abort(403);
        //-----------------------------
        $comment->delete();
        //-----------------------------
        $this->successMessage(['عملیات موفیت آمیز بود']);
        return redirect()->to($request->input('redirects_to'));
    }
}
