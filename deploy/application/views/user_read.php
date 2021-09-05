
 <div class="main-content">
<section class="section">
  <div class="section-header">
    <h1> User </h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></div>
      <div class="breadcrumb-item"><a href="#"> User </a></div>
    </div>
  </div>

  <div class="section-body">
  <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
        <div class="card-header">
            <h4>Form User </h4>
        </div>
        <form class="form-horizontal">
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Foto Profil <?php echo form_error('foto_profil') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="foto_profil" id="foto_profil" placeholder="Foto Profil" value="<?php echo $foto_profil; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Nama <?php echo form_error('nama') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Email <?php echo form_error('email') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Password <?php echo form_error('password') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">No Telp <?php echo form_error('no_telp') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="No Telp" value="<?php echo $no_telp; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="int">Jenis Kelamin <?php echo form_error('jenis_kelamin') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" placeholder="Jenis Kelamin" value="<?php echo $jenis_kelamin; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="date">Tanggal Lahir <?php echo form_error('tanggal_lahir') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">No Ktp <?php echo form_error('no_ktp') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="no_ktp" id="no_ktp" placeholder="No Ktp" value="<?php echo $no_ktp; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Status Pernikahan <?php echo form_error('status_pernikahan') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="status_pernikahan" id="status_pernikahan" placeholder="Status Pernikahan" value="<?php echo $status_pernikahan; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Pekerjaan <?php echo form_error('pekerjaan') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" value="<?php echo $pekerjaan; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Tingkat Pendidikan <?php echo form_error('tingkat_pendidikan') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="tingkat_pendidikan" id="tingkat_pendidikan" placeholder="Tingkat Pendidikan" value="<?php echo $tingkat_pendidikan; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Bidang Industri Pekerjaan <?php echo form_error('bidang_industri_pekerjaan') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="bidang_industri_pekerjaan" id="bidang_industri_pekerjaan" placeholder="Bidang Industri Pekerjaan" value="<?php echo $bidang_industri_pekerjaan; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Profesi <?php echo form_error('profesi') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="profesi" id="profesi" placeholder="Profesi" value="<?php echo $profesi; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Provinsi <?php echo form_error('provinsi') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="provinsi" id="provinsi" placeholder="Provinsi" value="<?php echo $provinsi; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Kota <?php echo form_error('kota') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="kota" id="kota" placeholder="Kota" value="<?php echo $kota; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="int">Tipe Tempat Tinggal <?php echo form_error('tipe_tempat_tinggal') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="tipe_tempat_tinggal" id="tipe_tempat_tinggal" placeholder="Tipe Tempat Tinggal" value="<?php echo $tipe_tempat_tinggal; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Kartu Provider <?php echo form_error('kartu_provider') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="kartu_provider" id="kartu_provider" placeholder="Kartu Provider" value="<?php echo $kartu_provider; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="int">Jumlah Anak <?php echo form_error('jumlah_anak') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="jumlah_anak" id="jumlah_anak" placeholder="Jumlah Anak" value="<?php echo $jumlah_anak; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="int">Jumlah Keluarga <?php echo form_error('jumlah_keluarga') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="jumlah_keluarga" id="jumlah_keluarga" placeholder="Jumlah Keluarga" value="<?php echo $jumlah_keluarga; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="double">Jumlah Pendapatan Perbulan <?php echo form_error('jumlah_pendapatan_perbulan') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="jumlah_pendapatan_perbulan" id="jumlah_pendapatan_perbulan" placeholder="Jumlah Pendapatan Perbulan" value="<?php echo $jumlah_pendapatan_perbulan; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="double">Jumlah Pendapatan Keluarga Perbulan <?php echo form_error('jumlah_pendapatan_keluarga_perbulan') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="jumlah_pendapatan_keluarga_perbulan" id="jumlah_pendapatan_keluarga_perbulan" placeholder="Jumlah Pendapatan Keluarga Perbulan" value="<?php echo $jumlah_pendapatan_keluarga_perbulan; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Telepon Rumah <?php echo form_error('telepon_rumah') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="telepon_rumah" id="telepon_rumah" placeholder="Telepon Rumah" value="<?php echo $telepon_rumah; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Rekening Bank <?php echo form_error('rekening_bank') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="rekening_bank" id="rekening_bank" placeholder="Rekening Bank" value="<?php echo $rekening_bank; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="int">Mobil Yang Dimiliki <?php echo form_error('mobil_yang_dimiliki') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="mobil_yang_dimiliki" id="mobil_yang_dimiliki" placeholder="Mobil Yang Dimiliki" value="<?php echo $mobil_yang_dimiliki; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="int">Motor Yang Dimiliki <?php echo form_error('motor_yang_dimiliki') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="motor_yang_dimiliki" id="motor_yang_dimiliki" placeholder="Motor Yang Dimiliki" value="<?php echo $motor_yang_dimiliki; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="int">Hp Yang Dimiliki <?php echo form_error('hp_yang_dimiliki') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="hp_yang_dimiliki" id="hp_yang_dimiliki" placeholder="Hp Yang Dimiliki" value="<?php echo $hp_yang_dimiliki; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Level <?php echo form_error('level') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="level" id="level" placeholder="Level" value="<?php echo $level; ?>" readonly />
                </div>
              </div>
	   
     
        <div class="card-footer text-left">
        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <a href="<?php echo site_url('user') ?>" class="btn btn-icon icon-left btn-success">Cancel</a>
	
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
