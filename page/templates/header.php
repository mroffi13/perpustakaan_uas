<!-- Page Wrapper -->
<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="http://localhost/backend/index.php">
    <div class="sidebar-brand-icon rotate-n-15">
      <img src="http://localhost/backend/assets/img/buku.png" height="70px" width="70px">
    </div>
    <div class="sidebar-brand-text">BukuanakIT </div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">


  <hr class="sidebar-divider my-0">

  <li class="nav-item active">
    <a class="nav-link" href="buku.php">
        <i class="fas fa-fw fa-table"></i>
      <span>Buku</span></a>
  </li>
  <hr class="sidebar-divider my-0">

  <li class="nav-item active">
    <a class="nav-link" href="user.php">
        <i class="fas fa-fw fa-table"></i>
      <span>User</span></a>
  </li>
  <hr class="sidebar-divider my-0">
  
  <li class="nav-item active">
    <a class="nav-link" href="transaksi.php">
        <i class="fas fa-fw fa-table"></i>
      <span>Transaksi</span></a>
    </li>
    <hr class="sidebar-divider my-0">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
      <h4><?= $_SESSION["login-adm"]["nama_adm"]; ?><h4>
        <a href="logout-admin.php" class="btn btn-primary logout">
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</a>
        

    </nav>
    <!-- End of Topbar -->