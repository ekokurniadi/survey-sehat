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
<script type="text/javascript" src="<?= base_url() ?>assets/tinymce/tinymce.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js" integrity="sha512-k6/Bkb8Fxf/c1Tkyl39yJwcOZ1P4cRrJu77p83zJjN2Z55prbFHxPs9vN7q3l3+tSMGPDdoH51AEU8Vgo1cgAA==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" integrity="sha512-3JRrEUwaCkFUBLK1N8HehwQgu8e23jTH4np5NHOmQOobuC4ROQxFwFgBLTnhcnQRMs84muMh0PnnwXlPq5MGjg==" crossorigin="anonymous" />


<script>
  function success_send() {
    Swal.fire({
      title: 'Terima kasih, Pesan berhasil dikirimkan',
      width: 600,
      padding: '3em',
      background: '#fff url(https://sweetalert2.github.io/images/trees.png)',
      backdrop: `
    rgba(0,0,123,0.4)
    url("https://sweetalert2.github.io/images/nyan-cat.gif")
    left top
    no-repeat
  `
    })
  }

  function gagal_send() {
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Something went wrong!',
      footer: '<a href="">Why do I have this issue?</a>'
    })
  }

  function validationError() {
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Silahkan isi data dengan lengkap !',
      footer: '<a href="">Why do I have this issue?</a>'
    })
  }
</script>

<script type="text/javascript">
  tinymce.init({
    selector: ".textarea_editor",
    document_base_url: '<?php echo base_url() ?>assets/source/',
    relative_urls: false,
    remove_script_host: false,
    branding: false,
    plugins: [
      "advlist autolink link image lists charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
      "table contextmenu directionality emoticons paste textcolor Imagetools responsivefilemanager code"
    ],
    toolbar1: "undo redo | bold italic underline | responsivefilemanager | link unlink anchor | image media",
    image_advtab: true,
    height: '300px',
    setup: function(editor) {
      editor.on('change', function() {
        tinymce.triggerSave();
      });
    },
    // Disable branding message, remove "Powered by TinyMCE"
    // branding: false


    external_filemanager_path: "<?= base_url() ?>assets/filemanager/",
    filemanager_title: "Responsive Filemanager",
    external_plugins: {
      "filemanager": "<?php echo base_url() ?>assets/filemanager/plugin.min.js"
    }
  });
</script>

</body>

</html>