
 <div class="main-content">
<section class="section">
  <div class="section-header">
    <h1> Profil Perusahaan </h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></div>
      <div class="breadcrumb-item"><a href="#"> Profil Perusahaan </a></div>
    </div>
  </div>

  <div class="section-body">
  <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
        <div class="card-header">
            <h4>Form Profil Perusahaan </h4>
        </div>
        <form action="<?php echo $action; ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Nama Perusahaan <?php echo form_error('nama_perusahaan') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan" placeholder="Nama Perusahaan" value="<?php echo $nama_perusahaan; ?>" />
                </div>
              </div>
	      
              <div class="form-group">
                <label class="col-sm-2 control-label" for="sistem_operasi">Sistem Operasi <?php echo form_error('sistem_operasi') ?></label>
                <div class="col-sm-12">
                    <textarea class="form-control" rows="3" name="sistem_operasi" id="sistem_operasi" placeholder="Sistem Operasi"><?php echo $sistem_operasi; ?></textarea>
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Gambar Sistem Operasi <?php echo form_error('gambar_sistem_operasi') ?></label>
                <div class="col-sm-12">
                  <input type="file" class="form-control" name="gambar_sistem_operasi" id="gambar_sistem_operasi" placeholder="Gambar Sistem Operasi" value="<?php echo $gambar_sistem_operasi; ?>" />
                </div>
              </div>
              <?php if ($gambar_sistem_operasi != ""){?>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Gambar Sebelumnya <?php echo form_error('gambar_sistem_operasi') ?></label>
                <div class="col-sm-12">
                  <img src="<?php echo base_url('image/'.$gambar_sistem_operasi)?>" alt="" width="500px">
                </div>
              </div>
              <?php }?>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="pengenalan_perusahaan">Pengenalan Perusahaan <?php echo form_error('pengenalan_perusahaan') ?></label>
                <div class="col-sm-12">
                    <textarea class="form-control" rows="3" name="pengenalan_perusahaan" id="pengenalan_perusahaan" placeholder="Pengenalan Perusahaan"><?php echo $pengenalan_perusahaan; ?></textarea>
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Visi Perusahaan <?php echo form_error('visi_perusahaan') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="visi_perusahaan" id="visi_perusahaan" placeholder="Visi Perusahaan" value="<?php echo $visi_perusahaan; ?>" />
                </div>
              </div>
	      
              <div class="form-group">
                <label class="col-sm-2 control-label" for="isi_visi_perusahaan">Isi Visi Perusahaan <?php echo form_error('isi_visi_perusahaan') ?></label>
                <div class="col-sm-12">
                    <textarea class="form-control" rows="3" name="isi_visi_perusahaan" id="isi_visi_perusahaan" placeholder="Isi Visi Perusahaan"><?php echo $isi_visi_perusahaan; ?></textarea>
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Misi Perusahaan <?php echo form_error('misi_perusahaan') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="misi_perusahaan" id="misi_perusahaan" placeholder="Misi Perusahaan" value="<?php echo $misi_perusahaan; ?>" />
                </div>
              </div>
	      
              <div class="form-group">
                <label class="col-sm-2 control-label" for="isi_misi_perusahaan">Isi Misi Perusahaan <?php echo form_error('isi_misi_perusahaan') ?></label>
                <div class="col-sm-12">
                    <textarea class="form-control" rows="3" name="isi_misi_perusahaan" id="isi_misi_perusahaan" placeholder="Isi Misi Perusahaan"><?php echo $isi_misi_perusahaan; ?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="tentang_perusahaan">Tentang Perusahaan <?php echo form_error('tentang_perusahaan') ?></label>
                <div class="col-sm-12">
                    <textarea class="form-control" rows="3" name="tentang_perusahaan" id="tentang_perusahaan" placeholder="Tentang Perusahaan"><?php echo $tentang_perusahaan; ?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="alamat">Alamat Perusahaan <?php echo form_error('alamat') ?></label>
                <div class="col-sm-12">
                    <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat Perusahaan"><?php echo $alamat; ?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Telepon <?php echo form_error('telp') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="telp" id="telp" placeholder="No Telepon" value="<?php echo $telp; ?>" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">WhatsApp <?php echo form_error('whatsapp') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="whatsapp" id="whatsapp" placeholder="No WhatsApp" value="<?php echo $whatsapp; ?>" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Email <?php echo form_error('email') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="email" id="email" placeholder="Alamat email" value="<?php echo $email; ?>" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Facebook <?php echo form_error('facebook') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="facebook" id="facebook" placeholder="Alamat facebook" value="<?php echo $facebook; ?>" />
                </div>
              </div>
	   
     
        <div class="card-footer text-left">
        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><span class="fa fa-edit"></span><?php echo $button ?></button> 
	    <a href="<?php echo site_url('profil_perusahaan') ?>" class="btn btn-icon icon-left btn-success">Cancel</a>
	
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
