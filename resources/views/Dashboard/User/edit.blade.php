@extends('Dashboard.app')

@section('title' , $pageTitle)
@section('search-model' , 'user')

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

                    <form method="post" action="{{ route('dashboard.user.update' , ["slug" => $user->slug]) }}">
                        {{ method_field("PATCH") }}

                        <input type="hidden" value="{!! URL::previous() !!}" name="redirects_to">



                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="username" class=" col-form-label">نام کاربری</label>
                                    <input class="form-control" type="text" value="{{ old('username' , $user->username) }}"
                                           name="username" id="username" placeholder="نام کاربری">
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="name" class=" col-form-label">نام </label>
                                    <input class="form-control" type="text" value="{{ old('name' , $user->name ) }}" name="name"
                                           id="name" placeholder="نام ">
                                </div>
                            </div>




                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="password" class=" col-form-label">پسورد جدید</label>
                                    <input class="form-control" type="text" value="" name="password" id="password"
                                           placeholder=" جدید">
                                </div>
                            </div>



                        </div>



                        <div class="row">

                            @if(auth()->user()->isSuperAdmin())
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="type" class=" col-form-label">نوع</label>
                                        <select name="type" id="type" class="form-control">
                                            @foreach(App\User::getUserType() as $key => $value)
                                                <option value="{{ $key }}" {{ $key == old("type" , $user->type) ? "selected" : "" }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2" style="padding-top: 35px;">
                                    <div class="form-group">
                                        <label for="blocked" class=" col-form-label">بلاک</label>
                                        <input type="checkbox" value="1" name="blocked" id="blocked" {{ $user->blocked ? "checked" : ""}}>
                                    </div>
                                </div>
                            @endif
                        </div>

                        @if(auth()->user()->isSuperAdmin())
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="roles" class=" col-form-label">نقش ها</label>
                                        <select class="form-control select2-cats" name="roles[]" id="roles"
                                                multiple="multiple">
                                            @foreach(App\Role::latest()->get() as $role)
                                                <option value="{{ $role->id }}" {{ in_array($role->id , old( "roles" , $user->roles->pluck('id')->toArray()) ) ? "selected" : "" }} >
                                                    {{ $role->label }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <script type="text/javascript">
                                        $("#roles").select2({
                                            tags: false,
                                            placeholder: "نقش ها ",
                                            dir: "rtl"
                                        });
                                    </script>
                                </div>

                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-2">
                                @include('Dashboard.div.footer')
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

@section('js')
    @include('Dashboard.div.navbar')
@endsection
