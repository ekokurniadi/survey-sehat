<section class="laporan_penelitian_detail">
    <div class="container">
        <div class="row container-perkenalan mt-3 mb-3">
            <div class="col-md-12">
                <a href="<?php echo base_url('publics/laporan_penelitian')?>" class="btn btn-flat btn-danger">Kembali</a>
                <h5><?=$row->judul?></h5>
                <p><?=formatTanggal($row->tanggal)?></p>
            </div>
            <div class="col-md-12">
                <img src="<?php echo base_url('image/').$row->foto_cover?>" class="img-fluid" alt="">
            </div>
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <p><?=$row->isi?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>