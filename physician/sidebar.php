 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link collapsed" href="dashboard.php">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Appointment</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="viewAppointment.php">
          <i class="bi bi-calander"></i><span>Waiting Appointment List</span>
        </a>
      </li>
      <li>
        <a href="appointmentList.php">
          <i class="bi bi-calander"></i><span>Appointment List</span>
        </a>
      </li>
      
    </ul>
  </li><!-- End Components Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Medicine</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="addMedsForm.php">
          <i class="bi bi-circle"></i><span>Add Medicine</span>
        </a>
      </li>
      <li>
        <a href="approveMedsForm.php">
          <i class="bi bi-circle"></i><span> Approve Medicine</span>
        </a>
      </li>
      <li>
      <li>
        <a href="updateStockForm.php">
          <i class="bi bi-circle"></i><span> Medicine List</span>
        </a>
      </li>
      <li>
        <a href="orderList.php">
          <i class="bi bi-circle"></i><span> Medicine Order List</span>
        </a>
      </li>
      <li>
        <a href="salesList.php">
          <i class="bi bi-circle"></i><span> Medicine Transaction List</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->

  <li class="nav-heading">Pages</li>

  <li class="nav-item">
    <a class="nav-link " href="users-profile.php">
      <i class="bi bi-person"></i>
      <span>Profile</span>
    </a>
  </li><!-- End Profile Page Nav -->

  <li class="nav-item">
    <a class="nav-link " href="report.php">
    <i class="bi bi-newspaper"></i>
      <span>Report</span>
    </a>
  </li><!-- End report Page Nav -->



</ul>

</aside><!-- End Sidebar-->