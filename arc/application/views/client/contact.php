<div id="content" role="content">
    <?php $dataFooter = $this->db->get('profil_perusahaan')->row() ?>
    <div>
        <h2 class="h2-title"><img src="<?php echo base_url() ?>assetsPublic/application/templates/default/afterlogin/images/contact/icon_01.gif" width="37" height="30" alt="">KONTAK</h2>
        <div class="box-content clearfix">
            <h3 class="contact-title"><?= $dataFooter->nama_perusahaan ?></h3>
            <div class="clearfix">
                <div class="contact__left">
                    <ul class="contact-list">
                        <li><img src="<?php echo base_url() ?>assetsPublic/application/templates/default/afterlogin/images/contact/icon_02.gif" width="36" height="35" alt=""><?= $dataFooter->alamat ?></li>
                        <li><img src="<?php echo base_url() ?>assetsPublic/application/templates/default/afterlogin/images/contact/icon_03.gif" width="36" height="35" alt="">
                            Tel:<?= $dataFooter->telp ?><br>
                            WA: <?= $dataFooter->whatsapp ?> (Chat only)
                        </li>
                        <li><img src="<?php echo base_url() ?>assetsPublic/application/templates/default/afterlogin/images/contact/icon_05.gif" width="36" height="35" alt=""><a href="mailto:<?= $dataFooter->email ?>"><?= $dataFooter->email ?></a><br>
                            <a href="mailto:<?= $dataFooter->email ?>"><?= $dataFooter->email ?></a>
                        </li>
                    </ul>

                </div>

                <div class="contact__right">
                    <form method="post" id="form_" enctype="multipart/form-data">
                        <p><input type="text" id="name" name="FullName" placeholder="Nama Lengkap" class="size size01"></p>
                        <p><input type="text" id="mail" name="Email" placeholder="Email" class="size size02"><input type="text" id="subject" name="Subject" placeholder="Subject" class="size size02"></p>
                        <p><textarea id="message" name="Message" cols="6" placeholder="Deskripsi" rows="5"></textarea></p>
                        <p class="submit-btn"><input type="button" id="btnSubmit" name="" value="Kirim"></p>
                    </form>
                    <p class="red-txt"></p>
                </div>
            </div>
        </div><!-- / class box-content -->
    </div>
</div>

<script>
    $('#btnSubmit').click(function() {
        var form = $('#form_').serializeArray();
        console.log(form);
        
    });
</script>