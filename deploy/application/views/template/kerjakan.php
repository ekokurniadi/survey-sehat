<section class="kerjakan" id="kerjakanDa">
    <div class="container kerjakan">
        <div class="row">
            <div class="col-md-12 text-center mt-2">
                <h5>KERJAKAN SURVEI SEKARANG UNTUK MENDAPATKAN BONUS POIN</h5>
            </div>
            <div class="col-md-12 d-flex justify-content-center text-center mt-2 ">
                <div class="lines"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3" v-for="(kerjakan,index) of kerjakanData">
                <div class="card mt-2">
                    <div class="card-header card-kerjakan">
                        <h4 class="text-center">{{kerjakan.label}}</h4>
                    </div>
                    <div class="card-body card-body-kerjakan">
                        <h4 v-html="kerjakan.keterangan"></h4>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</section>

<script>
     <?php $kerjakan = $this->db->get('alur_point')->result() ?>
    var kerjakanDa = new Vue({
        el:'#kerjakanDa',
        data:{
            kerjakanData:<?php echo json_encode($kerjakan)?>
        }
    });
</script>