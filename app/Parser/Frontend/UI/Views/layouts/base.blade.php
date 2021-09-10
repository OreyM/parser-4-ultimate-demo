<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Parser 4 ULTIMATE | Dashboard</title>
    <link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/cute-alert/style.css') }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="{{ asset('images/favicon/favicon.ico') }}" />
</head>
<body>
<div class="container-scroller">

    @include('frontend::components.nav.sidebar')

    <div class="container-fluid page-body-wrapper">
        @include('frontend::components.nav.navbar')

        <div class="main-panel">
            <div class="content-wrapper">
                @yield('content')
            </div>
        </div>

    </div>
</div>

@include('frontend::elements.toasts.cute-alert')
@include('frontend::elements.toasts.cute-toast')

<script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('vendors/cute-alert/cute-alert.js') }}"></script>
<script src="{{ asset('js/off-canvas.js') }}"></script>
<script src="{{ asset('js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('js/misc.js') }}"></script>
<script src="{{ asset('js/settings.js') }}"></script>
<script src="{{ asset('js/todolist.js') }}"></script>

@yield('vue')

</body>
</html>
