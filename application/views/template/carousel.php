<section class="carousels ">
    <div class="container">
        <div class="row">
            <?php $id = isset($_SESSION['id']) ? isset($_SESSION['id']) : "" ?>
            <?php if ($id == "") { ?>
                <div class="col-md-8 py-3" id="carousels">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item" v-for="(slide,index) of gambar" :class="{ active: index==0 }">
                                <img v-bind:src="'<?php echo base_url('image/') ?>'+ slide.foto" class="img-fluid" style="background-size: content; background-repeat: no-repeat;background-position: center;width:100%;height:50%" alt="Foto">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-xs-12 mb-2">
                            <div class="card card-register" id="card-register">
                                <div class="d-flex justify-content-center py-2">
                                    <img src="<?= base_url() ?>image/default/images/common/user_img.png" alt="">
                                </div>
                                <div class="d-flex justify-content-center py-1 text-white">
                                    <h3>DAFTAR</h3>
                                </div>
                                <div class="d-flex justify-content-center py-1 text-white">
                                    <p>Mulai mendaftar survey</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-xs-12 mb-2">
                            <div class="card card-total" style="background: url('<?=base_url()?>image/default/images/common/bg_01.gif') no-repeat scroll right top #0ea2d3;">
                                <div class="d-flex justify-content-start mb-2 mt-5 px-2 text-white">
                                    <h3>Total Anggota</h3>
                                </div>
                                <div class="d-flex justify-content-start px-2 text-white" id="userCount">
                                    <h3>{{total}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-md-8 py-3" id="carousels">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item" v-for="(slide,index) of gambar" :class="{ active: index==0 }">
                                <img v-bind:src="'<?php echo base_url('image/') ?>'+ slide.foto" class="img-fluid" style="background-size: content; background-repeat: no-repeat;background-position: center;width:100%;height:50%" alt="Foto">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-xs-12 mb-2">
                            <div class="card card-register" id="card-register">
                                <div class="d-flex justify-content-center py-2">
                                    <img src="<?= base_url() ?>image/default/images/common/user_img.png" alt="">
                                </div>
                                <div class="d-flex justify-content-center py-1 text-white">
                                    <h3>Mengundang Teman</h3>
                                </div>
                                <div class="d-flex justify-content-center py-1 text-white">
                                    <button class="btn btn-primary btn-flat btn-block mb-0 mt-3">Undang Teman</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-xs-12 mb-2">
                            <div class="card card-total" style="background: url('<?=base_url()?>image/default/images/common/bg_01.gif') no-repeat scroll right top #0ea2d3;">
                                <div class="d-flex justify-content-start mb-2 mt-5 px-2 text-white">
                                    <h3>Total Anggota</h3>
                                </div>
                                <div class="d-flex justify-content-start px-2 text-white" id="userCount">
                                    <h3>{{total}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<script>
    <?php $gambar = $this->db->get('carousel')->result() ?>
    var carousels = new Vue({
        el: '#carousels',
        data: {
            gambar: <?php echo json_encode($gambar) ?>,
        }
    });

    <?php $user = $this->db->get_where('user', array('level' => 'User'))->num_rows() ?>
    var userCount = new Vue({
        el: '#userCount',
        data: {
            total: <?php echo json_encode(number_format($user, 0, ',', '.')) ?>,
        }
    });
</script>