<li class="nav-item menu-items">
    <a class="nav-link" data-toggle="collapse" href="#{{ $id }}" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="{{ $icon }}"></i>
              </span>
        <span class="menu-title">{{ $title }}</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="{{ $id }}">
        <ul class="nav flex-column sub-menu">
            @foreach($dropdownItems as $item)
                <li class="nav-item"> <a class="nav-link" href="{{ $item['url'] }}">{{ $item['title'] }}</a></li>
            @endforeach
        </ul>
    </div>
</li>
