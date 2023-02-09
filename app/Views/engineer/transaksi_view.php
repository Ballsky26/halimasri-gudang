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


      <div class="row">
        <div class="col-md-3 ">
          <a href="<?php echo site_url('Operate') ?>" class="info-box bg-info">
            <span class="info-box-icon"><i class="fas fa-chevron-down"></i></span>

            <div class="info-box-content">
              <span class="info-box-number">Tambah Transaksi Masuk</span>
              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
            </div>

          </a>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 ">
          <a href="<?php echo site_url('Operate/index_distibutor') ?>" class="info-box bg-danger">
            <span class="info-box-icon"><i class="fas fa-chevron-up"></i></span>

            <div class="info-box-content">
              <span class="info-box-number">Tambah Transaksi Keluar</span>
              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
            </div>

          </a>
          <!-- /.info-box -->
        </div>
        <div class="col-md-6 ">
          <a href="<?php echo site_url('Operate/all_trans') ?>" class="info-box bg-warning">
            <span class="info-box-icon"><i class="fas fa-print"></i></span>

            <div class="info-box-content">
              <span class="info-box-number">Lihat Semua Transaksi</span>
              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
            </div>

          </a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>




      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row">
            <?php
            $count = 1;
            foreach ($data as $key) { ?>
              <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill">
                  <div class="card-header text-muted border-bottom-0">
                    # <?= $count ?>
                  </div>
                  <div class="card-body pt-0">
                    <div class="row">
                      <div class="col-7">
                        <h2 class="lead"><b>
                            <?= $key->nama ?>
                          </b></h2>
                        <p class="text-muted text-bg"><b>Stok : </b>
                          <?php
                          if ($key->total == NULL) {
                            echo "0";
                          } else {
                            echo $key->total;
                          }
                          echo " " . $key->volume;
                          ?>
                        </p>
                        <!-- <ul class="ml-4 mb-0 fa-ul text-muted">
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                        </ul> -->
                      </div>
                      <div class="col-5 text-center">
                        <!-- <i class="fas fa-lg fa-phone"></i> -->
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="text-right">
                      <!-- <a href="#" class="btn btn-sm bg-teal">
                        <i class="fas fa-comments"></i>
                      </a> -->
                      <a href="#" class="btn btn-sm btn-primary tombol" data-toggle="modal" data-target="#modal-lg">
                        <input type="hidden" id="<?= $key->id ?>tbl" value="<?= $key->id ?>|<?= $key->nama ?>">
                        <i class="fas fa-glass"></i> Detail Transaksi
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            <?php
              $count++;
            }
            ?>


          </div>
        </div>
        <!-- /.card-body -->

        <!-- holder transaksi -->
        <div>

        </div>

        <div class="card-footer">
          <nav aria-label="Contacts Page Navigation">
            <!-- <ul class="pagination justify-content-center m-0">
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item"><a class="page-link" href="#">5</a></li>
              <li class="page-item"><a class="page-link" href="#">6</a></li>
              <li class="page-item"><a class="page-link" href="#">7</a></li>
              <li class="page-item"><a class="page-link" href="#">8</a></li>
            </ul> -->
          </nav>
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script>
    var allData = <?php echo json_encode($dataAll); ?>


    var allDataLinked = <?php echo json_encode($dataAllLinked); ?>
  </script>

  <div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="title">Detail Transaksi <a id="tagnya">asd</a> </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
            <p id="showData" class="table table-head-fixed text-nowrap table_detail"></p>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->