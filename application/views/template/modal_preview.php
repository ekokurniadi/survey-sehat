<section class="contact_us">
    <div class="modal fade" id="modalPreview" tabindex="-1" aria-labelledby="modalPreview" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="<?php echo base_url('image/survey-sehat.jpeg') ?>" width="10%" alt="">
                    <h5 class="modal-title" id="exampleModalLabel">Foto KTP Anda</h5>

                </div>
                <div class="modal-body">
                    <?php $id = isset($_SESSION['id']) ? $_SESSION['id'] : "" ?>
                    <?php $gambar = $this->db->get_where('user', array('id' => $id))->row() ?>
                    <form method="POST" id="form_gantiFoto" class="needs-validation" novalidate="" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-center mb-3">
                                <img id="output_ktp" src="<?php echo base_url('image/') . $gambar->foto_ktp ?>" class="img-responsive" width="60%">
                            </div>
                        </div>
                    </form>

                    <div class="modal-footer">
                        <button type="button" onclick="closePreview();" class="btn btn-secondary" data-dismiss="#modalPekerjaan">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function closePreview(){
        $('#modalPreview').modal('hide');
    }
</script>