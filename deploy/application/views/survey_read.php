
 <div class="main-content">
<section class="section">
  <div class="section-header">
    <h1> Survey </h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></div>
      <div class="breadcrumb-item"><a href="#"> Survey </a></div>
    </div>
  </div>

  <div class="section-body">
  <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
        <div class="card-header">
            <h4>Form Survey </h4>
        </div>
        <form class="form-horizontal">
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Kode Survey <?php echo form_error('kode_survey') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="kode_survey" id="kode_survey" placeholder="Kode Survey" value="<?php echo $kode_survey; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Judul <?php echo form_error('judul') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" value="<?php echo $judul; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="int">Jenis <?php echo form_error('jenis') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="jenis" id="jenis" placeholder="Jenis" value="<?php echo $jenis; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="int">Kategori <?php echo form_error('kategori') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="kategori" id="kategori" placeholder="Kategori" value="<?php echo $kategori; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="date">Periode Awal <?php echo form_error('periode_awal') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="periode_awal" id="periode_awal" placeholder="Periode Awal" value="<?php echo $periode_awal; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="date">Periode Akhir <?php echo form_error('periode_akhir') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="periode_akhir" id="periode_akhir" placeholder="Periode Akhir" value="<?php echo $periode_akhir; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="int">Poin <?php echo form_error('poin') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="poin" id="poin" placeholder="Poin" value="<?php echo $poin; ?>" readonly />
                </div>
              </div>
	      
            <div class="card-body">
              <div class="form-group">
                <label class="col-sm-2 control-label" for="ketentuan">Ketentuan <?php echo form_error('ketentuan') ?></label>
                <div class="col-sm-12">
                    <textarea class="form-control textarea_editor" rows="3" name="ketentuan" id="ketentuan" placeholder="Ketentuan"><?php echo $ketentuan; ?></textarea>
                </div>
              </div>
	   
     
        <div class="card-footer text-left">
        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <a href="<?php echo site_url('survey') ?>" class="btn btn-icon icon-left btn-success">Cancel</a>
	
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
