<section class="contact_us">
    <div class="modal fade" id="modalUploadFoto" tabindex="-1" aria-labelledby="modalUploadFoto" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="<?php echo base_url('image/survey-sehat.jpeg') ?>" width="10%" alt="">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Foto Anda</h5>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="form_gantiFoto" class="needs-validation" novalidate="" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-center mb-3">
                                <div>
                                    <h6>Preview</h6>  
                                    <img id="output" class="img-responsive" width="60%">   
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input type="file" class="tanya" name="userFoto" id="userFoto" onchange="loadFile(event)">
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-danger btn-sm btn-flat" id="btnSaveImage" type="button">Save</button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</section>

<script>
    var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('output');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);

    };

    $('#btnSaveImage').click(function() {
        var form = new FormData();
        var files = $('#userFoto')[0].files;

        if (files.length > 0) {
            form.append('foto_profil', files[0]);
            $.ajax({
                enctype: 'multipart/form-data',
                url: '<?= base_url('publics/updateFotoProfile') ?>',
                type: 'POST',
                data: form,
                processData: false,
                contentType: false,
                cache: false,
                dataType: 'JSON',
                success: function(response) {
                    console.log(response.data);
                    if (response.status == 200) {
                        $('#imgUser1').attr("src", response.data);
                        $('#imgUser2').attr("src", response.data);
                        $('#imgUser3').attr("src", response.data);
                        $('#imgUser4').attr("src", response.data);
                        $('#modalUploadFoto').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: 'Notification',
                            text: 'Berhasil memperbarui foto',

                        });
                    } else {
                        gagal_send();
                    }
                }
            });
        } else {
            validationError();
        }
    });
</script>