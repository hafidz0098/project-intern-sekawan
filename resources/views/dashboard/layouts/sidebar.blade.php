<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Welcome</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    @can('admin')
    <!-- Heading -->
    <div class="sidebar-heading">
        Admin
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ Request::is('dashboard/order*') ? 'active' : '' }}">
        <a class="nav-link " href="/dashboard/order">
            <i class="fas fa-book"></i>
            <span>Pemesanan Kendaraan</span>
        </a>
    </li>
    @endcan

    @can('approver')
    <!-- Heading -->
    <div class="sidebar-heading">
        Approver
    </div>

    <li class="nav-item {{ Request::is('dashboard/approve*') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard/approve">
            <i class="fas fa-chalkboard-teacher"></i>
            <span>Approve Pemesanan</span></a>
    </li>
   
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <li class="nav-item {{ Request::is('dashboard/finalapprove*') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard/finalapprove">
            <i class="fas fa-chalkboard-teacher"></i>
            <span>Final Approve</span></a>
    </li>
   
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    @endcan

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->