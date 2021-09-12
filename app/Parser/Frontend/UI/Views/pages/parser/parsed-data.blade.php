@extends('frontend::layouts.base')

@section('content')
    <div class="page-header">
        <h3 class="page-title"> Parsed data </h3>
    </div>

    <div id="parsed-data"></div>

{{--    <div class="row">--}}
{{--        <div class="col-lg-12 grid-margin stretch-card">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    <h4 class="card-title">Basic Table</h4>--}}
{{--                    <p class="card-description"> Add class <code>.table</code>--}}
{{--                    </p>--}}
{{--                    <div class="table-responsive">--}}
{{--                        <table class="table">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th>Game</th>--}}
{{--                                <th>Selling Price</th>--}}
{{--                                <th>Discount</th>--}}
{{--                                <th>Difference</th>--}}
{{--                                <th>Status</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            @php /**@var \App\Parser\Core\Models\Games $game */ @endphp--}}
{{--                            @foreach($games as $game)--}}
{{--                            <tr>--}}
{{--                                <td>{{ $game->name }}</td>--}}
{{--                                <td>{{ $game->selling_price }}</td>--}}
{{--                                <td>--}}
{{--                                    @if($game->discount)--}}
{{--                                        <div class="icon icon-box-success ">--}}
{{--                                            <span class="mdi mdi-check-circle-outline icon-item"></span>--}}
{{--                                        </div>--}}
{{--                                    @else--}}
{{--                                        <div class="icon icon-box-danger">--}}
{{--                                            <span class="mdi mdi-close-circle-outline icon-item"></span>--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
{{--                                </td>--}}
{{--                                <td>{{ $game->difference }}</td>--}}
{{--                                <td><label class="badge badge-danger">View</label></td>--}}
{{--                            </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="card-footer">--}}
{{--                    {{ $games->links() }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection

@section('vue')
    <script src="{{ asset('js/vue/parsed-data/main.js') }}"></script>
@stop
