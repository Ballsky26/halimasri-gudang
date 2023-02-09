


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?=$title?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?=$title?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
       <div class="row">
        <div class="col-12">
              <div class="info-box bg-warning">
                <span class="info-box-icon"><i class="fas fa-user"></i></span>

                <div class="info-box-content">
                  <span class="info-box-number">Distributor</span>
                  <span class="info-box-text"><?=$cDistributor?> Total Distributor</span>

                  <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                  </div>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
        </div>
        <!-- /.row -->

        <?php if (!empty(session()->getFlashdata('success'))) : ?>
          <div class="card-body">
            <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Alert!</h5>
                  <?php echo session()->getFlashdata('success'); ?>
                </div>
          </div>
        <?php endif; ?>

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"> <i class="fas fa-user"></i> List Distributor</h3>


                <div class="card-tools">
                  
                  <div class="input-group input-group-sm" style="width: 150px;">

                     

                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                      <a href="<?php echo site_url('Dashboard/add_distributor/')?>"  class="btn btn-default">
                        <i class="fas fa-plus"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 430px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Nama Distributor</th>
                      <th>Jenis Distributor</th>
                      <th>PIC</th>
                      <th>Kontak</th>
                      <th>Alamat</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                     $count = 1; 
                    foreach ($distributor as $row) {
                   
                    ?>
                    <tr>
                      <td><?= $count?></td>
                      <td> <?= $row['nama']; ?> </td>
                      <td> <?= $row['jenis'] ?> </td>
                      <td> <?= $row['pic'] ?> </td>
                      <td> <?= $row['telp'] ?> </td>
                      <td> <?= $row['alamat'] ?> </td>
                      <td> 
                        <a class="btn btn-primary btn-sm" href="<?php echo site_url('Dashboard/editDistributor/'.$row['id']) ?>" ><i class="fas fa-edit"></i> </a> 
                        <a class="btn btn-danger btn-sm" href="<?php echo site_url('Dashboard/deleteDistributor/'.$row['id']) ?>" ><i class="fas fa-trash"></i> </a> 
                      
                      </td>
                    </tr>
                    <?php
                    $count++;
                    }
                    ?>
                  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>  

        
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

 