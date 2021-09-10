<li class="nav-item dropdown">
    <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
        <div class="navbar-profile">
            <img class="img-xs rounded-circle" src="{{ asset('images/faces/admin.jpeg') }}" alt="">
            <p class="mb-0 d-none d-sm-block navbar-profile-name">Uncle Orey</p>
            <i class="mdi mdi-menu-down d-none d-sm-block"></i>
        </div>
    </a>
    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
        <h6 class="p-3 mb-0">Profile</h6>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                    <i class="mdi mdi-logout text-danger"></i>
                </div>
            </div>
            <div class="preview-item-content">
                <p class="preview-subject mb-1">Log out</p>
            </div>
        </a>
        <div class="dropdown-divider"></div>
        <p class="p-3 mb-0 text-center">Advanced settings</p>
    </div>
</li>
