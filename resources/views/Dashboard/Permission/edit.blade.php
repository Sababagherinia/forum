@extends('Dashboard.app')

@section('title' , $pageTitle)
@section('search-model' , 'permission')


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

                    <form method="post" action="{{ route('dashboard.permission.update' , ["id" => $permission->id]) }}">
                        <input type="hidden" value="{!! URL::previous() !!}" name="redirects_to">
                        {{ method_field("PATCH") }}

                        <div class="row">


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title" class=" col-form-label">تیتر</label>
                                    <input class="form-control" type="text"
                                           value="{{ old('title' , $permission->title) }}" name="title" id="title"
                                           placeholder="تیتر">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="label" class=" col-form-label">لیبل</label>
                                    <input class="form-control" type="text"
                                           value="{{ old('label', $permission->label) }}" name="label" id="label"
                                           placeholder="لیبل">
                                </div>
                            </div>


                        </div>


                        <div class="row">
                            <div class="col-xs-12">
                                @csrf
                                <br>
                                <button type="submit" class="btn btn-round btn-default">ویرایش</button>
                            </div>
                        </div>

                    </form>


                </div>
            </div>


        </div><!-- /.col-md-12 -->
    </div>


@endsection
