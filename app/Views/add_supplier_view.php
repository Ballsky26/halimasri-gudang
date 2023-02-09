  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah <?php if ($tipe == "supplier"){ ?>
                          Supplier
                        <?php } else { ?>
                          Distributor
                        <?php }?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Input <?php if ($tipe == "supplier"){ ?>
                          Supplier
                        <?php } else { ?>
                          Distributor
                        <?php }?></li>
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
                  <h3 class="card-title">Input 
                        <?php if ($tipe == "supplier"){ ?>
                          Supplier
                        <?php } else { ?>
                          Distributor
                        <?php }?>
                  </h3>
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

                <?php if ($tipe == "supplier"){ ?>
                  <form action="/index.php/dashboard/save_supplier" method="post">
                <?php } else { ?>
                  <form action="/index.php/dashboard/save_distributor" method="post">
                <?php }?>
                
                
                <?= csrf_field(); ?>
                  <div class="card-body">
                   
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama 
                        <?php if ($tipe == "supplier"){ ?>
                          Supplier
                        <?php } else { ?>
                          Distributor
                        <?php }?>
                      </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="nama" placeholder="Masukkan Nama <?php if ($tipe == "supplier"){ ?>
                          Supplier
                        <?php } else { ?>
                          Distributor
                        <?php }?>" >
                    </div>
                    <div class="form-group">
                      <label>Jenis 
                        <?php if ($tipe == "supplier"){ ?>
                          Supplier
                        <?php } else { ?>
                          Distributor
                        <?php }?>
                      </label>
                      <select class="form-control select2" style="width: 100%;" name="jenis">
                        <option selected="selected" value="Perseroan">Perseroan</option>
                        <option value="CV">CV</option>
                        <option value="Perorangan">Perorangan</option>
                        <option value="Koperasi">Koperasi</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">PIC</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="pic" placeholder="Masukkan Nama PIC Supplier" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kontak</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="telp" placeholder="Masukkan Nomor Kontak Supplier" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Alamat</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="alamat" placeholder="Masukkan Alamat Supplier" >
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

