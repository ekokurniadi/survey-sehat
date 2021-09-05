
 <div class="main-content">
<section class="section">
  <div class="section-header">
    <h1> Notifikasi </h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></div>
      <div class="breadcrumb-item"><a href="#"> Notifikasi </a></div>
    </div>
  </div>

  <div class="section-body">
  <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
        <div class="card-header">
            <h4>Form Notifikasi </h4>
        </div>
        <form action="<?php echo $action; ?>" method="post" class="form-horizontal">
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="int">Jenis <?php echo form_error('jenis') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="jenis" id="jenis" placeholder="Jenis" value="<?php echo $jenis; ?>" />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="int">Dari <?php echo form_error('dari') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="dari" id="dari" placeholder="Dari" value="<?php echo $dari; ?>" />
                </div>
              </div>
	      
              <div class="form-group">
                <label class="col-sm-2 control-label" for="pesan">Pesan <?php echo form_error('pesan') ?></label>
                <div class="col-sm-12">
                    <textarea class="form-control textarea_editor" rows="3" name="pesan" id="pesan" placeholder="Pesan"><?php echo $pesan; ?></textarea>
                </div>
              </div>
	   
     
        <div class="card-footer text-left">
        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><span class="fa fa-edit"></span><?php echo $button ?></button> 
	    <a href="<?php echo site_url('notifikasi') ?>" class="btn btn-icon icon-left btn-success">Cancel</a>
	
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
