<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1> Admin User </h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></div>
        <div class="breadcrumb-item"><a href="#"> Admin User </a></div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Form Admin User </h4>
            </div>
            <form action="<?php echo $action; ?>" method="post" class="form-horizontal" enctype="multipart/form-data">

              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Foto Profil <?php echo form_error('foto_profil') ?></label>
                <div class="col-sm-12">
                  <input type="file" class="form-control" name="foto_profil" id="foto_profil" placeholder="Foto Profil" value="<?php echo $foto_profil; ?>" />
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Nama <?php echo form_error('nama') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Email <?php echo form_error('email') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Password <?php echo form_error('password') ?></label>
                <div class="col-sm-12">
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Level <?php echo form_error('level') ?></label>
                <div class="col-sm-12">
                  <select name="level" id="level" class="form-control">
                    <option value="<?= $level ?>"><?= $level == "" ? "Choose an option" : $level ?></option>
                    <?php foreach ($this->db->get('level')->result() as $rows) : ?>
                      <option value="<?= $rows->level ?>"><?= $rows->level ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="alamat">Alamat <?php echo form_error('alamat') ?></label>
                <div class="col-sm-12">
                  <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
                </div>
              </div>


              <div class="card-footer text-left">
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <button type="submit" class="btn btn-primary"><span class="fa fa-edit"></span><?php echo $button ?></button>
                <a href="<?php echo site_url('admin_user') ?>" class="btn btn-icon icon-left btn-success">Cancel</a>

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>