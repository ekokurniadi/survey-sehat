<!--left banner -->
<div id="banner-left"><a target="_blank" href="#"><img class="transparent" src="#" alt="" /></a></div>
<script>
    $(document).ready(function() {});
</script>
<script type="text/javascript">
    $(window).resize(function() {
        var w_window = $(window).width();
        if (w_window <= 1260) {
            $("#banner-left").css("display", "none");
        } else {
            $("#banner-left").css("display", "block");
        }
    });

    var $banner = $("#banner-left")
    $(window).scroll(function() {
        scrollTop = $(this).scrollTop();
        if (scrollTop >= 2210) {
            $banner.css({
                'display': 'none'
            });
        } else {
            $banner.css({
                'display': 'block'
            });
        }
    });
</script>
</div><!-- / id content -->
<style>
     #link_ a:hover{
        color:red;
    }
</style>
<?php $dataFooter = $this->db->get('profil_perusahaan')->row()?>
<div id="footer" role="footer" style="background-color: #182260;">
    <div id="pagetop-btn" role="pagetop-btn"><a href="#wrapper"><img src="<?php echo base_url() ?>image/default/images/common/pagetop_btn.png" alt="" class="transparent" height="50" width="50" /></a></div>
    <div class="footer__inner">
        <div class="f-block__coloumn clearfix">
            <div class="f__col01 heightLine-col">
                <p class="f_title" ><span style="color:#FFFFFF"><?=$dataFooter->nama_perusahaan?></span></p>
                <ul class="f-navi">
                    <li id="link_"><a href="<?php echo base_url()?>">Halaman Muka</a></li>
                    <li id="link_"><a href="<?php echo base_url('publics/point')?>">Poin dan Hadiah</a></li>
                    <li id="link_"><a href="<?php echo base_url('publics/laporan_penelitian')?>">Laporan Penelitian</a></li>
                    <li id="link_"><a href="<?php echo base_url('publics/faq')?>">FAQ</a></li>
                    <li id="link_"><a href="<?php echo base_url('publics/contact')?>">Hubungi Kami</a></li>
                    <li id="link_"><a href="<?php echo base_url('publics/kebijakan')?>">Kebijakan</a></li>
                </ul>
            </div>
            <div class="f__col02 heightLine-col">
                <p class="f_title"><span style="color:#FFFFFF">Tentang kami</span></p>
                <p><?=$dataFooter->tentang_perusahaan?></p>
                <ul class="f-contact">
                    <li><img src="<?php echo base_url() ?>image/default/images/common/icon_01.gif" alt="Address Survey Sehat" height="17" width="16" /><span><?=$dataFooter->alamat?></span></li>
                    <li><img src="<?php echo base_url() ?>image/default/images/common/icon_02.gif" alt="Contact Survey Sehat" height="17" width="16" /><span><?=$dataFooter->telp?></span></li>
                    <li><img src="<?php echo base_url() ?>assetsPublic/application/templates/default/afterlogin/images/common/whatsapp-logo.png" alt="WhatApp with Survey Sehat" /><span><?=$dataFooter->whatsapp?> (WA only)</span></li>
                    <li><img src="<?php echo base_url() ?>image/default/images/common/icon_03.gif" alt="Email Survey Sehat" height="17" width="16" /><span><?=$dataFooter->email?></span></li>
                </ul>
            </div>
            <div class="f__col03 heightLine-col">
                <p class="f_title"><span style="color:#FFFFFF">Ikuti kami di Facebook</span></p>
                <div class="f-box__facebook">
                    <iframe src="http://www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fekoexl&amp;width=280&amp;height=266&amp;show_faces=true&amp;colorscheme=light&amp;stream=false&amp;border_color&amp;header=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:280px; height:266px;background: #FFFFFF;" allowTransparency="true"></iframe>
                </div>
            </div>
        </div>
        <div class="footer-bottom clearfix">
            <p class="copy-right">
                Copyright &copy; 2021 <a href="<?php echo base_url()?>" title="Survey Sehat Indonesia"><?=$dataFooter->nama_perusahaan?></a>. All rights reserved.</p>
        </div>
    </div>
</div><!-- / id footer -->
</div><!-- / id wrapper -->


<form id="socialLogin" name="signin" method="post" action="https://Survey Sehat.net/public/index/signin">
    <input type="hidden" name="srcFrom" value="">
    <input type="hidden" name="uid" value="">
    <input type="hidden" name="refUserName" value="">
    <input type="hidden" name="token" value="d0ea407f6cb2be61782ddefba351d018">
    <input type="hidden" name="timestamp" value="1627880800">
    <input type="hidden" name="backurl" value="">
</form><!-- END SOCIAL LOGIN -->
<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script type="text/javascript">
    $zopim(function() {
        $zopim.livechat.window.hide();
    });
</script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).tooltip();
</script>
<!-- Google Code for Nusa New Register Conversion Page -->
<script type="text/javascript">
    /* <![CDATA[ */
    var google_conversion_id = 842901926;
    var google_conversion_language = "en";
    var google_conversion_format = "3";
    var google_conversion_color = "ffffff";
    var google_conversion_label = "O5rkCPb5zXMQptP2kQM";
    var google_remarketing_only = false;
    /* ]]> */
</script>
<script type="text/javascript" src="../../www.googleadservices.com/pagead/f.txt">
</script>
<noscript>
    <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt="" src="http://www.googleadservices.com/pagead/conversion/842901926/?label=O5rkCPb5zXMQptP2kQM&amp;guid=ON&amp;script=0" />
    </div>
</noscript>
</body>

</html>