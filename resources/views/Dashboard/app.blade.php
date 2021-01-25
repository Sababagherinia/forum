<!DOCTYPE html>
<html lang="en" class="no-js">

<meta http-equiv="content-type" content="text/html;charset=utf-8"/><!-- /Added by HTTrack -->
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ URL::asset('/dashboard_assets/images/icons/favicon.ico') }}">

    <title>ادمین - @yield('title')</title>


    <!-- NPM Packages -->

    <script src="{{ URL::asset('dashboard_assets/node_modules/jquery/dist/jquery.min.js') }}"></script>

    <script src="{{ URL::asset('dashboard_assets/node_modules/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard_assets/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>


    <link href="{{ URL::asset('dashboard_assets/node_modules/bootstrap/dist/css/bootstrap.min.css') }}"
          rel="stylesheet">
    <link href="{{ URL::asset('dashboard_assets/node_modules/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('dashboard_assets/node_modules/font-awesome/css/font-awesome.min.css') }}"
          rel="stylesheet">
    <link href="{{ URL::asset('dashboard_assets/node_modules/summernote/dist/summernote.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('dashboard_assets/node_modules/fullcalendar/dist/fullcalendar.min.css') }}"
          rel="stylesheet">
    <link href="{{ URL::asset('dashboard_assets/node_modules/morris.js/morris.css') }}" rel="stylesheet">

    <!-- Cropper -->
    <link href="{{ URL::asset('dashboard_assets/node_modules/cropper/css/cropper.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('dashboard_assets/node_modules/cropper/css/main.css') }}" rel="stylesheet">

    <!-- Vendor -->
    <link href="{{ URL::asset('dashboard_assets/assets/vendor/md-snackbars/md-snackbars.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('dashboard_assets/assets/vendor/zabuto/zabuto_calendar.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('dashboard_assets/assets/vendor/datatables/dataTables.bootstrap4.min.css') }}"
          rel="stylesheet">

    <!-- Theme -->
    <link href="{{ URL::asset('dashboard_assets/assets/css/spark.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('dashboard_assets/assets/css/font.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('dashboard_assets/assets/css/custom.css') }}?v=2" rel="stylesheet">


    <!-- jquery-ui -->
    <link href="{{ URL::asset('dashboard_assets/assets/css/jquery-ui.css') }}" rel="stylesheet">
    <script src="{{ URL::asset('dashboard_assets/assets/js/jquery-ui.js') }}"></script>


    <!-- time picker -->
    <link href="{{ URL::asset('dashboard_assets/node_modules/persiandatetimepicker/css/jquery.md.bootstrap.datetimepicker.style.css') }}"
          rel="stylesheet">
    <script src="{{ URL::asset('dashboard_assets/node_modules/persiandatetimepicker/js/jquery.md.bootstrap.datetimepicker.js') }}"></script>

    @yield('css')
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-messaging.js"></script>

</head>
<body class=""> <!-- right-to-left -->

<div class="splash active">
    <div class="icon"></div>
</div>

<div class="wrapper">
    @include('Dashboard.div.navbar')

    <div class="content">
        <header class="page-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-8 page-title-wrapper">
                        <?php
                        $temp = explode("-", $pageTitle);
                        $headPageTitle = "";
                        $headPageSubtitle = "";
                        if (count($temp) > 0)
                            $headPageTitle = $temp[0];
                        if (count($temp) > 1)
                            $headPageSubtitle = $temp[1];
                        ?>
                        <h1 class="page-title">{{ $headPageTitle }}</h1>
                        <h2 class="page-subtitle">{{  $headPageSubtitle }}</h2>
                    </div>

                </div>
            </div>
        </header>
        <div class="page-body">
            <div class="container-fluid">

                @include('Dashboard.div.page_sidebar')

                <div class="page-content">

                    @yield('page-content')



                    @include('Dashboard.div.footer')
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /#wrapper -->
@yield("modal")
<!-- NPM Packages -->

<script src="{{ URL::asset('dashboard_assets/node_modules/flot/jquery.flot.js') }}"></script>
<script src="{{ URL::asset('dashboard_assets/node_modules/flot/jquery.flot.resize.js') }}"></script>
<script src="{{ URL::asset('dashboard_assets/node_modules/flot/jquery.flot.crosshair.js') }}"></script>
<script src="{{ URL::asset('dashboard_assets/node_modules/flot/jquery.flot.stack.js') }}"></script>
<script src="{{ URL::asset('dashboard_assets/node_modules/flot/jquery.flot.pie.js') }}"></script>
<script src="{{ URL::asset('dashboard_assets/node_modules/bxslider/dist/jquery.bxslider.min.js') }}"></script>
<script src="{{ URL::asset('dashboard_assets/node_modules/jvectormap/jquery-jvectormap.min.js') }}"></script>
<script src="{{ URL::asset('dashboard_assets/node_modules/moment/min/moment.min.js') }}"></script>
<script src="{{ URL::asset('dashboard_assets/node_modules/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>
<script src="{{ URL::asset('dashboard_assets/node_modules/summernote/dist/summernote.min.js') }}"></script>
<script src="{{ URL::asset('dashboard_assets/node_modules/fullcalendar/dist/fullcalendar.min.js') }}"></script>
<script src="{{ URL::asset('dashboard_assets/node_modules/morris.js/morris.min.js') }}"></script>
<script src="{{ URL::asset('dashboard_assets/node_modules/raphael/raphael.min.js') }}"></script>

