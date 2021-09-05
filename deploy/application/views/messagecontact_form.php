
 <div class="main-content">
<section class="section">
  <div class="section-header">
    <h1> Messagecontact </h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></div>
      <div class="breadcrumb-item"><a href="#"> Messagecontact </a></div>
    </div>
  </div>

  <div class="section-body">
  <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
        <div class="card-header">
            <h4>Form Messagecontact </h4>
        </div>
        <form action="<?php echo $action; ?>" method="post" class="form-horizontal">
	      
              <div class="form-group">
                <label class="col-sm-2 control-label" for="pertanyaan">Pertanyaan <?php echo form_error('pertanyaan') ?></label>
                <div class="col-sm-12">
                    <textarea class="form-control" rows="3" name="pertanyaan" id="pertanyaan" placeholder="Pertanyaan"><?php echo $pertanyaan; ?></textarea>
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Status <?php echo form_error('status') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Nama <?php echo form_error('nama') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="int">Email <?php echo form_error('email') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Subject <?php echo form_error('subject') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" value="<?php echo $subject; ?>" />
                </div>
              </div>
	   
     
        <div class="card-footer text-left">
        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><span class="fa fa-edit"></span><?php echo $button ?></button> 
	    <a href="<?php echo site_url('messagecontact') ?>" class="btn btn-icon icon-left btn-success">Cancel</a>
	
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
