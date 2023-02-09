

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Supplier</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Edit Supplier</li>
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
                        <hr />
                        <?php echo session()->getFlashdata('error'); ?>
                    </div>
                <?php endif; ?>

              <div class="card-header">
                <h3 class="card-title">Edit</h3>
              </div>
              <!-- /.card-header -->
              
                <?php if ($tipe == "supplier"){ ?>
                  <form action="/index.php/dashboard/editSupplierAct" method="post">
                <?php } else { ?>
                  <form action="/index.php/dashboard/editDistributorAct" method="post">
                <?php }?>
              
              
              <?= csrf_field(); ?>
              <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Nama <?php if ($tipe == "supplier"){ ?>
                          Supplier
                        <?php } else { ?>
                          Distributor
                        <?php }?></label>
                        <input type="hidden" class="form-control" name="idx" readonly value="<?=$record->id?>">
                        <input type="text" class="form-control" name="nama" value=" <?=$record->nama?> ">
                      </div>
                    </div>
                  
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Jenis <?php if ($tipe == "supplier"){ ?>
                          Supplier
                        <?php } else { ?>
                          Distributor
                        <?php }?></label>
                        
                        <select class="form-control select2" style="width: 100%;" name="jenis">
                          <option 
                            <?php if($record->jenis == "Perseroan"){ ?>
                            selected="selected"
                            <?php }else{}?> 
                          value="Perseroan">Perseroan</option>
                          <option 
                            <?php if($record->jenis == "CV"){ ?>
                            selected="selected"
                            <?php }else{}?> 
                          value="CV">CV</option>
                          <option <?php if($record->jenis == "Perorangan"){ ?>
                            selected="selected"
                            <?php }else{}?>
                          value="Perorangan">Perorangan</option>
                          <option <?php if($record->jenis == "Koperasi"){ ?>
                            selected="selected"
                            <?php }else{}?>
                          value="Koperasi">Koperasi</option>
                        
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                      <label for="exampleInputEmail1">PIC</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="pic" value="<?=$record->pic?>" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kontak</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="telp" value="<?=$record->telp?>" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Alamat</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="alamat" value="<?=$record->alamat?>" >
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
