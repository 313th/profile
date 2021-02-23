<li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fa fa-user-circle-o"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
        <span class="dropdown-item dropdown-header">{{ Auth::user()->name }} {{ Auth::user()->family }}</span>
        <div class="dropdown-divider"></div>
        <a href="{{ route('logout') }}" class="dropdown-item">
            <i class="fa fa-sign-out ml-2"></i> خروج از سامانه
            <span class="float-left text-muted text-sm">Logout</span>
        </a>

    </div>
</li>
