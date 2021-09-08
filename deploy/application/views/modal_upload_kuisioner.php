<style>
  body .modal-dialog {
    max-width: 70%;

  }
</style>
<div class="modal fade" id="UploadKuisioner" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Data Kuisioner</h5>
        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form_" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="" class="label-control col-md-2">Pilih File Excel</label>
            <input type="file" accept=".xlsx" required class="form-control" id="userfile" autofocus name="userfile">
          </div>
          <div class="form-group">
            <button type="button" id='submitBtn' name="process" class="btn btn-info btn-flat">Start Upload</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
              Cancel
            </button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

<script>
  var form_ = new Vue({
    el: '#form_',
    data: {
      error: false,
      error_list: ''
    },
  })
  $('#submitBtn').click(function() {
    if ($('#userfile').val() == "") {
      validationError();
    } else {

      var values = new FormData($('#form_')[0]);
      $.ajax({
        beforeSend: function() {
          $('#submitBtn').html('<i class="fa fa-spinner fa-spin"></i> Process');
          $('#submitBtn').attr('disabled', true);
          form_.error = false;
          form_.error_list = '';
        },
        enctype: 'multipart/form-data',
        url: '<?= base_url('kuisioner/upload_kuisioner_action') ?>',
        type: "POST",
        data: values,
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'JSON',
        success: function(response) {
          if (response.status == 'sukses') {
            window.location = response.link;
          } else {
            $('#submitBtn').attr('disabled', false);
          }
          $('#submitBtn').html('Start Upload');
        },
        error: function() {
          alert("Something Went Wrong !");
          $('#submitBtn').html('Start Upload');
          $('#submitBtn').attr('disabled', false);

        }
      });
    }
  })
</script>
<div style="margin-top: 8px" id="message">
  <?php
  if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
  ?>
    <script>
      Swal.fire({
        icon: '<?php echo $_SESSION['tipe'] ?>',
        title: 'Notification',
        text: '<?php echo $_SESSION['pesan'] ?>',

      })
    </script>
  <?php
  }
  $_SESSION['pesan'] = '';

  ?>
</div>