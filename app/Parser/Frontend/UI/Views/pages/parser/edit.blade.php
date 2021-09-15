@extends('frontend::layouts.base')

@php /**@var \App\Parser\Core\Models\Games $game */ @endphp

@section('content')
    <div class="page-header">
        <h3 class="page-title"> Edit Game Data </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="https://www.microsoft.com/es-ar/p/xbox/{{ $game->store_id }}" target="_blank">
                        {{ $game->name }}
                    </a>
                </li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Store ID: <strong>{{ $game->store_id }}</strong></h4>
                    <p>Category: <strong>{{ $game->category }}</strong></p>
                    <p>Publisher: <strong>{{ $game->publisher }}</strong></p>

                    <form action="{{ route('parser.parsed-data.update', $game->id) }}" method="post" class="forms-sample">
                        @method('PATCH')
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="game-name">Game name</label>
                            <input
                                type="text"
                                class="form-control"
                                id="game-name"
                                name="name"
                                value="{{ old('name') ?? $game->name }}"
                                placeholder="Game Name">
                        </div>

                        <div class="form-group">
                            <label for="game-slug">Game slug</label>
                            <input
                                type="text"
                                class="form-control"
                                id="game-slug"
                                name="slug"
                                value="{{ old('slug') ?? $game->slug }}"
                                placeholder="Game Slug">
                        </div>

                        <div class="form-group">
                            <label for="game-description">Game Description</label>
                            <textarea
                                type="text"
                                class="ckeditor form-control"
                                id="game-description"
                                name="description"
                                placeholder="Description"> {{ old('description') ?? $game->description }}</textarea>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-12">
                                <h5>Image Prewie</h5>
                                <img src="{{ asset($game->img_prewie) }}" alt="..." class="img-thumbnail col-md-2">
                                <div class="form-group mt-4">
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="img-prewie"
                                        name="img_prewie"
                                        value="{{ old('img_prewie') ?? $game->img_prewie }}"
                                        placeholder="Image prewie path">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h5>Image Art</h5>
                                <img src="{{ asset($game->img_art) }}" alt="..." class="img-thumbnail col-md-4">
                                <div class="form-group mt-4">
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="img-art"
                                        name="img_art"
                                        value="{{ old('img_art') ?? $game->img_art }}"
                                        placeholder="Image art path">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h5>Image Art with Title</h5>
                                <img src="{{ asset($game->img_with_title) }}" alt="..." class="img-thumbnail col-md-4">
                                <div class="form-group mt-4">
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="img-with-title"
                                        name="img_with_title"
                                        value="{{ old('img_with_title') ?? $game->img_with_title }}"
                                        placeholder="Image with title path">
                                </div>
                            </div>
                        </div>

                        <p>Release Date: <strong>{{ $game->release_date }}</strong></p>
                        <p>Min User Age: <strong>{{ $game->min_user_age }}</strong></p>
                        <p>Rating: <strong>{{ $game->rating }}</strong></p>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="table">
                                    <h4>Game Price</h4>
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Price type</th>
                                            <th>Value</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Discount</td>
                                            <td>
                                                {!! $game->discount ?
                                                    '<label class="badge badge-success">Yes</label>' :
                                                    '<label class="badge badge-danger">No</label>' !!}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Selling Price</td>
                                            <td>{{ $game->selling_price }}</td>
                                        </tr>
                                        <tr>
                                            <td>Old Price</td>
                                            <td>{{ $game->old_price }}</td>
                                        </tr>
                                        <tr>
                                            <td>Difference</td>
                                            <td>{{ $game->difference }}</td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="table">
                                    <h4>Game Params</h4>
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Param</th>
                                            <th>Value</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Xbox360 Support</td>
                                            <td>
                                                {!! $game->x360_support ?
                                                    '<label class="badge badge-success">Yes</label>' :
                                                    '<label class="badge badge-danger">No</label>' !!}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Xbox Series S|X Support</td>
                                            <td>
                                                {!! $game->xseries_support ?
                                                    '<label class="badge badge-success">Yes</label>' :
                                                    '<label class="badge badge-danger">No</label>' !!}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Ru Local</td>
                                            <td>
                                                {!! $game->ru_local ?
                                                    '<label class="badge badge-success">Yes</label>' :
                                                    '<label class="badge badge-danger">No</label>' !!}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>All Local</td>
                                            <td>
                                                @foreach(json_decode($game->all_local) as $local)
                                                    <strong>{{ $local }}</strong>
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>
                                                @if($game->is_gold) <label class="badge badge-warning">G</label> @endif
                                                @if($game->is_gold_free) <label class="badge badge-warning">GFree</label> @endif
                                                @if($game->is_game_pass) <label class="badge badge-info">GP</label> @endif
                                                @if($game->is_ea) <label class="badge badge-primary">EA</label> @endif
                                                @if($game->is_free) <label class="badge badge-danger">Free</label> @endif
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('parser.parsed-data') }}" class="btn btn-dark">Back</a>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('other-libs-scripts')
    <script src="{{ asset('vendors/ckeditor/ckeditor.js') }}">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
@stop

http://127.0.0.1:8000/storage/games/images/vedmak-3-dikaya-oxota-izdanie-igra-goda/vedmak-3-dikaya-oxota-izdanie-igra-goda-art.jpeg
http://127.0.0.1:8000/storage/games/images/chivalry-2/chivalry-2-art.jpeg
