@extends('Dashboard.app')

@section('title' , $pageTitle)
@section('search-model' , 'message')

@section('page-content')




    <div class="row">
        <div class="col-md-12">
            <div class="card card-default widget">
                <div class="card-heading">
                    <div class="card-controls">
                        <a href="#" class="widget-minify"><i class="fa fa-chevron-up"></i></a>
                        <a href="#" class="widget-close"><i class="fa fa-times"></i></a>
                    </div>
                    <a href="{{ route('dashboard.message.create') }}" class="btn btn-round btn-default">افزودن</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>نام کاربر</th>
                                <th>شماره سفارش</th>
                                <th>رضایت از محصول</th>
                                <th>کیفیت بسته‌بندی</th>
                                <th>سرعت ارسال</th>
                                <th>متن</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($votes as $vote)
                                <tr>
                                    <td>
                                        {{ $vote->user->fullName }}
                                    </td>
                                    <td>
                                        {{ $vote->order->order_number }}
                                    </td>
                                    <td>
                                        {{ $vote->rate_a }}
                                    </td>
                                    <td>
                                        {{ $vote->rate_b }}
                                    </td>
                                    <td>
                                        {{ $vote->rate_c }}
                                    </td>
                                    <td>
                                        {{ $vote->body }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{ $votes->links() }}


                </div>


            </div>
        </div><!-- /.col-md-12 -->
    </div>

@endsection

