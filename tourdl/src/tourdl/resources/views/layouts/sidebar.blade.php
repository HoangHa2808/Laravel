<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            Tour<span> du lịch</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            {{-- <li class="nav-item nav-category">Main</li> --}}
            <li class="nav-item {{ active_class(['/']) }}">
                <a href="{{ url('/') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['posts/*']) }}">
                <a class="nav-link" data-toggle="collapse" href="#posts" role="button"
                    aria-expanded="{{ is_active_route(['posts/*']) }}" aria-controls="posts">
                    <i class="link-icon" data-feather="file"></i>
                    <span class="link-title">Bài viết</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ show_class(['posts/*']) }}" id="posts">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('/posts/tours') }}" class="nav-link {{ active_class(['posts/tours']) }}">Du
                                lịch</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/posts/hotel') }}"
                                class="nav-link {{ active_class(['posts/hotel']) }}">Khách sạn</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/posts/news') }}" class="nav-link {{ active_class(['posts/news']) }}">Tin
                                tức</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ active_class(['category/index']) }}">
                <a href="{{ url('/category/index') }}" class="nav-link">
                    <i class="link-icon" data-feather="align-left"></i>
                    <span class="link-title">Danh mục</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['postType/index']) }}">
                <a href="{{ url('/postType/index') }}" class="nav-link">
                    <i class="link-icon" data-feather="list"></i>
                    <span class="link-title">Phân loại</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['service/*']) }}">
                <a class="nav-link" data-toggle="collapse" href="#service" role="button"
                    aria-expanded="{{ is_active_route(['service/*']) }}" aria-controls="service">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Dịch vụ</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ show_class(['service/*']) }}" id="service">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('/service/drive') }}"
                                class="nav-link {{ active_class(['service/drive']) }}">Thuê xe</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/service/orders') }}"
                                class="nav-link {{ active_class(['service/orders']) }}">Đặt tour</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item {{ active_class(['feedback/index']) }}">
                <a href="{{ url('/feedback/index') }}" class="nav-link">
                    <i class="link-icon" data-feather="clipboard"></i>
                    <span class="link-title">Phản hồi</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['role/index']) }}">
                <a href="{{ url('/role/index') }}" class="nav-link">
                    <i class="link-icon" data-feather="user"></i>
                    <span class="link-title">Vai trò</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['user/index']) }}">
                <a href="{{ url('/user/index') }}" class="nav-link">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">Người dùng</span>
                </a>
            </li>

            {{-- <li class="nav-item {{ active_class(['forms/*']) }}">
                <a class="nav-link" data-toggle="collapse" href="#forms" role="button"
                    aria-expanded="{{ is_active_route(['forms/*']) }}" aria-controls="forms">
                    <i class="link-icon" data-feather="inbox"></i>
                    <span class="link-title">Forms</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ show_class(['forms/*']) }}" id="forms">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('/forms/basic-elements') }}"
                                class="nav-link {{ active_class(['forms/basic-elements']) }}">Basic Elements</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/forms/advanced-elements') }}"
                                class="nav-link {{ active_class(['forms/advanced-elements']) }}">Advanced Elements</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/forms/editors') }}"
                                class="nav-link {{ active_class(['forms/editors']) }}">Editors</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/forms/wizard') }}"
                                class="nav-link {{ active_class(['forms/wizard']) }}">Wizard</a>
                        </li>
                    </ul>
                </div>
            </li>
           --}}
            {{-- <li class="nav-item nav-category">Pages</li>
            <li class="nav-item {{ active_class(['general/*']) }}">
                <a class="nav-link" data-toggle="collapse" href="#general" role="button"
                    aria-expanded="{{ is_active_route(['general/*']) }}" aria-controls="general">
                    <i class="link-icon" data-feather="book"></i>
                    <span class="link-title">Special Pages</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ show_class(['general/*']) }}" id="general">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('/general/profile') }}"
                                class="nav-link {{ active_class(['general/profile']) }}">Profile</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ active_class(['auth/*']) }}">
                <a class="nav-link" data-toggle="collapse" href="#auth" role="button"
                    aria-expanded="{{ is_active_route(['auth/*']) }}" aria-controls="auth">
                    <i class="link-icon" data-feather="unlock"></i>
                    <span class="link-title">Authentication</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ show_class(['auth/*']) }}" id="auth">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('/auth/login') }}"
                                class="nav-link {{ active_class(['auth/login']) }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/auth/register') }}"
                                class="nav-link {{ active_class(['auth/register']) }}">Register</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ active_class(['error/*']) }}">
                <a class="nav-link" data-toggle="collapse" href="#error" role="button"
                    aria-expanded="{{ is_active_route(['error/*']) }}" aria-controls="error">
                    <i class="link-icon" data-feather="cloud-off"></i>
                    <span class="link-title">Error</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ show_class(['error/*']) }}" id="error">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('/error/404') }}"
                                class="nav-link {{ active_class(['error/404']) }}">404</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/error/500') }}"
                                class="nav-link {{ active_class(['error/500']) }}">500</a>
                        </li>
                    </ul>
                </div>
            </li> --}}

        </ul>
    </div>
</nav>
