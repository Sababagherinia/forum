@extends('Dashboard.app')

@section('title' , $pageTitle)
@section('search-model' , 'access')

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

                    <form method="post" action="{{ route('dashboard.access.update' , ["slug" => $access->slug]) }}">
                        {{ method_field("PATCH") }}
                        <input type="hidden" value="{!! URL::previous() !!}" name="redirects_to">

                        <div class="row">




                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user_id" class=" col-form-label">کاربر</label>
                                    <select class="form-control text-right" style="direction: rtl" name="user_id" id="user_id">
                                        @if(old('user_id' , $access->user_id))
                                            <option value="{{ \App\User::find(old('user_id' , $access->user_id))->id }}" selected>
                                                {{ \App\User::find(old('user_id' , $access->user_id))->fullName }}
                                            </option>
                                        @endif
                                    </select>
                                    <script>

                                        $(document).ready(function () {
                                            $("#user_id").select2({
                                                minimumInputLength: 2,
                                                placeholder: "یک گزینه را انتخاب کنید",
                                                allowClear: true,
                                                dir: "ltr",
                                                ajax: {
                                                    url: "{{ route('dashboard.user.list') }}",
                                                    dataType: 'json',
                                                    type: "GET",
                                                    quietMillis: 50,
                                                    data: function (params) {
                                                        // console.log(params);
                                                        return {
                                                            search: params.term,
                                                            page: params.page || 1
                                                        };
                                                    },
                                                    results: function (data) {
                                                        return {
                                                            results: $.map(data, function (item) {
                                                                console.log(item)
                                                                return {
                                                                    text: item.name,
                                                                    id: item.id
                                                                }
                                                            })
                                                        };
                                                    }
                                                }
                                            });
                                        });
                                    </script>
                                </div>
                            </div>


                            <div class="col-md-6 " >

                                <div class="form-group">
                                    <label for="expired_at" class=" col-form-label">تاریخ انقضا</label>
                                    <input readonly type="text" id="expired_at" name="expired_at" class="form-control" placeholder="تاریخ انقضا"
                                           aria-label="expired_at"
                                           aria-describedby="expired_at">
                                </div>
                            </div>

                            <script>
                                $('#expired_at').MdPersianDateTimePicker({
                                    targetTextSelector: '#expired_at',
                                    toDate: false,
                                    placement: 'top',
                                    selectedDate: new Date('{{ $access->expired_at }}'),
                                    enableTimePicker: true
                                });
                            </script>

                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="body" class=" col-form-label">توضیح</label>
                                    <textarea class="form-control ck" name="body"
                                              id="body">{{ old('body', $access->body) }}</textarea>
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

@section('js')
    @include('Dashboard.div.crop')
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>


    </script>
@endsection