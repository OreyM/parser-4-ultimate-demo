<li class="nav-item dropdown d-none d-lg-block">

    <a class="nav-link btn btn-success create-new-button" id="createbuttonDropdown" data-toggle="dropdown" aria-expanded="false" href="#">+ Create New...</a>

    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="createbuttonDropdown">
        <div class="dropdown-divider"></div>
        <a class="dropdown-item preview-item" href="{{ route('playone-club.news.create') }}">
            <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                    <i class="mdi mdi-file-outline text-primary"></i>
                </div>
            </div>
            <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1">Nes</p>
            </div>
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item preview-item" href="{{ route('playone-club.instructions.create') }}">
            <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                    <i class="mdi mdi-web text-info"></i>
                </div>
            </div>
            <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1">Instruction</p>
            </div>
        </a>
    </div>
</li>
