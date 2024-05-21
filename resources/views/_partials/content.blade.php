<!DOCTYPE html>
<html class="loading" lang="en"
data-textdirection="ltr">
@include('_partials/head')
<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
      data-menu="vertical-menu-modern" data-col="">
@include('_partials/navbar')

<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto"><a class="navbar-brand" href="#">
                 <h2 class="brand-text">Sumbar Traveling</h2>
                </a></li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse">
                <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x">
                </i>
            <i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary"
            data-feather="disc" data-ticon="disc"></i></a>
        </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item {{ request()->segment(1)=='dashboard'? 'active' : '' }}">
                <a class="d-flex align-items-center"
                href="/dashboard"><i data-feather="home">
            </i><span class="menu-title text-truncate" data-i18n="Home">Dashboard</span></a>
            </li>

            <li class=" nav-item {{ request()->segment(1)=='destination'? 'active' : '' }}">
                <a class="d-flex align-items-center"
                href="/destination"><i data-feather="compass">
            </i><span class="menu-title text-truncate" data-i18n="appsetting">Destination</span></a>
            </li>
            <li class=" nav-item {{ request()->segment(1)=='trip'? 'active' : '' }}">
                <a class="d-flex align-items-center"
                href="/trip"><i data-feather="map-pin">
            </i><span class="menu-title text-truncate" data-i18n="appsetting">Trip</span></a>
            </li>

            <livewire:clear-temporary/>


        </ul>
    </div>
</div>

<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-body">
            @yield('content')
        </div>
    </div>
</div>


@include('_partials/modal')


<!-- END: Content-->


@include('_partials.footer')
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
@yield('script')


@livewireScripts
</body>
</html>
