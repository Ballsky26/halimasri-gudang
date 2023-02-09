  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>
    
      <!-- SidebarSearch Form -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Data Master  
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('Dashboard/barang')?>" class="nav-link   <?php if($active == 'barang'){ echo "active"; }  ?> ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Barang</p>
                </a>
                <a href="<?php echo site_url('Dashboard/supplier')?>" class="nav-link <?php if($active == 'supplier'){ echo "active"; }  ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Supplier</p>
                </a>
                <a href="<?php echo site_url('Dashboard/distributor')?>" class="nav-link <?php if($active == 'distributor'){ echo "active"; }  ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Distributor</p>
                </a>
                <a href="<?php echo site_url('Dashboard/satuan')?>" class="nav-link <?php if($active == 'satuan'){ echo "active"; }  ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Satuan</p>
                </a>
                <a href="<?php echo site_url('Dashboard/jenis_barang')?>" class="nav-link <?php if($active == 'jenis'){ echo "active"; }  ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Jenis Barang</p>
                </a>
              </li>


              <!-- <li class="nav-item">
                <a href="<?php echo site_url('Dashboard/')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Control Panel</p>
                </a>
                <a href="<?php echo site_url('Operate/')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Transaction</p>
                </a>
                <a href="<?php echo site_url('Setting/')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Setting</p>
                </a>
              </li> -->
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('Operate/transaksi')?>" class="nav-link <?php if($active == 'transaksi'){ echo "active"; }  ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Transaksi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('Operate/laporan')?>" class="nav-link <?php if($active == 'laporan'){ echo "active"; }  ?>">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Laporan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('Dashboard/setting')?>" class="nav-link <?php if($active == 'setting'){ echo "active"; }  ?>">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Setting
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('Dashboard/login')?>" class="nav-link <?php if($active == 'login'){ echo "active"; }  ?>">
              <i class="nav-icon fas fa-door-open"></i>
              <p>
                Log out
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
