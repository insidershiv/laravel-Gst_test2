<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion font-dashboard" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">

        <div class="sidebar-brand-text mx-3">
            <h6>{{ Auth::user()->name }}</h6>
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('/') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span class="font-dashboard">Dashboard</span></a>
    </li>

    <!-- Divider -->

    <!-- Heading -->
    {{-- <div class="sidebar-heading display-4">
        Features
    </div> --}}

    <!-- Nav Item - Pages Collapse Menu -->

    @if (Auth::user()->is_admin == 1)
        <li class="nav-item">
            <a class="nav-link collapsed " href="{{ url('/admin/newuser') }}">
                <i class="fas fa-user-plus"></i>
                <span class="font-dashboard">New User</span>
            </a>

        </li>
    @endif



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">



    @if (Auth::user()->is_admin == 1)
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/admin/update-user') }}">
                <i class="fas fa-user-plus"></i>
                <span class="font-dashboard">Update User</span>
            </a>

        </li>
    @endif


    @if (Auth::user()->is_admin == 1)
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/admin/search/user') }}">
                <i class="fas fa-search"></i>
                <span class="font-dashboard">Search User</span>
            </a>

        </li>
    @endif



    @if (Auth::user()->is_admin == 1)
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/password_request/list') }}">
                <i class="fas fa-user-plus"></i>
                <span class="font-dashboard">Password Reset Requests</span>
            </a>

        </li>
    @endif





    @if (Auth::user()->is_admin == 0)
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/user/new_customer') }}">
                <i class="fas fa-user-plus"></i>
                <span class="font-dashboard">New Customer</span>
            </a>

        </li>
    @endif



    @if (Auth::user()->is_admin == 0)
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/user/update_customer') }}">
                <i class="fas fa-user-plus"></i>
                <span class="font-dashboard">Update Customer</span>
            </a>

        </li>
    @endif



@if (Auth::user()->is_admin == 0)
<li class="nav-item">
    <a class="nav-link collapsed" href="{{ url('/user/view/customers') }}">
        <i class="fas fa-search"></i>
        <span class="font-dashboard">Search Customer</span>
    </a>

</li>
@endif


    @if (Auth::user()->is_admin == 0)
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/user/inventory') }}">
            <i class="fas fa-user-plus"></i>
            <span class="font-dashboard">Inventory</span>
        </a>

    </li>
@endif


@if (Auth::user()->is_admin == 0)
<li class="nav-item">
    <a class="nav-link collapsed" href="{{ url('/user/additem') }}">
        <i class="fas fa-user-plus"></i>
        <span class="font-dashboard">Add To Inventory</span>
    </a>

</li>
@endif








    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="no-border no-bg" id="sidebarToggle"></button>
    </div>

</ul>
