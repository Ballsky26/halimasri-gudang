  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0-rc
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<!--<script src="/assets/plugins/jquery/jquery.min.js"></script>-->
<!-- Bootstrap -->
<script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="/assets/dist/js/adminlte.js"></script>

<!-- bs-custom-file-input -->
<script src="/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Select2 -->
<script src="/assets/plugins/select2/js/select2.full.min.js"></script>
<!-- OPTIONAL SCRIPTS -->
<!-- <script src="/assets/plugins/chart.js/Chart.min.js"></script> -->
<!-- AdminLTE for demo purposes -->
<!-- <script src="/assets/dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/assets/dist/js/pages/dashboard3.js"></script>
<!-- Toastr -->
<script src="/assets/plugins/toastr/toastr.min.js"></script>

<script>
  function exportTableToExcel(tableID, filename = ''){
      var downloadLink;
      var dataType = 'application/vnd.ms-excel';
      var tableSelect = document.getElementById(tableID);
      var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
      
      // Specify file name
      filename = filename?filename+'.xls':'excel_data.xls';
      
      // Create download link element
      downloadLink = document.createElement("a");
      
      document.body.appendChild(downloadLink);
      
      if(navigator.msSaveOrOpenBlob){
          var blob = new Blob(['\ufeff', tableHTML], {
              type: dataType
          });
          navigator.msSaveOrOpenBlob( blob, filename);
      }else{
          // Create a link to the file
          downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
      
          // Setting the file name
          downloadLink.download = filename;
          
          //triggering the function
          downloadLink.click();
      }
    }
</script>

