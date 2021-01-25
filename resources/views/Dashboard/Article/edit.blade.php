@extends('Dashboard.app')

@section('title' , $pageTitle)
@section('search-model' , 'article')


@section('page-content')



    <div class="row">
        <div class="col-md-12">
            <div class="card card-default widget">
                <div class="card-heading">
                    <div class="card-controls">
                        <a href="#" class="widget-minify"><i class="fa fa-chevron-up"></i></a>
                        <a href="#" class="widget-close"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="card-body">

                    <form method="post" action="{{ route('dashboard.article.update' , ["slug" => $article->slug]) }}">
                        <input type="hidden" value="{!! URL::previous() !!}" name="redirects_to">
                        {{ method_field("PATCH") }}
                        @csrf

                        <div class="row">
                            <div class="col">
                                <p>
                                    نوشته شده توسط:
                                    {{ $article->user->name }}
                                </p>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="title" class=" col-form-label">تیتر</label>
                                    <input class="form-control" type="text" value="{{ old('title' , $article->title) }}"
                                           name="title" id="title" placeholder="تیتر">
                                </div>
                            </div>

                            
                            <div class="col-md-2">
                                <div class="row pt-5">
                                    <div class="col">
                                        <div class="form-check form-check-inline">
                                            <input name="confirmed" class="form-check-input" {{ $article->confirmed == true ? "checked" : "" }} type="radio" id="c1" value="1">
                                            <label class="form-check-label" for="c1">تایید</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check form-check-inline">
                                            <input name="confirmed" class="form-check-input" {{ $article->confirmed == false ? "checked" : "" }} type="radio" id="c2" value="0">
                                            <label class="form-check-label" for="c2">عدم تایید</label>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="col-md-2">
                                <div class="row pt-5">
                                    <div class="col">
                                        <div class="form-check form-check-inline">
                                            <input name="closed" class="form-check-input" {{ $article->closed == true ? "checked" : "" }} type="radio" id="q1" value="1">
                                            <label class="form-check-label" for="q1">بسته</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check form-check-inline">
                                            <input name="closed" class="form-check-input" {{ $article->closed == false ? "checked" : "" }} type="radio" id="q2" value="0">
                                            <label class="form-check-label" for="q2">عدم بسته</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>



                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="body" class=" col-form-label">متن</label>
                                    <textarea class="form-control  " name="body"
                                              id="body">{{ old('body', $article->body) }}</textarea>
                                </div>
                            </div>
                        </div>




                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-round btn-default">ویرایش</button>
                                </div>
                            </div>
                        </div>

                    </form>


                </div>
            </div>


        </div>
    </div>


@endsection
