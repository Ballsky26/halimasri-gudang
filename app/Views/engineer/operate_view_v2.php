  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= $title ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- <div class="row">
          <div class="col-lg-12">
            <div class="info-box bg-info">
              <span class="info-box-icon"><i class="fas fa-dollar-sign"></i></span>

              <div class="info-box-content">
                <span class="info-box-number">Total</span>
                <span class="info-box-text">Rp. 510.000,-</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 100%"></div>
                </div>
              </div>
            
            </div>
           
          </div>
       </div>   -->
        <div class="row">
          <div class="col-lg-4">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Receipt</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="formSubmit" action="/index.php/operate/save_transaction_v2" method="post">
                <?= csrf_field(); ?>
                <div class="card-body">
                  <div class="form-group">
                    <div class="form-group">
                      <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                        <input type="checkbox" class="custom-control-input" id="customSwitch23" name="labelJenis" hidden>
                        <label class="custom-control-label" id="label23" for=""><?=$label?></label>
                      </div>
                    </div>
                    <label>Data </label>
                    <div class="form-group" id="container1">
                      <select class="form-control select2" id="selectDistributor" style="width: 100%;" name="jenisDis">
                        <?php
                        // populate distributor
                        $index = 0;
                        foreach ($distributor as $key) {
                          if ($index == 0) { ?>
                            <option value="<?= $key['id'] ?>"><?= $key['nama'] ?></option>
                          <?php
                          } else { ?>
                            <option value="<?= $key['id'] ?>"><?= $key['nama'] ?></option>
                          <?php
                          }
                          ?>
                        <?php
                          $index++;
                        }
                        ?>
                      </select>

                      <?php
                      foreach ($distributor as $key) {
                      ?>
                        <input type="text" class="holderDis" id="valueDis<?= $key['id'] ?>" value="<?= $key['pic'] ?>,<?= $key['jenis'] ?>,<?= $key['alamat'] ?>">
                      <?php
                      }
                      ?>

                    </div>
                    <div class="form-group" id="container2">
                      <select class="form-control select2" id="selectSupplier" style="width: 100%;" name="jenisSup">
                        <?php
                        // populate supplier
                        $index = 0;
                        foreach ($supplier as $key) {
                          if ($index == 0) { ?>
                            <option value="<?= $key['id'] ?>"><?= $key['nama'] ?></option>
                          <?php
                          } else { ?>
                            <option value="<?= $key['id'] ?>"><?= $key['nama'] ?></option>
                          <?php
                          }
                          ?>

                        <?php
                          $index++;
                        }
                        ?>
                      </select>
                      <?php
                      foreach ($supplier as $key) {
                      ?>
                        <input type="text" class="holderSup" id="valueSup<?= $key['id'] ?>" value="<?= $key['pic'] ?>,<?= $key['jenis'] ?>,<?= $key['alamat'] ?>">
                      <?php
                      }
                      ?>
                    </div>
                    <div class="form-group">
                      <div class="input-group-prepend">
                      <span class="input-group-text">Jenis</span>
                        <input type="text" class="form-control form-control-border" id="jenis" placeholder="Jenis" readonly>
                      </div>
                      <div class="input-group-prepend">
                        <span class="input-group-text">PIC</span>
                        <input type="text" class="form-control form-control-border" id="pic" placeholder="PIC" readonly>
                      </div>
                      <div class="input-group-prepend">
                        <span class="input-group-text">Alamat</span>
                        <input type="text" class="form-control form-control-border" id="alamat" placeholder="Alamat" readonly>
                      </div>
                    </div>
                  </div>
                </div>
                <input type="hidden" id="holderAll" name="holderAll">
                <input type="hidden" id="typeNya" name="typeNya" value="dist">
              </form>
            </div>
          </div>
          <div class="col-lg-8">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Items</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Barang</label>
                  <div class="form-group" id="container3">
                    <select class="form-control select2" id="selectBarang" style="width: 100%;" name="barang">
                      <?php
                      // populate distributor
                      $index = 0;
                      foreach ($all as $key) {
                        if ($index == 0) { ?>
                          <option value="<?= $key['id'] ?>"><?= $key['nama'] ?></option>
                        <?php
                        } else { ?>
                          <option value="<?= $key['id'] ?>"><?= $key['nama'] ?></option>
                        <?php
                        }
                        ?>
                      <?php
                        $index++;
                      }
                      ?>
                    </select>

                    <?php
                    foreach ($all as $key) {
                    ?>
                      <input type="hidden" class="holderBar" id="valueBar<?= $key['id'] ?>" value="<?= $key['nama'] ?>,<?= $key['jenis'] ?>,<?= $key['volume'] ?>">
                    <?php
                    }
                    ?>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Nama Barang</span>
                    <input type="text" class="form-control form-control-border" id="namaBar" readonly>
                  </div>
                  <div class="input-group-prepend">
                    <span class="input-group-text">Jenis Barang</span>
                    <input type="text" class="form-control form-control-border" id="jenisBar" readonly>
                  </div>
                  <div class="input-group-prepend">
                    <span class="input-group-text">Volume</span>
                    <input type="number" class="form-control form-control-border" id="volume">
                    <span class="input-group-text"><i id="labelVolume">Kg.</i></span>
                  </div>
                </div>


                <script>
                  var validasiJumlah = <?php echo json_encode($data); ?>
                </script>


              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" id="addButton" class="btn btn-info">Submit</button>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest Orders</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0" id="tabelDisplay">
                    <thead>
                      <tr>
                        <th>Order ID</th>
                        <th>Jenis</th>
                        <th>Nama</th>
                        <th colspan="2">Jumlah</th>
                      </tr>
                    </thead>
                    <tbody id="tbodyid">
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a id="submitOrder" class="btn btn-sm btn-info float-left">Create Order</a>
              </div>
              <!-- /.card-footer -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->