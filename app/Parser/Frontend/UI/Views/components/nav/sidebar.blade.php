<nav class="sidebar sidebar-offcanvas" id="sidebar">

    @include('frontend::elements.sidebar.brand')

    <ul class="nav">

        @include('frontend::elements.sidebar.nav-item', [
            'title' => 'Dashboard',
            'route' => route('dashboard'),
            'icon'  => 'mdi mdi-gauge',
        ])

        @include('frontend::elements.sidebar.nav-category', ['title' => 'Host machine'])

        @include('frontend::elements.sidebar.nav-item-dropdown', [
            'id'    => 'parser-engine',
            'title' => 'Parser',
            'icon'  => 'mdi mdi-lan-connect',
            'dropdownItems' => [
                [
                    'title' => 'New parsing',
                    'url'   => route('parser.new-parsing')
                ],
                [
                    'title' => 'Parsed data',
                    'url'   => route('parser.parsed-data')
                ]
            ]
        ])

        @include('frontend::elements.sidebar.nav-category', ['title' => 'PlayOne Club'])

        @include('frontend::elements.sidebar.nav-item', [
            'title' => 'Statistics',
            'route' => route('playone-club.statistics'),
            'icon'  => 'mdi mdi-chart-areaspline',
        ])

        @include('frontend::elements.sidebar.nav-item', [
            'title' => 'Games',
            'route' => route('playone-club.games'),
            'icon'  => 'mdi mdi-xbox',
        ])

        @include('frontend::elements.sidebar.nav-item-dropdown', [
            'id'    => 'posts',
            'title' => 'Posts',
            'icon'  => 'mdi mdi-newspaper',
            'dropdownItems' => [
                [
                    'title' => 'All news',
                    'url'   => route('playone-club.news.all')
                ],
                [
                    'title' => 'All instructions',
                    'url'   => route('playone-club.instructions.all')
                ],
            ]
        ])

        @include('frontend::elements.sidebar.nav-item-dropdown', [
            'id'    => 'users',
            'title' => 'Users',
            'icon'  => 'mdi mdi-account-multiple',
            'dropdownItems' => [
                [
                    'title' => 'All users',
                    'url'   => route('playone-club.users.all')
                ],
                [
                    'title' => 'Add user',
                    'url'   => route('playone-club.users.add')
                ],
                [
                    'title' => 'Banned user',
                    'url'   => route('playone-club.users.banned')
                ]
            ]
        ])

        @include('frontend::elements.sidebar.nav-item', [
            'title' => 'Comments',
            'route' => route('playone-club.comments'),
            'icon'  => 'mdi mdi-comment-text-outline',
        ])

        @include('frontend::elements.sidebar.nav-item-dropdown', [
            'id'    => 'pages',
            'title' => 'Pages',
            'icon'  => 'mdi mdi-file-document',
            'dropdownItems' => [
                [
                    'title' => 'Front Page',
                    'url'   => route('playone-club.portal.front-page')
                ],
                [
                    'title' => 'Documents',
                    'url'   => route('playone-club.portal.documents')
                ],
            ]
        ])

        @include('frontend::elements.sidebar.nav-item', [
            'title' => 'Seo',
            'route' => route('playone-club.seo'),
            'icon'  => 'mdi mdi-eye',
        ])

        @include('frontend::elements.sidebar.nav-item-dropdown', [
            'id'    => 'playone-club-settings',
            'title' => 'PlayOne Settings',
            'icon'  => 'mdi mdi-settings',
            'dropdownItems' => [
                [
                    'title' => 'Security',
                    'url'   => route('playone-club.settings.security')
                ],
            ]
        ])
    </ul>
</nav>
