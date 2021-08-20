<section class="perkenalan">
    <div class="container" id="perkenalanData">
        <div class="row">
            <div class="col-md-12 mt-5">
                <img src="<?php echo base_url() ?>image/default/images/home/icon_05.gif" width="30px" alt="">
                <strong>Aktivitas Survey Sehat</strong>
            </div>
        </div>
        <div class="row container-perkenalan mt-3 mb-3">
            <div class="col-md-12">
                <h4>SISTEM OPERASI SURVEY SEHAT</h4>
            </div>
            <div class="col-md-12 d-flex justify-content-center text-center mt-2 ">
                <div class="lines"></div>
            </div>
            <div class="col-md-12">
                <img v-bind:src="'<?php echo base_url('image/') ?>'+gambar" class="img-fluid" alt="">
            </div>
            <div class="col-md-12 mt-2">
                <p v-html="tentangSistemOperasi"></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-2 ">
                <img src="<?php echo base_url() ?>image/default/images/home/icon_05.gif" width="30px" alt="">
                <strong>Pengenalan Perusahaan</strong>
            </div>
        </div>
        <div class="row container-perkenalan mt-3 mb-3">
            <div class="col-md-12 mt-2">
                <p v-html="pengenalanSistemOperasi"></p>
            </div>
            <div class="col-md-12 visi">
                <strong class="ml-4">Visi : <span class="text-orange">{{pengenalanVisiPerusahaan}}</span></strong>
            </div>
            <div class="col-md-12 mt-2">
                <p v-html="isiVisiPerusahaan"></p>
            </div>
            <div class="col-md-12 visi">
                <strong class="ml-4">Misi : <span class="text-orange">{{pengenalanMisiPerusahaan}}</span></strong>
            </div>
            <div class="col-md-12 mt-2">
                <p v-html="isiMisiPerusahaan"></p>
            </div>
        </div>
    </div>

</section>

<script>
    <?php $perkenalan = $this->db->get('profil_perusahaan')->row() ?>
    var perkenalanData = new Vue({
        el: '#perkenalanData',
        data: {
            gambar: <?php echo json_encode($perkenalan->gambar_sistem_operasi) ?>,
            tentangSistemOperasi: <?php echo json_encode($perkenalan->sistem_operasi) ?>,
            pengenalanSistemOperasi: <?php echo json_encode($perkenalan->pengenalan_perusahaan) ?>,
            pengenalanVisiPerusahaan: <?php echo json_encode($perkenalan->visi_perusahaan) ?>,
            isiVisiPerusahaan: <?php echo json_encode($perkenalan->isi_visi_perusahaan) ?>,
            pengenalanMisiPerusahaan: <?php echo json_encode($perkenalan->misi_perusahaan) ?>,
            isiMisiPerusahaan: <?php echo json_encode($perkenalan->isi_misi_perusahaan) ?>,
        }
    });
</script>