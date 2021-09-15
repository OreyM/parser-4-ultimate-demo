@extends('frontend::layouts.base')

@section('content')
    <div class="page-header">
        <h3 class="page-title"> Parsed data </h3>
    </div>

    <div id="parsed-data"></div>
@endsection

@section('vue')
    <script src="{{ asset('js/vue/parsed-data/main.js') }}"></script>
@stop
