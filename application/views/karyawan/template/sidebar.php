<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><?= $side; ?></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <?php if ($active=="Dashboard"){
        echo '<li class="nav-item active">';
      }else{
        echo '<li class="nav-item">';
      }?>
        <a class="nav-link" href="<?=base_url();?>karyawan">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Data
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
    
      <?php if ($active=="Data Transaksi"){
        echo '<li class="nav-item active">';
      }else{
        echo '<li class="nav-item">';
      }?>
        <a class="nav-link" href="<?=base_url();?>karyawan/transaksi">
          <i class="fas fa-fw fa-dollar-sign"></i>
          <span>Data Transaksi</span>
        </a>
      </li>
      <?php if ($active=="Data Barang"){
        echo '<li class="nav-item active">';
      }else{
        echo '<li class="nav-item">';
      }?>
        <a class="nav-link" href="<?=base_url();?>karyawan/barang">
          <i class="fas fa-fw fa-folder"></i>
          <span>Data Barang</span>
        </a>
      </li>  

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->