<script>
  // script untuk operate view
  $(document).ready(function(){
      // print
    
    if ($("#label23").text() == 'Supplier'){
      setTimeout(function(){
        $("#customSwitch23").click();
      },100);
    } else {

    }

    // inisiasi input dan select
    var label1 = $("#customSwitch23");
    var select1 = $("#selectSupplier");
    var select2 = $("#selectDistributor");
    var tombol = $("#addButton"); 
    var submitButton = $("#submitOrder"); 
    var objTemp = {};
    var tempTabel = [];

    // hilangkan holder
    $(".holderDis").hide();
    $(".holderSup").hide();
    if (label1.is(':checked') == false){
      $("#label23").text("Distributor");
      
      select1.prop('disabled', 'disabled');
      select2.prop('disabled', false);
      $("#container1").show();
      $("#container2").hide();
    }

    // on label change
    $("#customSwitch23").on('change', function() {
      // hilangkan isi temp form
      $("#jenis").val("");
      $("#pic").val("");
      $("#alamat").val("");

      if ($(this).is(':checked')) {
        switchStatus = $(this).is(':checked');
        $("#label23").text("Supplier");
        $("#container2").show();
        $("#container1").hide();
        select2.prop('disabled', 'disabled');
        select1.prop('disabled', false);  
        $("#typeNya").val("sup");    
      }
      else {
        $("#label23").text("Distributor");
        $("#container1").show();
        $("#container2").hide();
        select1.prop('disabled', 'disabled');
        select2.prop('disabled', false);
        $("#typeNya").val("dist");  
      }
    });

    // label buat isi barang ke form
    $("#selectBarang").on('change', function() {
      var nilai = $(this).val();
      var temp = $("#valueBar"+nilai).val().split(",")
      objTemp = {"id_barang":nilai,"nama_barang":temp[0],"jenis_barang":temp[1],"label_volume":temp[2]}
      $("#namaBar").val(temp[0]);
      $("#jenisBar").val(temp[1]);
      $("#labelVolume").text(temp[2]);
    });
    // command isi nilai ke form
    $("#volume").on('keyup', function() {
      objTemp.jumlah_barang = $(this).val();
    });

    // select supplier populate detail
    select2.on('change', function() {
      var nilai = $(this).val();
      var temp = $("#valueSup"+nilai).val().split(",")
      $("#jenis").val(temp[0]);
      $("#pic").val(temp[1]);
      $("#alamat").val(temp[2]);
    });

    select1.on('change', function() {
      var nilai = $(this).val();
      var temp = $("#valueDis"+nilai).val().split(",")
      $("#jenis").val(temp[0]);
      $("#pic").val(temp[1]);
      $("#alamat").val(temp[2]);
    });

    tombol.on('click', function() {
        
        // check dlu apakah barangnya masih ada?
      // console.log(validasiJumlah);
      // console.log(objTemp);
      var stop = true;
      validasiJumlah.map(x => {
        if (x.id == objTemp.id_barang){
          if (parseInt(x.total) < parseInt(objTemp.jumlah_barang) ){
            // console.log("mohon stok barang tersebut tersisa"+x.total)
            $(document).Toasts('create', {
              class: 'bg-danger',
              title: 'Gagal',
              body: 'mohon stok '+objTemp.nama_barang+' tersebut tersisa '+x.total
            }) 
            stop = true;
            console.log(x.total +" < "+ objTemp.jumlah_barang+ " = "+ x.total == objTemp.id_barang  );
          } else {
            $(document).Toasts('create', {
              class: 'bg-success',
              title: 'Ready Stock',
              body: 'Stock '+objTemp.nama_barang+' Tersebut tersisa '+x.total
            })
            stop = false;
            console.log(x.total > objTemp.jumlah_barang );

            // kurangi jumlah di validator
            x.total = x.total - objTemp.jumlah_barang;
            console.log(x.total, "check")

          }

        }
      })
     
      if (stop == true){
        return false;
      }
        
      // check apakah semua form terisi?
      if ($("#volume").val() == "" || $("#namaBar").val() == "" || $("#jenisBar").val() == "" ){      
        $(document).Toasts('create', {
          class: 'bg-danger',
          title: 'Gagal',
          body: 'Pastikan jumlah dan form lain telah terisi.'
        })
      } else {
        disableSwitch();
        tempTabel.push(objTemp);
        refTable();
        console.log(tempTabel);

        // clear input
        clearInput();
      }
    });

    submitButton.on('click', function() {
      console.log($("#selectDistributor").val());
      // check apakah semua form terisi?
      if ($("#jenis").val() == "" || $("#pic").val() == "" || $("#alamat").val() == "" ){      
        $(document).Toasts('create', {
          class: 'bg-danger',
          title: 'Gagal',
          body: 'Pastikan receipt telah terisi terisi.'
        })
      } else if (jQuery.isEmptyObject(tempTabel) == true){    
        console.log(Object.keys(tempTabel));
        $(document).Toasts('create', {
          class: 'bg-danger',
          title: 'Gagal',
          body: 'Pastikan sudah mengisi barang.'
        })
      } else {
        // kalau ok submit langsung
        $("#holderAll").val(JSON.stringify(tempTabel))
        $('#formSubmit').submit();
      }
    });
    
    // matikan switch
    function disableSwitch() {
      $("#customSwitch23").prop('disabled', true);
    }

    function refTable() {
    // populate
    var tableBody = document.querySelector("#tabelDisplay tbody");
    $("#tbodyid").empty();
    populateTabel(tableBody, tempTabel);
    }

    function clearInput() {
      $("#namaBar").val("");
      $("#jenisBar").val("");
      $("#volume").val("");
      $("#labelVolume").text("");
    }

    function populateTabel(nl, data) {
      data.forEach((d, i) => {
        var tr = nl.insertRow(i);
        Object.keys(d).forEach((k, j) => { // Keys from object represent th.innerHTML
          var cell = tr.insertCell(j);
          cell.innerHTML = d[k]; // Assign object values to cells   
        });
        nl.appendChild(tr);
      })
    }

  });
</script>

<!-- generate kode -->
  <script>
    $(document).ready(function(){
      let x = Math.floor((Math.random() * 1000000) + 1);
      document.getElementById("kode").value = "BAR-"+x;
    });
  </script>


