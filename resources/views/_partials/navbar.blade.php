<nav class="header-navbar navbar navbar-expand-lg align-items-center
floating-nav navbar-light navbar-shadow container-xxl">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">

        </div>
        <ul class="nav navbar-nav align-items-center ms-auto">
            <li class="nav-item d-none d-lg-block">
                <a class="nav-link nav-link-style">
                <i class="ficon" data-feather="moon">
            </i></a></li>
            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle dropdown-user-link"
                  id="dropdown-user" href="#" data-bs-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                <div class="user-nav d-sm-flex d-none"><span class="user-name fw-bolder">Admin</span><span
                   class="user-status">Admin</span></div>
                <span class="avatar"><img class="round"
                src="{{asset('plugins/app-assets/images/avatar.png')}}"
                alt="avatar" height="40" width="40"><span
                                class="avatar-status-online"></span></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                    <a class="dropdown-item" href="/setting">
                    <i class="me-50" data-feather="settings">
                    </i> Settings</a>
                    <form action="/logout" method="post">
                        @csrf
                    <button class="dropdown-item" type="submit">
                    </form>
                    <i class="me-50" data-feather="power"></i> Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>