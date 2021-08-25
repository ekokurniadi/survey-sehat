<section class="contact_us">
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 mb-2">
                <img src="<?php echo base_url() ?>image/default/images/home/icon_05.gif" width="30px" alt="">
                <strong>Kontak Kami</strong>
            </div>
        </div>
    </div>
    <?php $tentangKami = $this->db->get('profil_perusahaan') ?>
    <div class="container" id="contactUs">
        <div class="row container-perkenalan mb-3">
            <div class="col-md-6">
                <h5>Survey Sehat</h5>
                <div class="contact-icon d-flex">
                    <div class="icon-wrapper1">
                        <i class="fa fa-map-marker"></i>
                    </div>
                    <div class="contact-isi"><?php echo $tentangKami->row()->alamat?></div>
                </div>
                <div class="contact-icon d-flex">
                    <div class="icon-wrapper2">
                        <i class="fa fa-phone"></i>
                    </div>
                    <div class="contact-isi">Telp :<?php echo $tentangKami->row()->telp?> <br>
                        WA : <?php echo $tentangKami->row()->whatsapp?> (WhatsApp Only)
                    </div>

                </div>
                <div class="contact-icon d-flex mb-3">
                    <div class="icon-wrapper3">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <div class="contact-isi"><?php echo $tentangKami->row()->email?></div>
                </div>
            </div>
            <div class="col-md-6">
                <table style="vertical-align: top;" width="100%">
                    <form method="post" enctype="multipart/form-data" id="form_">
                        <tr>
                            <td><input type="text" required class="tanya" name="namakamu" id="namakamu" placeholder="Nama"></td>
                        </tr>
                        <tr>
                            <td><input type="text" required class="tanya" name="ema" id="ema" placeholder="Email"></td>
                        </tr>
                        <tr>
                            <td><input type="text" required class="tanya" name="sbj" id="sbj" placeholder="Subject"></td>
                        </tr>
                        <tr>
                            <td>
                                <textarea name="tanyaan" id="tanyaan" required class="form-control tanya" cols="30" rows="5" placeholder="Pesan"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button type="button" id="submitContact" class="btn btn-flat btn-block btn-primary mt-2"><span class="fa fa-send"></span> Kirim</button>
                            </td>
                        </tr>
                </table>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="maps">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126646.2570814114!2d112.64264295337337!3d-7.275443785590945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbf8381ac47f%3A0x3027a76e352be40!2sSurabaya%2C%20Kota%20SBY%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1629556869133!5m2!1sid!2sid" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>

</section>



<script> 
    function kosongkan() {
        $('#namakamu').val("");
        $('#ema').val("");
        $('#sbj').val("");
        $('#tanyaan').val("");
    }

    $('#submitContact').click(function() {
        var form = $('#form_').serializeArray();
        var nilai = {}
        for (fields of form) {
            nilai[fields.name] = fields.value;
        }
        console.log(form);
        var namakamu = $('#namakamu').val();
        var ema = $('#ema').val();
        var sbj = $('#sbj').val();
        var tanyaan = $('#tanyaan').val();

        if (namakamu === "" || namakamu === undefined || sbj === "" || sbj === undefined || ema === "" || ema === undefined || tanyaan === "" || tanyaan === undefined) {
            validationError();
        } else {
            $.ajax({
                beforeSend: function() {
                    $('#submitContact').attr('disabled', true);
                    $('#submitContact').html('<i class="fa fa-spinner fa-spin"></i> Process');
                },
                url: '<?= base_url('publics/saveMessageContact') ?>',
                type: 'POST',
                data: nilai,
                cache: false,
                dataType: 'JSON',
                success: function(response) {
                    $('#submitContact').html('<span class="fa fa-send"></span> Kirim');
                    $('#submitContact').attr('disabled', false);
                    if (response.status == 'sukses') {
                        success_send();
                        kosongkan();
                    } else {
                        $('#submitContact').attr('disabled', false);
                        gagal_send();
                    }
                },
                error: function() {
                    gagal_send();
                    alert("Gagal");
                    $('#submitContact').attr('disabled', false);
                }
            });
        }
    });
</script>

