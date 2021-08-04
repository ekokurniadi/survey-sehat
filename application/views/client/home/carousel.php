<div class="main-top clearfix" id="carouselForm">
    <div class="main-top__silder">
        <div class="pix_diapo">
            <?php foreach ($slider as $rows) : ?>
                <div data-thumb="<?= base_url('image/') . $rows->foto ?>">
                   
                        <img src="<?= base_url('image/') . $rows->foto ?>" alt="tes" style="background-size: fill; background-repeat: no-repeat;background-position: center;height:100%;width:100%" />
                  
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="main-top__right">
        <div class="main-top__registration"><a href="index/register-popup.html" class="popup-show-register"><img src="<?php echo base_url() ?>image/default/images/common/user_img.png" alt="Mulai Menjab survei" height="72" width="72" /><span><strong>DAFTAR</strong><span class="registration__txt">Mulai Menjab survei</span></span></a></div>
        <div class="main-top__member" style="background: url('<?php echo base_url() ?>assetsPublic/application/templates/default/default/images/common/bg_01.gif') no-repeat scroll right top #0ea2d3;">
            <p>Total Anggota<br />Nusaresearch<span>743,121</span></p>
        </div>
    </div>
</div>
<!-- <a href="popupex.html" onclick="return popitup('s.html')">Link to popup</a> -->
<!-- / id main-top -->
<!-- <div class="home-block m_b20">
        <a href="mobile-app/index.html" target="_blank"><img src="images/appbanner/SP-App-Banner-IN.png" style="max-width: 100%" alt=""/></a>
    </div> -->

<script language="javascript" type="text/javascript">
    function popitup(url) {
        newwindow = window.open(url, 'name', 'height=500,width=800');
        if (window.focus) {
            newwindow.focus()
        }
        return false;
    }
</script>