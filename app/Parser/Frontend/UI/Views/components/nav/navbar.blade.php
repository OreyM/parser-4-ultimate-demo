<nav class="navbar p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
        <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="{{ asset('images/logo-mini.svg') }}" alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">

        @include('frontend::elements.navbar.navbar-toggler')

        @include('frontend::elements.navbar.search')

        <ul class="navbar-nav navbar-nav-right">

            @include('frontend::elements.navbar.creation-button')

            @include('frontend::elements.navbar.comments')

            @include('frontend::elements.navbar.notification')

            @include('frontend::elements.navbar.admin-dropdown')

        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-format-line-spacing"></span>
        </button>
    </div>
</nav>
