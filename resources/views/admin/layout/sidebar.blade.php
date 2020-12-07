<nav id="sidebarMenu" class="navside">
    @php
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
            <a class="nav-link {{ request()->is('schedules') ? 'active' : '' }}" href="{{ url('schedules')}}">
                <i class="far fa-calendar-alt"></i>
                @lang('modules.dashboard.menu.schedule')
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('pages') ? 'active' : '' }}" href="{{ url('pages')}}">
                <i class="fas fa-tv"></i>
                @lang('modules.dashboard.menu.web')
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" data-target="#classdetail">
                {{-- {{ request()->is('*') ? 'active' : '' }} --}}
                <i class="fas fa-graduation-cap"></i>
                @lang('modules.dashboard.menu.class.title')
                <button class="btn icon-show"></button>
            </a>
            <ul class="submenu collapse" id="classdetail">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('online') ? 'active' : '' }}" href="{{ url('online')}}">
                        <i class="fas fa-graduation-cap"></i>
                        @lang('modules.dashboard.menu.class.online')
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('offline') ? 'active' : '' }}" href="{{ url('offline')}}">
                        <i class="fas fa-school"></i>
                        @lang('modules.dashboard.menu.class.hands')
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('levels') ? 'active' : '' }}" href="{{ url('levels')}}">
                        <i class="fas fa-level-up-alt"></i>
                        @lang('modules.dashboard.menu.class.level')
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('coupons') ? 'active' : '' }}" href="{{ url('coupons')}}">
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
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" data-target="#cakedetail">
                <i class="fas fa-birthday-cake"></i>
                @lang('modules.dashboard.menu.cake.title')
                <button class="btn icon-show"></button>
            </a>
            <ul class="submenu collapse" id="cakedetail">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('cakes') ? 'active' : '' }}" href="{{ url('cakes')}}">
                        <i class="fas fa-birthday-cake"></i>
                        @lang('modules.dashboard.menu.cake.title')
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('cake-types') ? 'active' : '' }}" href="{{ url('cake-types')}}">
                        <i class="fas fa-barcode"></i>
                        @lang('modules.dashboard.menu.cake.type')
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('cake-sizes') ? 'active' : '' }}" href="{{ url('cake-sizes')}}">
                        <i class="fas fa-compress"></i>
                        @lang('modules.dashboard.menu.cake.size')
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('cake-shapes') ? 'active' : '' }}" href="{{ url('cake-shapes')}}">
                        <i class="fas fa-paw"></i>
                        @lang('modules.dashboard.menu.cake.shape')
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-file-alt"></i>
                        @lang('modules.dashboard.menu.cake.bill')
                    </a>
                </li>
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
