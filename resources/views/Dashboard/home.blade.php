@extends('Dashboard.app')

@section('title' , 'صفحه اصلی')


@section('page-content')






@endsection


@section('js')

    <script src="{{ URL::asset('dashboard_assets/node_modules/chartjs/js/chart.bundle.js') }}"></script>
    <script src="{{ URL::asset('dashboard_assets/node_modules/chartjs/js/utils.js') }}"></script>

@endsection