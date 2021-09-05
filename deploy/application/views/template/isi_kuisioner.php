<section class="kuis">
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 mb-2">
                <img src="<?php echo base_url() ?>image/default/images/home/icon_05.gif" width="30px" alt="">
                <strong>Pengisian Kuisioner</strong>
            </div>
        </div>
        <div class="row container-perkenalan mt-2 mb-3">
            <div class="col-md-12">
                <p><?= $header->row()->pertanyaan ?></p>
            </div>
            <div class="col-md-12 left-lines py-2">
                <?php $kuis_jawaban = $this->db->get_where('kuisioner_jawaban', array('id_kuisioner' => $header->row()->kode_kuisioner)) ?>
                <form method="post" enctype="multipart/form-data" id="form_">
                    <?php foreach ($kuis_jawaban->result() as $rowx) { ?>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="jawaban" name="jawaban" value="<?= $rowx->id ?>">
                            <label class="form-check-label" for="exampleRadios">
                                <?= $rowx->jawaban ?>
                            </label>
                        </div>
                    <?php } ?>
                    <div class="d-flex justify-content-start mt-2">
                        <button type="button" id="btnSubmit" class="btn btn-primary btn-sm btn-flat">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    function valButton(btn) {
        var cnt = -1;
        for (var i = btn.length - 1; i > -1; i--) {
            if (btn[i].checked) {
                cnt = i;
                i = -1;
            }
        }
        if (cnt > -1) return btn[cnt].value;
        else return null;
    }
    $('#btnSubmit').click(function() {
        var values = {
            kode_kuisioner: '<?= $header->row()->kode_kuisioner ?>',
            session: '1'
        }
        var form = $('#form_').serializeArray();
        var btn = valButton(form_.jawaban);
        for (field of form) {
            values[field.name] = field.value;
        }
        if (btn == null) {
            validationError();
        } else {
            Swal.fire({
                title: 'Apakah Anda Yakin ?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: `Yes`,
                denyButtonText: `No`,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= base_url('publics/input_kuisioner_action') ?>',
                        type: 'POST',
                        data: values,
                        cache: false,
                        dataType: 'JSON',
                        success: function(response) {
                            window.location = '<?php echo base_url() ?>publics';
                            Swal.fire('Saved!', '', 'success');
                        },
                        error: function() {
                            gagal_send();
                        }
                    });
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            })
        }

    });
</script>