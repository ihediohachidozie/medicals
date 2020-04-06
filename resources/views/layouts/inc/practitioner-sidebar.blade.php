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
      <a class="nav-link" href="{{route('practitioner.dashboard')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Menu
    </div>

    @if (Auth::user()->profession == 0)
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-procedures"></i>
          <span>Medical Appointments</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Nurse Activity:</h6>
            <a class="collapse-item" href="{{route('patients.bookings')}}">Patient Bookings</a>
            <a class="collapse-item" href="{{route('practitioner.patient.history')}}">Patient's History</a>
            <a class="collapse-item" href="#">Injections</a>
          </div>
        </div>
      </li>    
    @endif

    @if (Auth::user()->profession == 1)
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-user-md"></i>
          <span>Consultations</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Physician's Activity:</h6>
            <a class="collapse-item" href="{{route('patients.consult')}}">Admitted Patients</a>
            <a class="collapse-item" href="{{route('practitioner.patient.history')}}">Patient's History</a>
          </div>
        </div>
      </li>        
    @endif

  
    @if (Auth::user()->profession == 2)
      <li class="nav-item">
          <a class="nav-link" href="{{route('lab.test.requests')}}">
            <i class="fas fa-microscope"></i>
            <span>Laboratory Tests</span></a>
        </li>
    @endif
    @if (Auth::user()->profession == 3)
      <li class="nav-item">
        <a class="nav-link" href="{{route('pharm.prescriptions')}}">
          <i class="fas fa-prescription"></i>
          <span>Pharmacy</span></a>
      </li>      
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider">



   <li class="nav-item">
      <a class="nav-link" href="{{route('practitioner.logout')}}">
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