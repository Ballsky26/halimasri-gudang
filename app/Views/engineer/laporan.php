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
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Grafik</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-5 col-sm-3">
                    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                      <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home2" role="tab" aria-controls="vert-tabs-home" aria-selected="true">Grafik</a>  
                    </div>
                  </div>
                  <div class="col-7 col-sm-9">
                    <div class="tab-content" id="vert-tabs-tabContent">
                      <div class="tab-pane text-left fade show active" id="vert-tabs-home2" role="tabpanel" aria-labelledby="vert-tabs-home-tab">

                        <div>
                          <div class="row">
                            <div class="form-group col-md-6">

                                <?php
                                if ($cat == 'view') {
                                ?>
                                  <form id="masuk_form" action="<?php echo site_url('Operate/laporan_search_graph_masuk/view') ?>" method="post">
                                <?php 
    
                                } else {
                                ?>
                                  <form id="masuk_form" action="<?php echo site_url('Operate/laporan_search_graph_masuk/') ?>" method="post">
                                <?php   
                                }
                                ?>
                                <?= csrf_field(); ?>

                                <input type="hidden" name="awal" id="awal">
                                <input type="hidden" name="akhir" id="akhir">

                                <div class="custom-control custom-radio">
                                  <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio" value="masuk" checked>
                                  <label for="customRadio1" class="custom-control-label">Barang Masuk</label>
                                </div>
                                <div class="custom-control custom-radio">
                                  <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio" value="keluar" >
                                  <label for="customRadio2" class="custom-control-label">Barang Keluar</label>
                                </div>

                                <script>
                                  $(document).ready(function() {
                                    
                                  })
                                </script>

                              </form>
                            </div>
                          </div>
                          <div class="row">

                            <div class="form-group col-md-6">
                              <label for="selectorBulan">Bulan Awal</label>
                              <select class="form-control select2" style="width: 100%;" id="selectorBulan">
                                <option value="1"> Januari </option>
                                <option value="2"> Februari </option>
                                <option value="3"> Maret </option>
                                <option value="4"> April </option>
                                <option value="5"> Mei </option>
                                <option value="6"> Juni </option>
                                <option value="7"> Juli </option>
                                <option value="8"> Agustus </option>
                                <option value="9"> September </option>
                                <option value="10"> Oktober </option>
                                <option value="11"> November </option>
                                <option value="12"> Desember </option>
                              </select>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="selectorTahun">Tahun Awal </label>
                              <select class="form-control select2" style="width: 100%;" id="selectorTahun">
                                <?php foreach ($graphMasukSelectTahun as $row) { ?>
                                  <option value="<?= $row->tahun ?>">
                                    <?php
                                    echo $row->tahun
                                    ?>
                                  </option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>


                          <div class="row">
                            <div class="form-group col-md-6">
                              <label for="selectorBulanAkhir">Bulan Akhir</label>
                              <select class="form-control select2" style="width: 100%;" id="selectorBulanAkhir">
                                  <option value="1"> Januari </option>
                                  <option value="2"> Februari </option>
                                  <option value="3"> Maret </option>
                                  <option value="4"> April </option>
                                  <option value="5"> Mei </option>
                                  <option value="6"> Juni </option>
                                  <option value="7"> Juli </option>
                                  <option value="8"> Agustus </option>
                                  <option value="9"> September </option>
                                  <option value="10"> Oktober </option>
                                  <option value="11"> November </option>
                                  <option value="12"> Desember </option>
                              </select>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="selectorTahunAkhir">Tahun Akhir </label>
                              <select class="form-control select2" style="width: 100%;" id="selectorTahunAkhir">
                                <?php foreach ($graphMasukSelectTahun as $row) { ?>
                                  <option value="<?= $row->tahun ?>">
                                    <?php
                                    echo $row->tahun
                                    ?>
                                  </option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>

                          <div class="row">
                            <div class="form-group col-md-6">
                              <button id="refresh" class="btn btn-info">Cari</button>
                            </div>
                          </div>

                          <div>
                            <p id="test">
                              loading
                            </p>
                          </div>


                         
                          <script>
                            $(document).ready(function() {
                              var myTahun = 2022;
                              var myChart;

                              <?php
                              if ($state == 'normal') {

                              ?>
                                var dataChosen = [
                                  <?php foreach ($graphMasuk as $row) { ?> {
                                      "bulan": <?= $row->bulan ?>,
                                      "value": <?= abs($row->value) ?>,
                                      "nama": '<?= $row->nama ?>',
                                      "tahun": '<?= $row->tahun ?>'
                                    },
                                  <?php } ?>
                                ]

                              <?php } else if ($state == 'masuk') { ?>
                                var dataChosen = [
                                  <?php foreach ($search as $row) { ?> {
                                      "x": '<?php 
                                      // $row->bulan 
                                       if ($row->bulan == '1'){
                                        echo "January";
                                       } else if ($row->bulan == '2'){
                                        echo "February";
                                       } else if ($row->bulan == '3'){
                                        echo "March";
                                       } else if ($row->bulan == '4'){
                                        echo "April";
                                       } else if ($row->bulan == '5'){
                                        echo "May";
                                       } else if ($row->bulan == '6'){
                                        echo "June";
                                       } else if ($row->bulan == '7'){
                                        echo "July";
                                       } else if ($row->bulan == '8'){
                                        echo "August";
                                       } else if ($row->bulan == '9'){
                                        echo "September";
                                       } else if ($row->bulan == '10'){
                                        echo "October";
                                       } else if ($row->bulan == '11'){
                                        echo "November";
                                       } else if ($row->bulan == '12'){
                                        echo "December";
                                       }  
                                      
                                      ?>',
                                      "y": <?= abs($row->value) ?>,
                                      "nama": '<?= $row->nama ?>',
                                      "tahun": '<?= $row->tahun ?>'
                                    },
                                  <?php } ?>
                                ]
                              <?php } ?>


                              let filteredData;

                              console.log(dataChosen, "test");

                              $("#test").text("");

                              var dataMasuk = [
                                <?php foreach ($graphMasuk as $row) { ?> {
                                    "bulan": <?= $row->bulan ?>,
                                    "value": <?= abs($row->value) ?>,
                                    "nama": '<?= $row->nama ?>'
                                  },
                                <?php } ?>
                              ]


                              const monthNames = ["January", "February", "March", "April", "May", "June",
                                "July", "August", "September", "October", "November", "December"
                              ];
                              let holderLabel = [];
                              let holderData = [300, 200, 100];
                              let holderData2 = [300, 0, 100];

                              // bikin dlu berapa bulan
                              dataChosen.map(x => {
                                if (holderLabel.includes(x.x)) {

                                } else {
                                  holderLabel.push(x.x);
                                }
                              })

                              // definisikan barang2nya
                              jenisBarang = [];
                              let hitung = 0;
                              dataChosen.map(x => {
                                if (jenisBarang.includes(x.nama)) {

                                } else {
                                  jenisBarang.push(x.nama);
                                }
                              })
                              // console.log(jenisBarang);

                              // restrukturisasi array ulang
                              myData = [];
                              jenisBarang.map((el, e) => {
                                myData.push(dataChosen.filter(a => a.nama == el));
                              })

                              function random_rgba() {
                                  var o = Math.round, r = Math.random, s = 255;
                                  return 'rgba(' + o(r()*s) + ',' + o(r()*s) + ',' + o(r()*s) + ')';
                              }
                              
                              // console.log(myData);
                              let temproraryObj = [];

                              myData.map( (x, e) => {
                                console.log(x[0], "last step");
                                console.log(e, "count");

                                let dataset = [];
                                let temporary = {
                                  label: '',
                                  backgroundColor: '',
                                  borderColor: '',
                                  data: null,
                                };
                                let color = random_rgba(); 

                                const filledMonths = x.map((month) => month.x);
                                
                                dataset = holderLabel.map(month => {
                                  const indexOfFilledData = filledMonths.indexOf(month);
                                  if (indexOfFilledData !== -1) return x[indexOfFilledData].y;
                                  return null;
                                });
                                console.log(dataset, e);

                                temporary = {
                                    label: x[0].nama,
                                    backgroundColor: color,
                                    borderColor: color,
                                    data: dataset,
                                }
                                // // console.log(temporary);
                                temproraryObj.push(temporary);

                              })
                              console.log(temproraryObj,"muncul");

                              // const labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];
                              // const dataku = [{'x':'Apr', 'y':40,"nama":"Mika","tahun":"2022"},{'x':'July', 'y':70,"nama":"Mika","tahun":"2022"},{'x':'Dec', 'y':120,"nama":"Mika","tahun":"2022"}];
                              // const dataku = [{"x":"March","y":200,"nama":"Mika","tahun":"2022"},{"x":"May","y":100,"nama":"Mika","tahun":"2022"}];
                              // console.log(holderLabel);
                              

                              const data = {
                                labels: holderLabel,
                                datasets: temproraryObj
                              };

                              const config = {
                                type: 'bar',
                                data: data,
                                options: {
                                  scales: {
                                    y: {
                                      beginAtZero: true
                                    }
                                  }
                                },
                              };
                              myChart = new Chart(
                                document.getElementById('myChart'),
                                config
                              );


                              // new list
                              $("#refresh").on('click', function() {
                                var range = [];
                                var rangeTahun = [];
                                var bulanAwal = parseInt($("#selectorBulan").val());
                                var bulanAkhir = parseInt($("#selectorBulanAkhir").val());
                                var tahunAwal = parseInt($("#selectorTahun").val());
                                var tahunAkhir = parseInt($("#selectorTahunAkhir").val());

                                var tahun_start = tahunAwal + "-" + bulanAwal + "-01 00:00:00"
                                var tahun_akhir = tahunAkhir + "-" + bulanAkhir + "-28 23:59:00"

                                $("#awal").val(tahun_start);
                                $("#akhir").val(tahun_akhir);

                                $("#masuk_form").submit();
                                // // range.push(bulanAwal)
                                // for (let i = bulanAwal; i <= bulanAkhir; i++) {
                                //   range.push(i)
                                // }
                                // for (let i = tahunAwal; i <= tahunAkhir; i++) {
                                //   rangeTahun.push(i)
                                // }

                                // console.log('array bulan',range);
                                // console.log('array tahun',rangeTahun);

                              })


                              <?php if ($state == 'normal') { ?>
                                holderLabel.length = 0;
                                holderData.length = 0;
                                dataChosen.map(a => {
                                  holderLabel.push(a.nama);
                                  holderData.push(a.value);
                                })
                                data.labels = holderLabel;
                                data.datasets.data = holderData;
                                myChart.update();
                              <?php } ?>

                            });
                          </script>

                        </div>

                        <div class="chart">
                          <canvas id="myChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                          <!-- <canvas id="myChart"></canvas> -->
                        </div>

                      </div>
                      <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
                        <div>

                          <div class="row">
                            <div class="form-group col-md-6">
                              <select class="form-control select2" style="width: 100%;" id="selectorBulan2">
                                <?php foreach ($graphKeluarSelect as $row) { ?>
                                  <option value="<?= $row->bulan ?>">
                                    <?php
                                    if ($row->bulan == 1) {
                                      echo "Januari";
                                    } else if ($row->bulan == 2) {
                                      echo "Februari";
                                    } else if ($row->bulan == 3) {
                                      echo "Maret";
                                    } else if ($row->bulan == 4) {
                                      echo "April";
                                    } else if ($row->bulan == 5) {
                                      echo "Mei";
                                    } else if ($row->bulan == 6) {
                                      echo "Juni";
                                    } else if ($row->bulan == 7) {
                                      echo "Juli";
                                    } else if ($row->bulan == 8) {
                                      echo "Agustus";
                                    } else if ($row->bulan == 9) {
                                      echo "September";
                                    } else if ($row->bulan == 10) {
                                      echo "Oktober";
                                    } else if ($row->bulan == 11) {
                                      echo "November";
                                    } else if ($row->bulan == 12) {
                                      echo "Desember";
                                    }
                                    ?>
                                  </option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="form-group col-md-6">
                              <select class="form-control select2" style="width: 100%;" id="selectorTahun2">
                                <?php foreach ($graphKeluarSelectTahun as $row) { ?>
                                  <option value="<?= $row->tahun ?>">
                                    <?php
                                    echo $row->tahun
                                    ?>
                                  </option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>

                          <div>
                            <p id="test2">
                              loading
                            </p>
                          </div>

                          <script>
                            $(document).ready(function() {
                              var myTahun2 = 2022;
                              var myChart2;
                              var dataChosen2 = [
                                <?php foreach ($graphKeluar as $row) { ?> {
                                    "bulan": <?= $row->bulan ?>,
                                    "value": <?= $row->value ?>,
                                    "nama": '<?= $row->nama ?>',
                                    "tahun": '<?= $row->tahun ?>'
                                  },
                                <?php } ?>
                              ]
                              let filteredData2;

                              $("#test2").text("");

                              var dataKeluar = [
                                <?php foreach ($graphKeluar as $row) { ?> {
                                    "bulan": <?= $row->bulan ?>,
                                    "value": <?= $row->value ?>,
                                    "nama": '<?= $row->nama ?>'
                                  },
                                <?php } ?>
                              ]

                              let holderLabel2 = [];
                              let holderData2 = [];

                              const data2 = {
                                labels: holderLabel2,
                                datasets: [{
                                  label: 'Grafik Barang Keluar',
                                  backgroundColor: 'rgb(191, 215, 181)',
                                  borderColor: 'rgb(191, 215, 181)',
                                  data: holderData2,
                                }]
                              };

                              const config = {
                                type: 'bar',
                                data: data2,
                                options: {
                                  scales: {
                                    y: {
                                      beginAtZero: true
                                    }
                                  }
                                },
                              };
                              myChart2 = new Chart(
                                document.getElementById('myChart2'),
                                config
                              );

                              $("#selectorTahun2").on('change', function() {
                                myTahun2 = $(this).find(":selected").val();
                                console.log(myTahun2);
                              })

                              $("#selectorBulan2").on('change', function() {
                                const date2 = new Date();

                                let selected2 = $(this).find(":selected").val();
                                filteredData2 = dataChosen2.filter(a => a.bulan == parseInt(selected2) && a.tahun == parseInt(myTahun2))

                                // $("#test2").text(JSON.stringify(filteredData2));
                                // pilah ke array label dan data
                                holderLabel2.length = 0;
                                holderData2.length = 0;
                                filteredData2.map(a => {
                                  holderLabel2.push(a.nama);
                                  holderData2.push(a.value * -1);
                                })

                                data2.labels = holderLabel2;
                                data2.datasets.data = holderData2;

                                myChart2.update();
                              });



                            });
                          </script>

                        </div>

                        <div class="chart">
                          <canvas id="myChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                          <!-- <canvas id="myChart"></canvas> -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

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




        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Laporan</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-5 col-sm-3">
                    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                      <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="true">Laporan Gudang</a>
                      <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile" aria-selected="false">Laporan Barang Masuk</a>
                      <a class="nav-link" id="vert-tabs-messages-tab" data-toggle="pill" href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages" aria-selected="false">Laporan Barang Keluar</a>
                    </div>
                  </div>
                  <div class="col-7 col-sm-9">
                    <div class="tab-content" id="vert-tabs-tabContent">
                      <div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                        <button onclick="exportTableToExcel('tblData','laporan')" id="importAll" class="btn btn-info">Export to Excel</button>
                        <table id="tblData" class="table table-head-fixed text-nowrap">
                          <thead>
                            <tr>
                              <th>Id</th>
                              <th>Kode Barang</th>
                              <th>Nama Barang</th>
                              <th>Jumlah</th>
                              <th>Satuan Volume</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $count = 1;
                            if ($all == null) { ?>
                              <tr>
                                <td>Data Tidak Tersedia</td>
                              </tr>
                            <?php }
                            foreach ($all as $row) {

                            ?>
                              <tr>
                                <td><?= $count ?></td>
                                <td> <?= $row->kd_barang; ?> </td>
                                <td> <?= $row->nama; ?> </td>
                                <td> <?php if ($row->total == null) {
                                        echo "0";
                                      } else {
                                        echo $row->total;
                                      } ?> </td>
                                <td> <?= $row->volume ?> </td>
                              </tr>
                            <?php
                              $count++;
                            }
                            ?>

                          </tbody>
                        </table>
                      </div>
                      <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
                        <button onclick="exportTableToExcel('tblmasuk','laporan')" id="importAll" class="btn btn-info">Export to Excel</button>
                        <table id="tblmasuk" class="table table-head-fixed text-nowrap">
                          <thead>
                            <tr>
                              <th>Id</th>
                              <th>Tanggal</th>
                              <th>Nama Barang</th>
                              <th>Jumlah</th>
                              <th>Satuan Volume</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $count = 1;
                            if ($masuk == null) { ?>
                              <tr>
                                <td>Data Tidak Tersedia</td>
                              </tr>
                            <?php }
                            foreach ($masuk as $row) {

                            ?>
                              <tr>
                                <td><?= $count ?></td>
                                <td> <?= $row->tanggal; ?> </td>
                                <td> <?= $row->nama; ?> </td>
                                <td> <?= $row->value ?> </td>
                                <td> <?= $row->volume ?> </td>

                              </tr>
                            <?php
                              $count++;
                            }
                            ?>

                          </tbody>
                        </table>
                      </div>
                      <div class="tab-pane fade" id="vert-tabs-messages" role="tabpanel" aria-labelledby="vert-tabs-messages-tab">
                        <button onclick="exportTableToExcel('tblkeluar','laporan')" id="importAll" class="btn btn-info">Export to Excel</button>
                        <table id="tblkeluar" class="table table-head-fixed text-nowrap">
                          <thead>
                            <tr>
                              <th>Id</th>
                              <th>Tanggal</th>
                              <th>Nama Barang</th>
                              <th>Jumlah</th>
                              <th>Satuan Volume</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $count = 1;
                            if ($keluar == null) { ?>
                              <tr>
                                <td>Data Tidak Tersedia</td>
                              </tr>
                            <?php }
                            foreach ($keluar as $row) {

                            ?>
                              <tr>
                                <td><?= $count ?></td>
                                <td> <?= $row->tanggal; ?> </td>
                                <td> <?= $row->nama; ?> </td>
                                <td> <?= $row->value ?> </td>
                                <td> <?= $row->volume ?> </td>

                              </tr>
                            <?php
                              $count++;
                            }
                            ?>

                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

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