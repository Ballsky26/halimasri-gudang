

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Edit Barang</li>
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
          <!-- general form elements disabled -->
        <div class="col-sm-12">
          <div class="card card-primary">

               <?php if (!empty(session()->getFlashdata('error'))) : ?>
                    <div class="alert alert-danger" role="alert">
                        <h4>Periksa Entrian Form</h4>
                        </hr />
                        <?php echo session()->getFlashdata('error'); ?>
                    </div>
                <?php endif; ?>

              <div class="card-header">
                <h3 class="card-title">Edit [<?=$record->kd_barang?>]</h3>
              </div>
              <!-- /.card-header -->

              <form action="/index.php/dashboard/edit" method="post">
              <?= csrf_field(); ?>
              <div class="card-body">
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="hidden" class="form-control" name="idx" readonly value="<?=$record->id?>">
                        <input type="text" class="form-control" name="nama" value=" <?=$record->nama?> ">
                      </div>
                    </div>
                  
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Jenis Barang</label>
                        <select class="form-control select2" style="width: 100%;" name="jenis">

                          <?php
                          foreach ($jenis as $row){
                            ?>
                            <option value="<?= $row['nama_jenis_barang']?>"><?= $row['nama_jenis_barang']?></option>
                          <?php }
                          ?>
                          
                        </select>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Volume Barang</label>
                        <!-- <input type="text" class="form-control" name="volume" value=" <?=$record->volume?> "> -->
                        <select class="form-control select2" style="width: 100%;" name="volume">
                        <?php
                        foreach ($satuan as $row){
                          ?>
                          <option value="<?= $row['nama_satuan']?>"><?= $row['nama_satuan']?></option>
                        <?php }
                        ?>
                      </select>
                      </div>
                    </div>
                  </div>
                

                  <hr>
                  <div class="row">
                    <div class="col-lg-12">
                    <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-save"></i> &nbsp Simpan</button>
                    </div>
                   
                  </div>

                
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- general form elements disabled -->
        
      
      
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