<!-- Vendor -->
<script src="{{ URL::asset('dashboard_assets/assets/vendor/flot/jquery.flot.tooltip.min.js') }}"></script>
<script src="{{ URL::asset('dashboard_assets/assets/vendor/mark/jquery.mark.min.js') }}"></script>
<script src="{{ URL::asset('dashboard_assets/assets/vendor/md-snackbars/md-snackbars.min.js') }}"></script>
<script src="{{ URL::asset('dashboard_assets/assets/vendor/zabuto/zabuto_calendar.min.js') }}"></script>
<script src="{{ URL::asset('dashboard_assets/assets/vendor/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>
<script src="{{ URL::asset('dashboard_assets/assets/vendor/jvectormap/jquery-jvectormap-africa-mill.js') }}"></script>
<script src="{{ URL::asset('dashboard_assets/assets/vendor/jvectormap/jquery-jvectormap-asia-mill.js') }}"></script>
<script src="{{ URL::asset('dashboard_assets/assets/vendor/jvectormap/jquery-jvectormap-cn-mill.js') }}"></script>
<script src="{{ URL::asset('dashboard_assets/assets/vendor/jvectormap/jquery-jvectormap-europe-mill.js') }}"></script>
<script src="{{ URL::asset('dashboard_assets/assets/vendor/jvectormap/jquery-jvectormap-in-mill.js') }}"></script>
<script src="{{ URL::asset('dashboard_assets/assets/vendor/jvectormap/jquery-jvectormap-north_america-mill.js') }}"></script>
<script src="{{ URL::asset('dashboard_assets/assets/vendor/jvectormap/jquery-jvectormap-oceania-mill.js') }}"></script>
<script src="{{ URL::asset('dashboard_assets/assets/vendor/jvectormap/jquery-jvectormap-south_america-mill.js') }}"></script>
<script src="{{ URL::asset('dashboard_assets/assets/vendor/jvectormap/jquery-jvectormap-uk_countries-mill.js') }}"></script>
<script src="{{ URL::asset('dashboard_assets/assets/vendor/jvectormap/jquery-jvectormap-us-aea.js') }}"></script>
<script src="{{ URL::asset('dashboard_assets/node_modules/gmaps/gmaps.min.js') }}"></script>


<!-- Theme -->
<script src="{{ URL::asset('dashboard_assets/assets/js/spark.js') }}"></script>
{{--<script src="{{ URL::asset('dashboard_assets/assets/js/pages/panel.js') }}"></script>--}}

<script>
    var ckeditor_options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
        language: 'fa' ,
        extraPlugins: 'wpmore,video,div,justify,font,bidi,colorbutton,colordialog' ,
        allowedContent : true ,
        font_names  : "IRANSans" ,
        toolbarGroups : [
            // { name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
            { name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
            { name: 'links' },
            { name: 'insert' },
            { name: 'forms' },
            { name: 'tools' },
            { name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
            { name: 'others' },
            '/',
            { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
            { name: 'colors' } ,
            { name: 'styles' },
            '/',
            { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
            '/',
            '/',

            '/',
            { className : 'contents'} ,
        ],
        format_tags : 'p;h2;h3;h4;h5;h6;pre'


    };


    $(document).ready(function () {
        Spark.init();
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $(document).ready(function () {
        var bh = $("body").height();
        var ch = $(".page-content").height();
        $("body").height(bh + ch);

    });

    $(window).resize(function () {
        var bh = $("body").height();
        var ch = $(".page-content").height();
        $("body").height(bh + ch);
    });


    $('[data-toggle="tooltip"]').tooltip({
        container: 'body'
    });

</script>


@yield('js')

<script src="{{ URL::asset('dashboard_assets/node_modules/cropper/js/cropper.js') }}"></script>
<script src="{{ URL::asset('dashboard_assets/node_modules/cropper/js/main.js') }}"></script>
<script src="{{ URL::asset('dashboard_assets/node_modules/sweetalert/js/sweetalert.min.js') }}"></script>
@include('sweet::alert')



<script>

</script>
</body>
</html>