<script>
  // script untuk transaksi view
  $(document).ready(function(){
    var tbl = $(".tombol");
    tbl.on('click', function() {
      new_var = $(this).find('input').val();
      new_var =  new_var.split("|");
      // console.log(new_var[1]);
      
      var filtered = allDataLinked.filter(a => a.id_barang == parseInt(new_var[0]));
      $("#tagnya").text(new_var[1]);
      // console.log(filtered);

      var col = [];
      for (var i = 0; i < filtered.length; i++) {
          for (var key in filtered[i]) {
              if (col.indexOf(key) === -1) {
                  col.push(key);
              }
          }
      }

      var table = document.createElement("table");
      table.classList.add('table', 'table-head-fixed', 'text-nowrap', 'table_detail');

      // CREATE HTML TABLE HEADER ROW USING THE EXTRACTED HEADERS ABOVE.

      var tr = table.insertRow(-1);                   // TABLE ROW.

      for (var i = 0; i < col.length; i++) {
          var th = document.createElement("th");      // TABLE HEADER.
          th.innerHTML = col[i];
          tr.appendChild(th);
      }

      // ADD JSON DATA TO THE TABLE AS ROWS.
      for (var i = 0; i < filtered.length; i++) {

          tr = table.insertRow(-1);

          for (var j = 0; j < col.length; j++) {
              var tabCell = tr.insertCell(-1);
              console.log(filtered[i][col[j]].charAt(0));
              // cek dlu ada minus atau tidak
              var tempVar = filtered[i][col[j]];

              if (tempVar.charAt(0) == '-'){
                tempVar = parseInt(tempVar) * -1;
              } else if ( tempVar == 'sup' ) {
                tempVar = 'Barang Masuk';
              } else if ( tempVar == 'dist' ) {
                tempVar = 'Barang Keluar';
              }

              tabCell.innerHTML = tempVar;
          }
      }

        // FINALLY ADD THE NEWLY CREATED TABLE WITH JSON DATA TO A CONTAINER.
        var divContainer = document.getElementById("showData");
        divContainer.innerHTML = "";
        divContainer.appendChild(table);

    });
  });

</script>

<script>
$(function () {
  bsCustomFileInput.init();
});
</script>

<!-- Page specific script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })

  
  // BS-Stepper Init
  // document.addEventListener('DOMContentLoaded', function () {
  //   window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  // })

  // // DropzoneJS Demo Code Start
  // Dropzone.autoDiscover = false

  // // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  // var previewNode = document.querySelector("#template")
  // previewNode.id = ""
  // var previewTemplate = previewNode.parentNode.innerHTML
  // previewNode.parentNode.removeChild(previewNode)

  // var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
  //   url: "/target-url", // Set the url
  //   thumbnailWidth: 80,
  //   thumbnailHeight: 80,
  //   parallelUploads: 20,
  //   previewTemplate: previewTemplate,
  //   autoQueue: false, // Make sure the files aren't queued until manually added
  //   previewsContainer: "#previews", // Define the container to display the previews
  //   clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  // })

  // myDropzone.on("addedfile", function(file) {
  //   // Hookup the start button
  //   file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  // })

  // // Update the total progress bar
  // myDropzone.on("totaluploadprogress", function(progress) {
  //   document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  // })

  // myDropzone.on("sending", function(file) {
  //   // Show the total progress bar when upload starts
  //   document.querySelector("#total-progress").style.opacity = "1"
  //   // And disable the start button
  //   file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  // })

  // // Hide the total progress bar when nothing's uploading anymore
  // myDropzone.on("queuecomplete", function(progress) {
  //   document.querySelector("#total-progress").style.opacity = "0"
  // })

  // // Setup the buttons for all transfers
  // // The "add files" button doesn't need to be setup because the config
  // // `clickable` has already been specified.
  // document.querySelector("#actions .start").onclick = function() {
  //   myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  // }
  // document.querySelector("#actions .cancel").onclick = function() {
  //   myDropzone.removeAllFiles(true)
  // }
  // DropzoneJS Demo Code End
</script>

</body>
</html>
