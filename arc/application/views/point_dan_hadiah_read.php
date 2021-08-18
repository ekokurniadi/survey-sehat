
 <div class="main-content">
<section class="section">
  <div class="section-header">
    <h1> Point Dan Hadiah </h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></div>
      <div class="breadcrumb-item"><a href="#"> Point Dan Hadiah </a></div>
    </div>
  </div>

  <div class="section-body">
  <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
        <div class="card-header">
            <h4>Form Point Dan Hadiah </h4>
        </div>
        <form class="form-horizontal">
	      
            <div class="card-body">
              <div class="form-group">
                <label class="col-sm-2 control-label" for="detail">Detail <?php echo form_error('detail') ?></label>
                <div class="col-sm-12">
                    <textarea class="form-control" rows="3" name="detail" id="detail" placeholder="Detail"><?php echo $detail; ?></textarea>
                </div>
              </div>
	      
            <div class="card-body">
              <div class="form-group">
                <label class="col-sm-2 control-label" for="langkah">Langkah <?php echo form_error('langkah') ?></label>
                <div class="col-sm-12">
                    <textarea class="form-control" rows="3" name="langkah" id="langkah" placeholder="Langkah"><?php echo $langkah; ?></textarea>
                </div>
              </div>
	      
            <div class="card-body">
              <div class="form-group">
                <label class="col-sm-2 control-label" for="poin_dan_hadiah">Poin Dan Hadiah <?php echo form_error('poin_dan_hadiah') ?></label>
                <div class="col-sm-12">
                    <textarea class="form-control" rows="3" name="poin_dan_hadiah" id="poin_dan_hadiah" placeholder="Poin Dan Hadiah"><?php echo $poin_dan_hadiah; ?></textarea>
                </div>
              </div>
	   
     
        <div class="card-footer text-left">
        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <a href="<?php echo site_url('point_dan_hadiah') ?>" class="btn btn-icon icon-left btn-success">Cancel</a>
	
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
