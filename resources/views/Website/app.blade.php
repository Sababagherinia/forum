<!doctype html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    {!! SEO::generate(true) !!}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#bbc948">
    <link rel="stylesheet" href="{{ URL::asset('/assets/css/custom.css') }}?v=16">
    <link rel="icon" href="{{ URL::asset('/favicon.ico') }}">
    <script src="{{ URL::asset('/assets/js/jquery.min.js') }}?v=1"></script>
    @yield('css')

</head>
<body class="bg-image">

@include("Website.div.header")

<main>
    @yield('main')
</main>
@include("Website.div.footer")

@yield('modal')

@include("Website.div.modals")

<script src="{{ URL::asset('/assets/js/popper.min.js') }}?v=1"></script>
<script src="{{ URL::asset('/assets/js/bootstrap.min.js') }}?v=1"></script>
<script src="{{ URL::asset('/assets/js/swiper-bundle.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/script.js') }}?v=2"></script>
<script src="{{ URL::asset('/assets/node_modules/sweetalert/js/sweetalert.min.js') }}"></script>
@include('sweet::alert')
<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@yield('js')
</body>
</html>