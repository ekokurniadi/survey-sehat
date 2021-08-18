<div id="content" role="content">
    <span class='pix_diapo display_none'></span>
    <style>
        .bonus-logo__image {
            background: #efefef;
            padding: 15px 0 0 15px;
            margin-bottom: 20px;
        }

        .bonus-logo__image ul {
            margin: 0 -15px 0 0;
        }

        .bonus-logo__image ul li {
            float: left;
            margin: 0 15px 15px 0;
        }

        .change-point__left {
            background: url(../images/bonus/arrow_icon.html) no-repeat right 68px;
            padding-right: 60px;
            float: left;
        }

        .change-point__left div {
            background: #fff;
            float: left;
            margin-right: 10px;
            width: 200px;
        }

        .change-point__left_no_arrow div {
            background: #fff;
            float: left;
            margin-right: 10px;
            width: 200px;
        }

        .point__left-title {
            background: #0ea2d3;
            min-height: 140px;
            padding: 22px 10px 0;
            text-align: center;
        }

        .point__left-title_small {
            background: #0ea2d3;
            min-height: 70px;
            padding: 22px 10px 0;
            text-align: center;
            display: block;
            color: #fff;
            font-weight: bold;
        }

        .point__left-title span,
        .point__right-title span {
            display: block;
            color: #fff;
            font-weight: bold;
            padding-top: 12px;
        }

        .text-last {
            min-height: auto !important;
        }

        .point__left-txt {
            border-top: 2px solid #0ea2d3;
            margin-top: 10px;
            padding: 10px 15px;
            min-height: 120px;
        }

        .change-point__right {
            background: #fff;
            float: right;
            width: 260px;
        }

        .point__right-title {
            background: #f57b20;
            line-height: 19px;
            min-height: 140px;
            padding: 22px 10px 0;
            text-align: center;
        }

        .point__right-txt {
            border-top: 2px solid #f57b20;
            margin-top: 10px;
            padding: 10px 15px;
            min-height: 120px;
        }

        .ponit-box__notice {
            background: #FFF;
            border-left: 4px solid #f57b20;
            padding: 13px 10px;
            margin-top: 20px;
        }

        .point__notice-list {
            margin: -25px 0 0 0;
        }

        .point__notice-list li {
            margin-top: 25px;
            position: relative;
            padding-left: 17px;
        }

        .point__notice-list li:before {
            border-color: transparent transparent transparent #f57b20;
            border-style: solid;
            border-width: 4px 0 4px 8px;
            content: "";
            pointer-events: none;
            position: absolute;
            left: 0;
            top: 10px;
            transition-duration: 0.3s;
            transition-property: right;
        }

        .point__box-gold {
            width: 460px;
            margin-bottom: 20px;
        }

        .point__box-gold img {
            float: right;
            margin: 0 0 0 30px;
        }

        .point__box-gold p {
            background: url(../images/bonus/bg_01.html) no-repeat left top;
            font-size: 20px;
            font-weight: bold;
            color: #f57b20;
            text-align: center;
            padding: 13px 0;
            width: 300px;
        }

        .point-box__note {
            padding: 17px 20px;
        }

        .point__note-title {
            color: #f57b20;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
        }

        .point__note-title span {
            border-bottom: 2px solid #5d5d5d;
            display: inline-block;
            padding-bottom: 15px;
        }

        .point__note-list li {
            padding-top: 24px;
        }

        .bonus-table {
            width: 100%;
            margin-bottom: 20px;
        }

        .bonus-table th {
            background: #f57b20;
            border-right: 1px solid #efefef;
            color: #fff;
            font-weight: bold;
            text-align: center;
            padding: 20px 0;
        }

        .bonus-table .size01 {
            width: 200px;
        }

        .bonus-table .size02 {
            width: 460px;
        }

        .bonus-table .size03 {
            width: 299px;
        }

        .bonus-table td {
            background: #fff;
            border-right: 1px solid #efefef;
            border-top: 1px solid #efefef;
            padding: 20px;
        }

        .point__left-title_small {
            padding: 10px 10px 10px;
        }
    </style>
    <div class="m_b20">
        <h2 class="h2-title"><img src="<?php echo base_url()?>assetsPublic/application/templates/default/default/images/bonus/icon_01.gif" width="37" height="30" alt="" />PENUKARAN POIN</h2>
        <div class="box-content">
            <div class="change-point__block clearfix">
                <div class="change-point__left clearfix">
                    <div class="heightLine-point01">
                        <p class="point__left-title">
                            <img src="<?php echo base_url()?>assetsPublic/application/templates/default/default/images/bonus/img_01.gif" width="56" height="56" alt="" />
                            <span>DAFTAR UNTUK PENUKARAN POIN</span>
                        </p>
                        <p class="point__left-txt">
                            <?=$penukaran->daftar_untuk_penukaran_point?>
                        </p>
                    </div>
                    <div class="heightLine-point01">
                        <p class="point__left-title">
                            <img src="<?php echo base_url()?>assetsPublic/application/templates/default/default/images/bonus/img_02.gif" width="56" height="56" alt="" />
                            <span>KONFIRMASI PENUKARAN</span>
                        </p>
                        <p class="point__left-txt">
                        <?=$penukaran->konfirmasi_penukaran?>
                        </p>
                    </div>
                    <div class="heightLine-point01">
                        <p class="point__left-title">
                            <img src="<?php echo base_url()?>assetsPublic/application/templates/default/default/images/bonus/img_03.gif" width="56" height="56" alt="" />
                            <span>BATAS AKHIR KONFIRMASI</span>
                        </p>
                        <p class="point__left-txt">
                           <?=$penukaran->batas_akhir_konfirmasi?>
                        </p>
                    </div>
                </div>
                <div class="change-point__right heightLine-point01">
                    <p class="point__right-title">
                        <img src="<?php echo base_url()?>assetsPublic/application/templates/default/default/images/bonus/img_04.gif" width="56" height="56" alt="" />
                        <span>PENGIRIMAN</span>
                    </p>
                    <p class="point__right-txt">
                     <?=$penukaran->pengiriman?>
                    </p>
                </div>
            </div>
            <div style="padding: 25px 0 17px 0;"><strong><span class="orange-txt">3 LANGKAH PENUKARAN POIN</span></strong></div>
            <div class=" clearfix">
                <div class="change-point__left_no_arrow clearfix">
                    <div>
                        <p class="point__left-title_small"><span>Tukar poin dengan hadiah yang diinginkan, pastikan sesuai dengan poin yang dimiliki.</span></p>
                    </div>
                    <div style="width: 60px;margin-top: 30px;">
                        <img src="<?php echo base_url()?>assetsPublic/application/templates/default/afterlogin/images/bonus/arrow_icon.gif" />
                    </div>
                    <div>
                        <p class="point__left-title_small"><span>Tunggu email konfirmasi penukaran poin dari admin</span></p>
                    </div>
                    <div style="width: 60px;margin-top: 30px;">
                        <img src="<?php echo base_url()?>assetsPublic/application/templates/default/afterlogin/images/bonus/arrow_icon.gif" />
                    </div>
                    <div style="min-width: 300px;">
                        <p class="point__left-title_small"><span>Hadiah akan dikirim setiap hari Rabu tiap minggunya (peraturan ini bisa berubah sewaktu-waktu)</span></p>
                    </div>
                </div>
            </div>
            <div class="ponit-box__notice">
                <strong><span class="orange-txt">PERSYARATAN PENUKARAN POIN:</span></strong>
                <ul class="point__notice-list">
                    <?php foreach($syarat as $rows){?>
                    <li><?=$rows->keterangan?></li>
                    <?php }?>
                </ul>
            </div>
        </div>
    </div>

    <div>
        <h2 class="h2-title"><img src="<?php echo base_url()?>assetsPublic/application/templates/default/default/images/bonus/icon_03.gif" width="37" height="30" alt="" />POIN DAN HADIAH <span class="orange-txt">(1 POIN = RP 50)</span></h2>
        <div class="box-content">
            <table class="bonus-table ">
                <tr>
                    <th class="size01">DETAIL</th>
                    <th class="size02">PROSES - LANGKAH</th>
                    <th class="size03">POIN DAN HADIAH</th>
                </tr>
                <?php foreach($pdh as $rows){?>
                    <tr>
                        <td><?=$rows->detail?></td>
                        <td><?=$rows->langkah?></td>
                        <td><?=$rows->poin_dan_hadiah?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div><!-- / id content -->