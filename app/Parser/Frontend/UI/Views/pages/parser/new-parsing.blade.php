{{-- frontend::pages/parser/new-parsing --}}

@extends('frontend::layouts.base')

@section('content')

    <div class="page-header">
        <h3 class="page-title"> New Parsing </h3>
    </div>

    <div id="parser-start"></div>

@endsection

@section('vue')
    <script src="{{ asset('js/vue/parser/main.js') }}"></script>
@stop
