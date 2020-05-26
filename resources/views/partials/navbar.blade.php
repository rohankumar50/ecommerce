<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Company name</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
        data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav px-3">
        @if(Session::get('user'))
                <ul class="navbar-nav">
                    <li class="nav-item text-nowrap">
                        <a class="nav-link" href="#">{{ Session::get('user') }}</a>
                    </li>
                    <li class="nav-item text-nowrap">
                        <a class="nav-link" href="signout">Sign out</a>
                    </li>
                </ul>
        @else
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="login">Login</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="register">Register</span></a>
                </li>
            </ul>
        @endif
    </ul>
</nav>
