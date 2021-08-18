<div id="content" role="content">
    <span class='pix_diapo display_none'></span>
    <div class="m_b20">
        <h2 class="h2-title"><img src="<?php echo base_url()?>assetsPublic/application/templates/default/default/images/about/icon_01.gif" width="37" height="30" alt="" />MEMPERKENALKAN AKTIVITAS <?=$dataPerusahaan->nama_perusahaan?></h2>
        <div class="box-content">
            <h3 class="about-title01"><span>SISTEM OPERASI <?=$dataPerusahaan->nama_perusahaan?></span></h3>
            <p class="m_b15"><img src="<?php echo base_url()."image/".$dataPerusahaan->gambar_sistem_operasi?>" width="960" height="612" alt="SISTEM OPERASI <?=$dataPerusahaan->nama_perusahaan?>" /></p>
            <p class="m_b15"><?=$dataPerusahaan->sistem_operasi?></p>
        </div>
    </div>

    <div>
        <h2 class="h2-title"><img src="<?php echo base_url()?>assetsPublic/application/templates/default/default/images/about/icon_02.gif" width="37" height="30" alt="" />PENGENALAN PERUSAHAAN</h2>
        <div class="box-content">
            <p><?=$dataPerusahaan->pengenalan_perusahaan?></p>

            <h4 class="about-title02"><i><span>Visi:</span> <?=$dataPerusahaan->visi_perusahaan?></i></h4>
            <p><?=$dataPerusahaan->isi_visi_perusahaan?></p>

           
        </div>
    </div>
</div><!-- / id content -->