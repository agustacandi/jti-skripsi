<form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a>
        </li>
    </ul>

</form>
<ul class="navbar-nav navbar-right">
    <li class="dropdown"><a href="#" data-toggle="dropdown"
            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            @if (Auth::check())
                <img alt="image"
                    src="{{ asset(Auth::user()->avatar != '' ? asset(Auth::user()->avatar) : 'img/avatar/avatar-1.png') }}"
                    class="rounded-circle mr-1">
            @elseif(Auth::guard('dosen')->check())
                <img alt="image"
                    src="{{ asset(Auth::guard('dosen')->user()->avatar != '' ? asset(Auth::guard('dosen')->user()->avatar) : 'img/avatar/avatar-1.png') }}"
                    class="rounded-circle mr-1">
            @endif


            @if (Auth::check())
                <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->name }}</div>
            @elseif(Auth::guard('dosen')->check())
                <div class="d-sm-none d-lg-inline-block">{{ Auth::guard('dosen')->user()->name }}</div>
            @endif
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <a href="{{ route('profile') }}" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item has-icon text-danger"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="post">
                @csrf
            </form>
        </div>
    </li>
</ul>
