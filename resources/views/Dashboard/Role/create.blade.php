@extends('Dashboard.app')

@section('title' , $pageTitle)
@section('search-model' , 'role')

@section('css')

    <link href="{{ URL::asset('dashboard_assets/node_modules/select2/css/select2.min.css') }}" rel="stylesheet">
    <script src="{{ URL::asset('dashboard_assets/node_modules/select2/js/select2.min.js') }}"
            type="text/javascript"></script>
@endsection


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

                    <form method="post" action="{{ route('dashboard.role.store') }}">
                        <input type="hidden" value="{!! URL::previous() !!}" name="redirects_to">

                        <div class="row">


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title" class=" col-form-label">تیتر</label>
                                    <input class="form-control" type="text" value="{{ old('title') }}" name="title"
                                           id="title" placeholder="تیتر">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="label" class=" col-form-label">لیبل</label>
                                    <input class="form-control" type="text" value="{{ old('label') }}" name="label"
                                           id="label" placeholder="لیبل">
                                </div>
                            </div>


                        </div>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="permissions" class=" col-form-label">دسترسی ها</label>
                                    <select class="form-control select2-cats" name="permissions[]" id="permissions"
                                            multiple="multiple">
                                        @foreach($permissions as $permussion)
                                            <option value="{{ $permussion->id }}" {{ in_array($permussion->id , old( "permissions" , [] ) ) ? "selected" : "" }}>
                                                {{ $permussion->label }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <script type="text/javascript">
                                    $("#permissions").select2({
                                        tags: false,
                                        placeholder: "دسترسی ها ",
                                        dir: "rtl"
                                    });
                                </script>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                @csrf
                                <br>
                                <button type="submit" class="btn btn-round btn-default">افزودن</button>
                            </div>
                        </div>

                    </form>


                </div>
            </div>


        </div><!-- /.col-md-12 -->
    </div>


@endsection
