<section class="contact_us">
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 mb-2">
                <img src="<?php echo base_url() ?>image/default/images/home/icon_05.gif" width="30px" alt="">
                <strong>Kontak Kami</strong>
            </div>
        </div>
    </div>
    <div class="container" id="contactUs">
        <div class="row container-perkenalan mb-3">
            <div class="col-md-6">
                <h5>Survey Sehat</h5>
                <div class="contact-icon d-flex">
                    <div class="icon-wrapper1">
                        <i class="fa fa-map-marker"></i>
                    </div>
                    <div class="contact-isi" v-html="alamat"></div>
                </div>
                <div class="contact-icon d-flex">
                    <div class="icon-wrapper2">
                        <i class="fa fa-phone"></i>
                    </div>
                    <div class="contact-isi">Telp :{{telp}} <br>
                        WA : {{wa}} (WhatsApp Only)
                    </div>

                </div>
                <div class="contact-icon d-flex mb-3">
                    <div class="icon-wrapper3">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <div class="contact-isi">{{email}}</div>
                </div>
            </div>
            <div class="col-md-6">
                <table style="vertical-align: top;" width="100%">
                    <form method="post" enctype="multipart/form-data" id="form_">
                        <tr>
                            <td><input type="text" required class="tanya" name="nama" id="nama" placeholder="Nama"></td>
                        </tr>
                        <tr>
                            <td><input type="text" required class="tanya" name="email" id="email" placeholder="Email"></td>
                        </tr>
                        <tr>
                            <td><input type="text" required class="tanya" name="subject" id="subject" placeholder="Subject"></td>
                        </tr>
                        <tr>
                            <td>
                                <textarea name="prt" id="prt" required class="form-control tanya" cols="30" rows="5" placeholder="Pesan"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button type="button" id="submitMessage" class="btn btn-flat btn-block btn-primary mt-2"><span class="fa fa-send"></span> Kirim</button>
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
    <?php $tentangKami = $this->db->get('profil_perusahaan')->row() ?>
    var tentangKami = new Vue({
        el: '#contactUs',
        data: {
            tentang: <?php echo json_encode($tentangKami->tentang_perusahaan) ?>,
            telp: <?php echo json_encode($tentangKami->telp) ?>,
            alamat: <?php echo json_encode($tentangKami->alamat) ?>,
            wa: <?php echo json_encode($tentangKami->whatsapp) ?>,
            email: <?php echo json_encode($tentangKami->email) ?>,
        }
    });
</script>