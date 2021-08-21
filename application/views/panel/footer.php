<footer class="main-footer">
  <div class="footer-left">
    Copyright &copy; <?php echo date('Y') ?> Made with <div class="fa fa-heart" style="color:red;"></div><a href="https://gocodings.web.app"> www.gocodings.web.app</a>
  </div>
  <div class="footer-right">
    2.3.0
  </div>
</footer>
</div>
</div>

<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/stisla.js"></script>


<!-- load script chart js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<!-- Template JS File -->
<script src="<?php echo base_url() ?>/assets/js/scripts.js"></script>
<script src="<?php echo base_url() ?>/assets/js/custom.js"></script>

<!-- Page Specific JS File -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<script src=" https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src=" https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script src="assets/js/page/forms-advanced-forms.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  // In your Javascript (external .js resource or <script> tag)
  $(document).ready(function() {
    // load select2
    $('#select2').select2({
      width: 'resolve',
      placeholder: "Select an option"
    });

  });
  $(document).ready(function() {
    // load select2
    $('#kode_barang').select2({
      width: 'resolve',
      placeholder: "Select an option"
    });

  });

  $(function() {
    $('#datetimepicker3').datetimepicker({
      defaultDate: new Date(),
      format: 'YYYY-MM-DD HH:mm:ss'
    });
  });

  $('.datepicker').datepicker({
    uiLibrary: 'bootstrap4'
  });
  $('#datepicker2').datepicker({
    uiLibrary: 'bootstrap4'
  });
</script>

<script>
  // var editor = new FroalaEditor('#keterangan')
  // var sistem_operasi = new FroalaEditor('#sistem_operasi')
  // var pengenalan_perusahaan = new FroalaEditor('#pengenalan_perusahaan')
  // var isi_visi_perusahaan = new FroalaEditor('#isi_visi_perusahaan')
  // var isi_misi_perusahaan = new FroalaEditor('#isi_misi_perusahaan')
  // var detail = new FroalaEditor('#detail')
  // var langkah = new FroalaEditor('#langkah')
  // var poin_dan_hadiah = new FroalaEditor('#poin_dan_hadiah')
  // var ketentuan = new FroalaEditor('#ketentuan')
  // var tentang_perusahaan = new FroalaEditor('#tentang_perusahaan')
  // var alamat = new FroalaEditor('#alamat')
</script>
<script type="text/javascript" src="<?= base_url() ?>assets/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
  tinymce.init({
    selector: ".textarea_editor",
    branding: false,
    plugins: [
      "advlist autolink link image lists charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
      "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
    ],
    toolbar1: "undo redo | bold italic underline",
    image_advtab: true,
    height: '300px',
    // Disable branding message, remove "Powered by TinyMCE"
    // branding: false


    external_filemanager_path: "<?= base_url() ?>assets/filemanager/",
    filemanager_title: "Responsive Filemanager",
    external_plugins: {
      "filemanager": "<?php echo base_url() ?>assets/filemanager/plugin.min.js"
    }
  });
</script>

<script>
  var ctx = document.getElementById('barChart').getContext('2d');
  var data_nama = [];
  var data_stok = [];

  $.post("<?php echo base_url('dashboard/get_data') ?>",
    function(data) {
      var obj = JSON.parse(data);
      $.each(obj, function(test, item) {
        data_nama.push(item.nama_barang);
        data_stok.push(item.qty);
      });

      var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
          labels: data_nama,
          datasets: [{
            label: 'Jumlah barang',
            data: data_stok,
            backgroundColor: [
              'rgba(75, 192, 192, 0.5)',
              'rgba(153, 102, 255, 0.5)',
              'rgba(255, 159, 64, 0.5)',
              'rgba(255, 99, 132, 0.5)',
              'rgba(54, 162, 235, 0.5)',
              'rgba(255, 206, 86, 0.5)',
              'rgba(75, 192, 192, 0.5)',
              'rgba(153, 102, 255, 0.5)',
              'rgba(255, 159, 64, 0.5)'
            ],
            borderColor: [
              'rgba(75, 192, 192, 0.5)',
              'rgba(153, 102, 255, 0.5)',
              'rgba(255, 159, 64, 0.5)',
              'rgba(255, 99, 132, 0.5)',
              'rgba(54, 162, 235, 0.5)',
              'rgba(255, 206, 86, 0.5)',
              'rgba(75, 192, 192, 0.5)',
              'rgba(153, 102, 255, 0.5)',
              'rgba(255, 159, 64, 0.5)'
            ],
            borderWidth: 1
          }]
        },
        options: {
          layout: {
            padding: {
              left: 0,
              right: 0,
              top: 0,
              bottom: 0
            }
          }
        }
      });

    });
</script>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js" integrity="sha512-k6/Bkb8Fxf/c1Tkyl39yJwcOZ1P4cRrJu77p83zJjN2Z55prbFHxPs9vN7q3l3+tSMGPDdoH51AEU8Vgo1cgAA==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" integrity="sha512-3JRrEUwaCkFUBLK1N8HehwQgu8e23jTH4np5NHOmQOobuC4ROQxFwFgBLTnhcnQRMs84muMh0PnnwXlPq5MGjg==" crossorigin="anonymous" />
<script>
  $('.timepicker').timepicker();
  var ctx2 = document.getElementById('barChart2').getContext('2d');
  var data_nama2 = [];
  var data_stok2 = [];

  $.post("<?php echo base_url('dashboard/get_data') ?>",
    function(data2) {
      var obj = JSON.parse(data2);
      $.each(obj, function(test, item) {
        data_nama2.push(item.nama_barang);
        data_stok2.push(item.qty);


      });

      var myChart2 = new Chart(ctx2, {
        type: 'bar',
        data: {
          labels: data_nama2,
          datasets: [{
            label: 'Jumlah barang',
            data: data_stok2,
            backgroundColor: [
              'rgba(75, 192, 192, 0.5)',
              'rgba(153, 102, 255, 0.5)',
              'rgba(255, 159, 64, 0.5)',
              'rgba(255, 99, 132, 0.5)',
              'rgba(54, 162, 235, 0.5)',
              'rgba(255, 206, 86, 0.5)',
              'rgba(75, 192, 192, 0.5)',
              'rgba(153, 102, 255, 0.5)',
              'rgba(255, 159, 64, 0.5)'
            ],
            borderColor: [
              'rgba(75, 192, 192, 0.5)',
              'rgba(153, 102, 255, 0.5)',
              'rgba(255, 159, 64, 0.5)',
              'rgba(255, 99, 132, 0.5)',
              'rgba(54, 162, 235, 0.5)',
              'rgba(255, 206, 86, 0.5)',
              'rgba(75, 192, 192, 0.5)',
              'rgba(153, 102, 255, 0.5)',
              'rgba(255, 159, 64, 0.5)'
            ],
            borderWidth: 1
          }]
        },
        options: {
          layout: {
            padding: {
              left: 0,
              right: 0,
              top: 0,
              bottom: 0
            }
          }
        }
      });

    });
</script>
</body>

</html>