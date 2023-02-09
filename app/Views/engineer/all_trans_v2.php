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
          <div class="card card-info">
                  <div class="card-header">
                    <h3 class="card-title">Filter</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="formSubmit" action="/index.php/operate/all_trans_search_v2" method="post">
                  <?= csrf_field(); ?>
                    <div class="card-body">
                      <div class="form-group">
                        <label>Bulan </label>
                        <div class="form-group" id="container1">
                          <select class="form-control select2" id="selectDistributor" style="width: 100%;" name="bulan">
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                          </select>
                        </div>
                        <label>Tahun </label>
                        <div class="form-group" id="container1">
                          <select class="form-control select2" id="selectDistributor" style="width: 100%;" name="tahun">
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <button type="submit" id="addButton" class="btn btn-info">Cari</button>
                    </div>
                  </form>
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
                <h3 class="card-title"><i class="fas fa-archive"></i> List Transaksi </h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                      <a href="<?php echo site_url('Dashboard/add_manual/')?>"  class="btn btn-default">
                        <i class="fas fa-plus"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height:430px;">

                
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Tanggal</th>
                      <th>Transaksi</th>
                      <th>Nama Barang</th>
                      <th>Jumlah</th>
                      <th>Satuan Volume</th>
                      <th>QR</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                     $count = 1; 
                     if ($all == null){ ?>
                       <tr>
                      <td>Data Tidak Tersedia</td>
                     </tr>
                     <?php }
                    foreach ($all as $row) {
                   
                    ?>
                    <tr>
                      <td><?= $count?></td>
                      <td> <?= $row->tanggal; ?> </td>
                      <td> <?php
                      if  ($row->tipe == 'sup'){
                         echo '<p class="text-success">Barang Masuk</p>';
                      } else {
                        echo '<p class="text-danger">Barang Keluar</p>';
                      }
                      
                      ?> </td>
                      <td> <?= $row->nama; ?> </td>
                      <td> <?= abs($row->value) ?> </td>
                      <td> <?= $row->volume ?> </td>
                      <td> <div id="qrcode<?= $row->id_trans ?>"></div> </td>
                      <script type="text/javascript">
                        var qrcode = new QRCode(document.getElementById("qrcode<?= $row->id_trans ?>"), {
                                      text: "<?php echo site_url('Operate/detail_trans_v2/'.$row->id_trans) ?>",
                                      width: 208,
                                      height: 208,
                                      colorLight : "#ffffff",
                                      correctLevel : QRCode.CorrectLevel.H
                                    });
                      </script>
                      <td> 
                        <a class="btn btn-danger btn-sm" href="<?php echo site_url('Dashboard/approve/'.$row->tanggal) ?>" ><i class="fas fa-trash"></i> </a>  
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

 