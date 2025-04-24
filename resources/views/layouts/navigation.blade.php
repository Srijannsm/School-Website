<head>
    <script src="https://kit.fontawesome.com/75ea627ee2.js" crossorigin="anonymous"></script>
    <style>
        .sidebar-link {
            color: #42629b !important;
        }
    </style>
</head>
<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="{{ route('profile.show') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div> --}}

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Dashboard Link -->
            <!--<li class="nav-item">-->
            <!--    <a href="{{ route('home') }}" class="nav-link sidebar-link">-->
            <!--        <i class="nav-icon fas fa-th"></i>-->
            <!--        <p>{{ __('Dashboard') }}</p>-->
            <!--    </a>-->
            <!--</li>-->

            <!-- Academics Link -->
            <li class="nav-item">
                <a href="{{ route('academics.index') }}" class="nav-link sidebar-link">
                    <i class="nav-icon fas fa-scroll"></i>
                    <p>{{ __('Academics') }}</p>
                </a>
            </li>
            
            <!-- Gallery Link -->
            <li class="nav-item">
                <a href="{{ route('gallery.index') }}" class="nav-link sidebar-link">
                    <i class="nav-icon fas fa-photo-film"></i>
                    <p>{{ __('Gallery') }}</p>
                </a>
            </li>

            <!-- Gallery Link -->
            <li class="nav-item">
                <a href="{{ route('results.index') }}" class="nav-link sidebar-link">
                    <i class="nav-icon fas fa-square-poll-horizontal"></i>
                    <p>{{ __('Results') }}</p>
                </a>
            </li>

            <!-- Users Link -->
            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link sidebar-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>{{ __('Users') }}</p>
                </a>
            </li>

            <!-- News Link -->
            <li class="nav-item">
                <a href="{{ route('news.index') }}" class="nav-link sidebar-link">
                    <i class="nav-icon fas fa-newspaper"></i>
                    <p>{{ __('News & Blog') }}</p>
                </a>
            </li>
            <!--Notices Link -->
            <li class="nav-item">
                <a href="{{ route('notices.index') }}" class="nav-link sidebar-link">
                    <i class="nav-icon fas fa-circle-exclamation"></i>
                    <p>{{ __('Notices') }}</p>
                </a>
            </li>
            
            <!--Downloads Link -->
            <li class="nav-item">
                <a href="{{ route('downloads.index') }}" class="nav-link sidebar-link">
                    <i class="nav-icon fas fa-solid fa-download"></i>
                    <p>{{ __('Downloads') }}</p>
                </a>
            </li>
            
            <!-- Settings Link -->
            <li class="nav-item">
                <a href="{{ route('school_details.index') }}" class="nav-link sidebar-link">
                    <i class="nav-icon fas fa-solid fa-gear"></i>
                    <p>{{ __('Settings') }}</p>
                </a>
            </li>

            <!-- Two-level Menu -->
            {{-- <li class="nav-item">
                <a href="#" class="nav-link sidebar-link">
                    <i class="nav-icon fas fa-solid fa-gear"></i>
                    <p>
                        Settings
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('school_details.index') }}" class="nav-link sidebar-link">
                            <i class="far fa-circle nav-icon"></i> 
                            <p>School Setting</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link sidebar-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Messages</p>
                        </a>
                    </li>
                </ul>
            </li> --}}
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
