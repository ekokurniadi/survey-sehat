<section class="penukaran" id="penukaran">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <img src="<?php echo base_url() ?>image/default/images/home/icon_05.gif" width="30px" alt="">
                <strong>Penukaran Poin</strong>
            </div>
        </div>
        <div class="row container-perkenalan mt-3 mb-3">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header card-kerjakan text-white text-center">
                        <i class="fa fa-history"></i>
                        <h4 class="text-center">DAFTAR UNTUK PENUKARAN POIN</h4>
                    </div>
                    <div class="card-body">
                        {{daftar_untuk_penukaran_point}}
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header card-kerjakan text-white text-center">
                        <i class="fa fa-check-circle"></i>
                        <h4 class="text-center">KONFIRMASI PENUKARAN POIN</h4>
                    </div>
                    <div class="card-body">
                        {{konfirmasi_penukaran}}
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header card-kerjakan text-white text-center">
                        <i class="fa fa-thumbs-up"></i>
                        <h4 class="text-center">BATAS AKHIR PENUKARAN POIN</h4>
                    </div>
                    <div class="card-body">
                        {{batas_akhir_konfirmasi}}
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header card-kerjakan text-white text-center">
                        <i class="fa fa-car"></i>
                        <h4 class="text-center">PENGIRIMAN</h4>
                    </div>
                    <div class="card-body">
                        {{pengiriman}}
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-3 left-lines py-3">
                <ul class="fa-ul">
                    <li v-for="(alur,index) of alurPoint">
                        <i class="fa-li fa fa-chevron-right"></i> <em v-html="alur.keterangan"></em>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row container-perkenalan mt-3">
            <div class="col-md-12 visi">
                <strong class="ml-4">NOTE : <span class="text-orange">{{pengiriman}}</span></strong>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-3">
                <img src="<?php echo base_url() ?>image/default/images/home/icon_05.gif" width="30px" alt="">
                <strong>Penukaran Poin</strong>
            </div>
        </div>
        <div class="row container-perkenalan mt-3 mb-3">
            <div class="col-md-12">
                <table class="table table-bordered table-hovered" id="table-penukaran">
                    <tr>
                        <th>DETAIL</th>
                        <th>PROSES - LANGKAH</th>
                        <th>POINT & HADIAH</th>
                    </tr>
                    <tr>
                        <td v-html="detail"></td>
                        <td v-html="langkah"></td>
                        <td v-html="point_dan_hadiah"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</section>


<script>
    <?php $penukaran = $this->db->get('info_penukaran_point')->row() ?>
    <?php $syarat_penukaran_point = $this->db->get('syarat_penukaran_point')->result() ?>
    <?php $point_dan_hadiah = $this->db->get('point_dan_hadiah')->row() ?>
    var penukaran = new Vue({
        el: '#penukaran',
        data: {
            daftar_untuk_penukaran_point: <?php echo json_encode($penukaran->daftar_untuk_penukaran_point) ?>,
            konfirmasi_penukaran: <?php echo json_encode($penukaran->konfirmasi_penukaran) ?>,
            batas_akhir_konfirmasi: <?php echo json_encode($penukaran->batas_akhir_konfirmasi) ?>,
            pengiriman: <?php echo json_encode($penukaran->pengiriman) ?>,
            alurPoint: <?php echo json_encode($syarat_penukaran_point) ?>,
            detail: <?php echo json_encode($point_dan_hadiah->detail) ?>,
            langkah: <?php echo json_encode($point_dan_hadiah->langkah) ?>,
            point_dan_hadiah: <?php echo json_encode($point_dan_hadiah->poin_dan_hadiah) ?>,
        }
    });
</script>