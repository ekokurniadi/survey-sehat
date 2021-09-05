
 <div class="main-content">
<section class="section">
  <div class="section-header">
    <h1> Info Penukaran Point </h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></div>
      <div class="breadcrumb-item"><a href="#"> Info Penukaran Point </a></div>
    </div>
  </div>

  <div class="section-body">
  <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
        <div class="card-header">
            <h4>Form Info Penukaran Point </h4>
        </div>
        <form class="form-horizontal">
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Daftar Untuk Penukaran Point <?php echo form_error('daftar_untuk_penukaran_point') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="daftar_untuk_penukaran_point" id="daftar_untuk_penukaran_point" placeholder="Daftar Untuk Penukaran Point" value="<?php echo $daftar_untuk_penukaran_point; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Konfirmasi Penukaran <?php echo form_error('konfirmasi_penukaran') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="konfirmasi_penukaran" id="konfirmasi_penukaran" placeholder="Konfirmasi Penukaran" value="<?php echo $konfirmasi_penukaran; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Batas Akhir Konfirmasi <?php echo form_error('batas_akhir_konfirmasi') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="batas_akhir_konfirmasi" id="batas_akhir_konfirmasi" placeholder="Batas Akhir Konfirmasi" value="<?php echo $batas_akhir_konfirmasi; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Pengiriman <?php echo form_error('pengiriman') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="pengiriman" id="pengiriman" placeholder="Pengiriman" value="<?php echo $pengiriman; ?>" readonly />
                </div>
              </div>
	   
     
        <div class="card-footer text-left">
        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <a href="<?php echo site_url('info_penukaran_point') ?>" class="btn btn-icon icon-left btn-success">Cancel</a>
	
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
