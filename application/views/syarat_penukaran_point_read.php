
 <div class="main-content">
<section class="section">
  <div class="section-header">
    <h1> Syarat Penukaran Point </h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></div>
      <div class="breadcrumb-item"><a href="#"> Syarat Penukaran Point </a></div>
    </div>
  </div>

  <div class="section-body">
  <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
        <div class="card-header">
            <h4>Form Syarat Penukaran Point </h4>
        </div>
        <form class="form-horizontal">
	      
            <div class="card-body">
              <div class="form-group">
                <label class="col-sm-2 control-label" for="keterangan">Keterangan <?php echo form_error('keterangan') ?></label>
                <div class="col-sm-12">
                    <textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea>
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="int">Urutan <?php echo form_error('urutan') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="urutan" id="urutan" placeholder="Urutan" value="<?php echo $urutan; ?>" readonly />
                </div>
              </div>
	   
     
        <div class="card-footer text-left">
        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <a href="<?php echo site_url('syarat_penukaran_point') ?>" class="btn btn-icon icon-left btn-success">Cancel</a>
	
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
