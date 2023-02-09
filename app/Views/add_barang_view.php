  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Barang</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Input Barang</li>
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
          <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Input Barang</h3>
                </div>

                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                    <div class="alert alert-danger" role="alert">
                        <h4>Periksa Entrian Form</h4>
                        </hr />
                        <?php echo session()->getFlashdata('error'); ?>
                    </div>
                <?php endif; ?>

                <!-- /.card-header -->
                <!-- form start -->
                <form action="/index.php/dashboard/save" method="post">
                <?= csrf_field(); ?>
                  <div class="card-body">
                   
                

                   <div class="form-group">
                      <label for="exampleInputEmail1">Kode Barang</label>
                      <input type="text" class="form-control" id="kode" name="kode" readonly >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Barang</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="nama" placeholder="Masukkan Nama Barang" >
                    </div>
                    <div class="form-group">
                      <label>Jenis Barang</label>
                      <select class="form-control select2" style="width: 100%;" name="jenis">
                        <?php
                        foreach ($satuan as $row){
                          ?>
                          <option value="<?= $row['nama_satuan']?>"><?= $row['nama_satuan']?></option>
                        <?php }
                        ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Volume Barang</label>
                      <select class="form-control select2" style="width: 100%;" name="volume">
                        <?php
                        foreach ($jenis as $row){
                          ?>
                          <option value="<?= $row['nama_jenis_barang']?>"><?= $row['nama_jenis_barang']?></option>
                        <?php }
                        ?>
                      </select>
                    </div>
                    
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
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
 
  <!-- /.control-sidebar -->
