<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon">
        <i class="fas fa-hospital"></i>
      </div>
      <div class="sidebar-brand-text mx-3">OPMRS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link" href="{{route('patient.dashboard')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard - Patient</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Menu
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
      <a class="nav-link" href="{{route('patient.profile')}}">
        <i class="fas fa-fw fa-user"></i>
        <span>Profile</span></a>
    </li>
    <!-- Nav Item - Charts -->
    <li class="nav-item">
      <a class="nav-link" href="{{route('dependent.index')}}">
        <i class="fas fa-fw fa-users"></i>
        <span>Dependents</span></a>
    </li>
      <!-- Nav Item - Charts -->
    <li class="nav-item">
      <a class="nav-link" href="{{route('patient.appointment')}}">
        <i class="fas fa-book-open"></i>
        <span>Book Appointment</span></a>
    </li>
      <!-- Nav Item - Charts -->
    <li class="nav-item">
      <a class="nav-link" href="{{route('patient.history')}}">
        <i class="fas fa-archive"></i>
        <span>Medical History</span></a>
    </li>
      <!-- Divider -->
  <hr class="sidebar-divider">

   <li class="nav-item">
      <a class="nav-link" href="{{route('patient.logout')}}">
        <i class="fas fa-sign-out-alt"></i>
        <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>