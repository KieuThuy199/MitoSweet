<nav id="sidebarMenu" class="navside">
    @php
        $class = array(
            'graduation-cap' => 'Khóa học trực tuyến',
            'school'         => 'Khóa học thực hành',
            'level-up-alt'   => 'Cấp độ',
            'tags'           => 'Hashtag',
            'gift'           => 'Phiếu giảm giá',
            'file-alt'       => 'Đơn mua khóa học',
        );
        $cake = array(
            'birthday-cake'  => 'Bánh',
            'barcode'        => 'Loại bánh',
            'compress'       => 'Kích thước bánh',
            'paw'            => 'Hình dạng bánh',
            'bookmark'       => 'Hương vị bánh',
            'palette'        => 'Màu sắc bánh',
            'file-alt'       => 'Đơn đặt bánh',
        );
        $admin = array(
            'list'           => 'Danh sách tài khoản',
            'barcode'        => 'Loại tài khoản',
            'check'          => 'Quyền hạn'
        );
    @endphp
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">
                <i class="fas fa-home"></i>@lang('modules.dashboard.menu.home')
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('news') ? 'active' : '' }}" href="{{ url('news') }}">
                <i class="far fa-newspaper"></i>
                @lang('modules.dashboard.menu.news')
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="far fa-id-card"></i>
                @lang('modules.dashboard.menu.contact')
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="far fa-sticky-note"></i>
                @lang('modules.dashboard.menu.sendnews')
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('freetutorials') ? 'active' : '' }}" href="{{ url('freetutorials')}}">
                <i class="fas fa-video"></i>
                @lang('modules.dashboard.menu.freetutorial')
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="far fa-images"></i>
                @lang('modules.dashboard.menu.gallery')
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="far fa-calendar-alt"></i>
                @lang('modules.dashboard.menu.schedule')
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-tv"></i>
                @lang('modules.dashboard.menu.web')
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed {{ request()->is('course/*') ? 'active' : '' }}" data-toggle="collapse" data-target="#classdetail">
                <i class="fas fa-graduation-cap"></i>
                @lang('modules.dashboard.menu.class.title')
                <button class="btn icon-show"></button>
            </a>
            <ul class="submenu collapse" id="classdetail">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('course/online') ? 'active' : '' }}" href="{{ url('course/online')}}">
                        <i class="fas fa-graduation-cap"></i>
                        @lang('modules.dashboard.menu.class.online')
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-school"></i>
                        @lang('modules.dashboard.menu.class.hands')
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('course/levels') ? 'active' : '' }}" href="{{ url('course/levels')}}">
                        <i class="fas fa-level-up-alt"></i>
                        @lang('modules.dashboard.menu.class.level')
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-gift"></i>
                        @lang('modules.dashboard.menu.class.discount')
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-file-alt"></i>
                        @lang('modules.dashboard.menu.class.bill')
                    </a>
                </li>
                {{-- @foreach ($class as $key => $item)
                    <li class="nav-item">
                        <a class="nav-link" href="/{{$key}}">
                            <i class="fas fa-{{$key}}"></i>
                            {{ $item }}
                        </a>
                    </li>
                @endforeach --}}
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" data-target="#cakedetail">
                <i class="fas fa-birthday-cake"></i>
                @lang('modules.dashboard.menu.cake.title')
                <button class="btn icon-show"></button>
            </a>
            <ul class="submenu collapse" id="cakedetail">
                @foreach ($cake as $key => $item)
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        <i class="fas fa-{{$key}}"></i>
                        {{ $item }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" data-target="#admindetail">
                <i class="fas fa-address-book"></i>
                @lang('modules.dashboard.menu.admin.title')
            <button class="btn icon-show"></button>
            </a>
            <ul class="submenu collapse" id="admindetail">
                @foreach ($admin as $key => $item)
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-{{$key}}"></i>
                        {{ $item }}
                    </a>
                </li>
            @endforeach
            </ul>
        </li>
    </ul>
</nav>
