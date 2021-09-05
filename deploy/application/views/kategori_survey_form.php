
 <div class="main-content">
<section class="section">
  <div class="section-header">
    <h1> Kategori Survey </h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></div>
      <div class="breadcrumb-item"><a href="#"> Kategori Survey </a></div>
    </div>
  </div>

  <div class="section-body">
  <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
        <div class="card-header">
            <h4>Form Kategori Survey </h4>
        </div>
        <form action="<?php echo $action; ?>" method="post" class="form-horizontal">
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Kategori Survey <?php echo form_error('kategori_survey') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="kategori_survey" id="kategori_survey" placeholder="Kategori Survey" value="<?php echo $kategori_survey; ?>" />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Active <?php echo form_error('active') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="active" id="active" placeholder="Active" value="<?php echo $active; ?>" />
                </div>
              </div>
	   
     
        <div class="card-footer text-left">
        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><span class="fa fa-edit"></span><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kategori_survey') ?>" class="btn btn-icon icon-left btn-success">Cancel</a>
	
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
