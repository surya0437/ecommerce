<div class="navbar-bg"></div>
<nav class="sticky navbar navbar-expand-lg main-navbar">
    <div class="mr-auto form-inline">
        <ul class="mr-3 navbar-nav">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn"> <i
                        data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                    <i data-feather="maximize"></i>
                </a></li>
        </ul>
    </div>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                {{-- <img alt="image" src="assets/img/user.png" class="user-img-radious-style"> --}}
                <i data-feather="user"></i>
                <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
                <div class="dropdown-title">{{ Auth::guard('web')->user()->name }}</div>
                <a href="{{ route('profile.edit') }}" class="dropdown-item has-icon"> <i class="far fa-user"></i>
                    Profile
                </a>
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();"
                        class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i>
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>

            </div>
        </li>
    </ul>
</nav>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">
                <x-logo />
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="dropdown {{ Request::routeIs('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="nav-link"><i
                        data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown {{ Request::routeIs('cart.view') ? 'active' : '' }}">
                <a href="{{ route('cart.view') }}" class="nav-link"><i data-feather="monitor"></i><span>Cart</span></a>
            </li>
            <li class="dropdown {{ Request::routeIs('history.view') ? 'active' : '' }}">
                <a href="{{ route('history.view') }}" class="nav-link"><i data-feather="monitor"></i><span>Order
                        History</span></a>
            </li>

        </ul>
    </aside>
</div>
