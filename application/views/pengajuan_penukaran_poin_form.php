
 <div class="main-content">
<section class="section">
  <div class="section-header">
    <h1> Pengajuan Penukaran Poin </h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></div>
      <div class="breadcrumb-item"><a href="#"> Pengajuan Penukaran Poin </a></div>
    </div>
  </div>

  <div class="section-body">
  <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
        <div class="card-header">
            <h4>Form Pengajuan Penukaran Poin </h4>
        </div>
        <form action="<?php echo $action; ?>" method="post" class="form-horizontal">
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="date">Tanggal Pengajuan <?php echo form_error('tanggal_pengajuan') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="tanggal_pengajuan" id="tanggal_pengajuan" placeholder="Tanggal Pengajuan" value="<?php echo $tanggal_pengajuan; ?>" />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="int">Id User <?php echo form_error('id_user') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $id_user; ?>" />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="int">Poin <?php echo form_error('poin') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="poin" id="poin" placeholder="Poin" value="<?php echo $poin; ?>" />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="int">Status <?php echo form_error('status') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="date">Approved Date <?php echo form_error('approved_date') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="approved_date" id="approved_date" placeholder="Approved Date" value="<?php echo $approved_date; ?>" />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="int">Approved By <?php echo form_error('approved_by') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="approved_by" id="approved_by" placeholder="Approved By" value="<?php echo $approved_by; ?>" />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Jenis Penukaran <?php echo form_error('jenis_penukaran') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="jenis_penukaran" id="jenis_penukaran" placeholder="Jenis Penukaran" value="<?php echo $jenis_penukaran; ?>" />
                </div>
              </div>
	      
              <div class="form-group">
                <label class="col-sm-2 control-label" for="catatan">Catatan <?php echo form_error('catatan') ?></label>
                <div class="col-sm-12">
                    <textarea class="form-control" rows="3" name="catatan" id="catatan" placeholder="Catatan"><?php echo $catatan; ?></textarea>
                </div>
              </div>
	   
     
        <div class="card-footer text-left">
        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><span class="fa fa-edit"></span><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pengajuan_penukaran_poin') ?>" class="btn btn-icon icon-left btn-success">Cancel</a>
	
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
