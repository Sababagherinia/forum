@extends('Dashboard.app')

@section('title' , $pageTitle)
@section('search-model' , 'access')

@section('page-content')




    <div class="row">
        <div class="col-md-12">
            <div class="card card-default widget">
                <div class="card-heading">
                    <div class="card-controls">
                        <a href="#" class="widget-minify"><i class="fa fa-chevron-up"></i></a>
                        <a href="#" class="widget-close"><i class="fa fa-times"></i></a>
                    </div>
                    <a href="{{ route('dashboard.access.create') }}" class="btn btn-round btn-default">افزودن</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>کاربر مربوطه</th>
                                <th>ایجاد شده در</th>
                                <th>انقضا</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($accesses as $access)
                                <tr>
                                    <td>
                                        @if(Gate::allows('access-update') || Gate::allows('access-update-all'))
                                           {{-- <a
                                                    href="{{ route('dashboard.access.edit' , ['slug' => $access->slug ]) }}"
                                                    style="color:#203A45;"><i class="fa fa-edit"></i></a>--}}
                                        @endif
                                        @if(Gate::allows('access-destroy') || Gate::allows('access-destroy-all'))
                                            <a href="{{ route('dashboard.access.destroy' , ['slug' => $access->slug ]) }}"
                                               class="remove" style="margin-right: 15px;color: red;"
                                               data-title="{{ $access->title }}"><i class="fa fa-remove"></i></a>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $access->user->fullName }}
                                    </td>
                                    <td>
                                        {{ $access->createdDate }}
                                    </td>
                                    <td>
                                        {{ $access->expiredDate }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{ $accesses->links() }}


                </div>


            </div>
        </div><!-- /.col-md-12 -->
    </div>

@endsection


@section("modal")


    <script type="text/javascript">
        $(document).on("click", ".remove", function (e) {
            e.preventDefault();
            $("#remove").modal("show");
            $("#remove-title").html($(this).attr("data-title"));
            $("#remove-form").attr("action", $(this).attr("href"));
        });
    </script>
    <!-- delete Modal -->
    <div id="remove" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">حذف</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>از حذف پرداخت زیر اطمینان دارید؟</p>
                    <hr>
                    <p id="remove-title"></p>
                    <hr>
                    <form method="post" action="" id="remove-form">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="hidden" value="{!! URL::current() !!}" name="redirects_to">
                        <button type="submit" class="btn btn-round btn-danger">بله</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">انصراف</button>
                </div>
            </div>

        </div>
    </div>



@endsection