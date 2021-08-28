
 <div class="main-content">
<section class="section">
  <div class="section-header">
    <h1> Master Kabupaten Kota </h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></div>
      <div class="breadcrumb-item"><a href="#"> Master Kabupaten Kota </a></div>
    </div>
  </div>

  <div class="section-body">
  <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
        <div class="card-header">
            <h4>Form Master Kabupaten Kota </h4>
        </div>
        <form class="form-horizontal">
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Id Provinsi <?php echo form_error('id_provinsi') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="id_provinsi" id="id_provinsi" placeholder="Id Provinsi" value="<?php echo $id_provinsi; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Kabupaten Kota <?php echo form_error('kabupaten_kota') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="kabupaten_kota" id="kabupaten_kota" placeholder="Kabupaten Kota" value="<?php echo $kabupaten_kota; ?>" readonly />
                </div>
              </div>
	   
     
        <div class="card-footer text-left">
        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <a href="<?php echo site_url('master_kabupaten_kota') ?>" class="btn btn-icon icon-left btn-success">Cancel</a>
	
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
