@extends("Website.app")

@section('main')

    <section class="mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7">


                    <div class="card mb-5">
                        <div class="card-body">
                            <h5 class="card-title">
                                <div class="row justify-content-between">
                                    <div class="col-auto">
                                        {{ $article->title }}
                                    </div>
                                    <div class="col-auto">
                                        @if(auth()->check() && $article->user->id == auth()->user()->id)
                                            <div>
                                                <a class="btn btn-info" href="{{ route("website.article.edit" , ['article' => $article->slug]) }}">
                                                    ویرایش
                                                </a>

                                            </div>

                                            <form method="post" class="mt-2" action="{{ route("website.article.destroy"  , ['article' => $article->slug] ) }}">
                                                @csrf
                                                @method("DELETE")
                                                <button class="btn btn-danger">
                                                    حذف
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>


                            </h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $article->user->name }}</h6>
                            <p class="card-text">
                                {!! nl2br(e($article->body)) !!}
                            </p>
                        </div>
                    </div>

                    @if($article->closed == false)
                        <div class="card mb-5">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <div class="row justify-content-between">
                                        <div class="col-auto">
                                            افزودن کامنت
                                        </div>
                                    </div>


                                </h5>
                                <div class="card-text">
                                        <form action="{{ route("website.comment.article.store" , ['article' => $article->slug]) }}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="body" class=" col-form-label">متن</label>
                                                        <textarea class="form-control  " name="body" id="body">{{ old('body') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-info">افزودن</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                </div>
                            </div>
                        </div>
                    @endif


                    <h4 class="mb-3">
                        لیست کامنت ها
                    </h4>
                    @foreach($article->comments as $comment)
                        <div class="card mb-5">
                            <div class="card-body">
                                <div class="row justify-content-between">
                                    <div class="col-auto">
                                        <h6 class="card-subtitle mb-2 text-muted">{{ $comment->user->name }}</h6>
                                    </div>
                                    <div class="col">
                                        <div class="row justify-content-end">
                                            <div class="col-auto">
                                                <form method="post" action="{{ route("website.vote.like" , ['comment' => $comment->id]) }}">
                                                    @csrf
                                                    <button class="btn btn-info">
                                                        Like
                                                        (
                                                        {{ $comment->likeCount }}
                                                        )
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="col-auto">

                                                <form method="post" action="{{ route("website.vote.dislike" , ['comment' => $comment->id]) }}">
                                                    @csrf
                                                    <button class="btn btn-info">
                                                        dislike
                                                        (
                                                        {{ $comment->dislikeCount }}
                                                        )
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="card-text">
                                    {!! nl2br(e($comment->body)) !!}
                                </p>

                                @if(auth()->check() && $comment->user->id == auth()->user()->id)

                                    <div class="row justify-content-between border-bottom pb-2">
                                        <div class="col-auto">
                                            <div>
                                                <a   data-body="{!! nl2br(e($comment->body)) !!}" class="btn btn-info cmt-edit" href="{{ route("website.comment.update" , ['comment' => $comment->id]) }}">
                                                    ویرایش
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <form method="post" class="" action="{{ route("website.comment.destroy"  , ['comment' => $comment->id] ) }}">
                                                @csrf
                                                @method("DELETE")
                                                <button class="btn btn-danger">
                                                    حذف
                                                </button>
                                            </form>
                                        </div>
                                    </div>


                                @endif

                                <div class="border-top pt-2">
                                    @foreach($comment->comments as $thisComment)
                                        <div class="card-body border">
                                            <div class="row justify-content-between">
                                                <div class="col-auto">
                                                    <h6 class="card-subtitle mb-2 text-muted">{{ $thisComment->user->name }}</h6>
                                                </div>
                                                <div class="col">
                                                    <div class="row justify-content-end">
                                                        <div class="col-auto">
                                                            <form method="post" action="{{ route("website.vote.like" , ['comment' => $thisComment->id]) }}">
                                                                @csrf
                                                                <button class="btn btn-info">
                                                                    Like
                                                                    (
                                                                    {{ $thisComment->likeCount }}
                                                                    )
                                                                </button>
                                                            </form>
                                                        </div>
                                                        <div class="col-auto">

                                                            <form method="post" action="{{ route("website.vote.dislike" , ['comment' => $thisComment->id]) }}">
                                                                @csrf
                                                                <button class="btn btn-info">
                                                                    dislike
                                                                    (
                                                                    {{ $thisComment->dislikeCount }}
                                                                    )
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <p class="card-text">
                                                {!! nl2br(e($thisComment->body)) !!}
                                            </p>
                                            @if(auth()->check() && $thisComment->user->id == auth()->user()->id)
                                                <div class="row justify-content-between border-bottom pb-2">
                                                    <div class="col-auto">
                                                        <div>
                                                            <a data-body="{!! nl2br(e($thisComment->body)) !!}" class="btn btn-info cmt-edit" href="{{ route("website.comment.update" , ['comment' => $thisComment->id]) }}">
                                                                ویرایش
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <form method="post" class="" action="{{ route("website.comment.destroy"  , ['comment' => $thisComment->id] ) }}">
                                                            @csrf
                                                            @method("DELETE")
                                                            <button class="btn btn-danger">
                                                                حذف
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach

                                    <form class="border-top pt-2" method="post" action="{{ route("website.comment.reply.store" , ['comment'=>$comment->id ]) }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="body2" class=" col-form-label">جواب</label>
                                            <textarea class="form-control  " name="body2" id="body2">{{ old('body2') }}</textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-info">ارسال</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </section>


@endsection

@section("modal")
    <div class="modal fade" id="cm-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ویرایش</h5>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="cmt-update">
                        @csrf
                        @method("PATCH")
                        <div class="form-group">
                            <textarea name="body" id="body-cmt" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success">
                                ویرایش
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("js")
    <script>
        $(".cmt-edit").click(function (e) {
            e.preventDefault()
            $("#cmt-update").attr("action" , $(this).attr("href"))
            $("#body-cmt").val($(this).attr("data-body"))
            $("#cm-edit").modal("show")
        })
    </script>
@endsection


