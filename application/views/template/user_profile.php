<style>
    form#form_user_profile label.error {
        color: red;
    }
</style>
<?php
$id = $_SESSION['id'];
$data = $this->db->get_where('user', array('id' => $id))->row();
?>
<section class="contact_us" style="font-size: 10pt;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-2 ">
                <img src="<?php echo base_url() ?>image/default/images/home/icon_05.gif" width="30px" alt="">
                <strong>Profil User</strong>
            </div>
        </div>
        <form method="POST" id="form_user_profile" enctype="multipart/form-data">
            <div class="row container-perkenalan mt-3 mb-3 d-flex align-items-center">
                <div class="col-md-12 d-flex justify-content-center mb-3">
                    <div>
                        <?php $id = isset($_SESSION['id']) ? $_SESSION['id'] : "" ?>
                        <?php $gambar = $this->db->get_where('user', array('id' => $id))->row() ?>
                        <?php if ($gambar->foto_profil == "") { ?>
                            <img id="imgUser1" src="<?php echo base_url() . 'image/default.png' ?>" width="100px" height="100px" class="rounded-circle" alt="">
                        <?php } else { ?>
                            <img id="imgUser2" src="<?php echo base_url('image/') . $gambar->foto_profil ?>" width="100px" height="100px" class="rounded-circle" alt="">
                        <?php } ?>
                        <br>
                        <button type="button" class="btn btn-danger btn-sm btn-flat mt-2" data-toggle="modal" data-target="#modalUploadFoto">Upload Foto</button>
                    </div>
                </div>
                <label for="" class="control-label col-md-1 ">Nama<em style="color:red;">*</em> </label>
                <div class="col-md-5 mb-2 form-group">
                    <input type="text" required class="tanya" readonly name="nama" id="nama" placeholder="Nama Lengkap" value="<?php echo $data->nama ?>">
                </div>
                <label for="" class="control-label col-md-1 ">No.HP(WA)<em style="color:red;">*</em> </label>
                <div class="col-md-5 mb-2 form-group">
                    <input type="text" required class="tanya" name="no_telp" id="no_telp" placeholder="No. Telp(WA)" value="<?php echo $data->no_telp ?>">
                </div>
                <label for="" class="control-label col-md-1 ">Tanggal Lahir<em style="color:red;">*</em> </label>
                <div class="col-md-5 mb-2 form-group">
                    <input type="date" required class="tanya" name="tanggal_lahir" id="tanggal_lahir" placeholder="No. Telp" value="<?php echo $data->tanggal_lahir ?>">
                </div>
                <label for="" class="control-label col-md-1 ">Jenis Kelamin<em style="color:red;">*</em> </label>
                <div class="col-md-5 mb-2 form-group">
                    <input type="radio" required class="tanya" name="jk" id="jk" placeholder="No. Telp" value="0" <?= $data->jenis_kelamin == 0 ? "checked" : "" ?>>
                    <label for="">Laki-Laki </label>
                    <input type="radio" required class="tanya" name="jk" id="jk" placeholder="No. Telp" value="1" <?= $data->jenis_kelamin == 1 ? "checked" : "" ?>>
                    <label for="">Perempuan </label>
                </div>
                <label for="" class="control-label col-md-1 ">No.KTP<em style="color:red;">*</em> </label>
                <div class="col-md-5 mb-2 form-group">
                    <input type="text" required class="tanya" name="ktp" id="ktp" placeholder="No. KTP" value="<?php echo $data->no_ktp ?>">
                </div>
                <label for="" class="control-label col-md-1 ">Foto KTP<em style="color:red;">*</em> </label>
                <div class="col-md-5 mb-2 form-group">
                    <input type="file" class="tanya" onchange="upload_ktp(this)" name="foto_ktp" id="foto_ktp" placeholder="No. foto_ktp" value="<?php echo $data->foto_ktp ?>" style="width:65%">
                    <button type="button" data-toggle="modal" data-target="#modalPreview" class="btn btn-primary btn-sm btn-flat">
                        <i class="fa fa-picture-o"></i> Preview
                    </button>
                </div>
                <label for="" class="control-label col-md-1 ">Status Pernikahan<em style="color:red;">*</em> </label>
                <div class="col-md-5 mb-2 form-group">
                    <select name="status_pernikahan" id="status_pernikahan" class="tanya" required>
                        <option value="<?= $data->status_pernikahan ?>"><?= $data->status_pernikahan == "" ? "Choose an option" : $data->status_pernikahan ?></option>
                        <option value="Single">Single</option>
                        <option value="Menikah">Menikah</option>
                        <option value="Cerai Mati">Cerai Mati</option>
                        <option value="Cerai Hidup">Cerai Hidup</option>
                    </select>
                </div>
                <label for="" class="control-label col-md-1 ">Pekerjaan<em style="color:red;">*</em> </label>

                <div class="col-md-5 mb-2 ">
                    <?php $datapekerjaan = $this->db->get_where('master_pekerjaan', array('id' => $data->pekerjaan)) ?>
                    <input type="text" required data-toggle="modal" data-target="#modalPekerjaan" readonly class="tanya" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" value="<?php echo $datapekerjaan->row()->pekerjaan ?>">
                    <input type="hidden" class="tanya" name="pekerjaan_id" id="pekerjaan_id" placeholder="Provinsi" value="<?= $data->pekerjaan ?>">
                </div>
                <label for="" class="control-label col-md-1 ">Bidang Pekerjaan<em style="color:red;">*</em> </label>
                <div class="col-md-5 mb-2 form-group">
                    <select name="bidang_industri_pekerjaan" id="bidang_industri_pekerjaan" class="tanya" required>
                        <option value="<?= $data->bidang_industri_pekerjaan ?>"><?= $data->bidang_industri_pekerjaan == "" ? "Choose an option" : $data->bidang_industri_pekerjaan ?></option>
                        <option value="Kesehatan">Kesehatan</option>
                        <option value="Konstruksi">Konstruksi</option>
                        <option value="Sales/Marketing">Sales/Marketing</option>
                        <option value="Administrasi">Administrasi</option>
                        <option value="Teknologi Informasi">Teknologi Informasi</option>
                        <option value="Travel">Travel</option>
                        <option value="Kesenian">Kesenian</option>
                        <option value="Industri">Industri</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>

                <label for="" class="control-label col-md-1 ">Tingkat Pendidikan<em style="color:red;">*</em> </label>
                <div class="col-md-5 mb-2 form-group">
                    <select name="tingkat_pendidikan" id="tingkat_pendidikan" class="tanya" required>
                        <option value="<?= $data->tingkat_pendidikan ?>"><?= $data->tingkat_pendidikan == "" ? "Choose an option" : $data->tingkat_pendidikan ?></option>
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA">SMA</option>
                        <option value="Kejuruan">Kejuruan</option>
                        <option value="Diploma">Diploma</option>
                        <option value="Strata-I">Strata-I</option>
                        <option value="Strata-II">Strata-II</option>
                        <option value="Strata-III">Strata-III</option>
                    </select>
                </div>
                <label for="" class="control-label col-md-1 ">Provinsi<em style="color:red;">*</em> </label>
                <div class="col-md-5 mb-2 form-group">
                    <?php $dataprovinsi = $this->db->get_where('master_provinsi', array('id_provinsi' => $data->provinsi)) ?>
                    <input type="text" readonly data-toggle="modal" data-target="#modalProvinsi" required class="tanya" name="provinsi" id="provinsi" placeholder="Provinsi" value="<?= $dataprovinsi->row()->provinsi ?>">
                    <input type="hidden" class="tanya" name="provinsi_id" id="provinsi_id" placeholder="Provinsi" value="<?= $data->provinsi ?>">
                </div>
                <label for="" class="control-label col-md-1 ">Kota<em style="color:red;">*</em> </label>
                <div class="col-md-5 mb-2 form-group">
                    <?php $datakota = $this->db->get_where('master_kabupaten_kota', array('id' => $data->kota)) ?>
                    <input type="text" readonly data-toggle="modal" data-target="#modalKota" required class="tanya" name="kota" id="kota" placeholder="Kota" value="<?= $datakota->row()->kabupaten_kota ?>">
                    <input type="hidden" class="tanya" name="kota_id" id="kota_id" placeholder="Provinsi" value="<?= $data->kota ?>">
                </div>
                <label for="" class="control-label col-md-1 ">Tipe Tempat Tinggal<em style="color:red;">*</em> </label>
                <div class="col-md-5 mb-2 form-group">
                    <select name="tipe_tempat_tinggal" id="tipe_tempat_tinggal" class="tanya" required>
                        <option value="<?= $data->tipe_tempat_tinggal ?>"><?= $data->tipe_tempat_tinggal == "" ? "Choose an option" : $data->tipe_tempat_tinggal ?></option>
                        <option value="Rumah Pribadi">Rumah Pribadi</option>
                        <option value="Apartemen">Apartemen</option>
                        <option value="Rumah Kontrak">Rumah Kontrak</option>
                        <option value="Kost">Kost</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
                <label for="" class="control-label col-md-1 ">Alamat<em style="color:red;">*</em> </label>
                <div class="col-md-5 mb-2 form-group">
                    <textarea name="alamat" id="alamat" class="tanya" required cols="30" rows="5"><?= $data->alamat ?></textarea>
                </div>
                <label for="" class="control-label col-md-1 ">Kartu Provider<em style="color:red;">*</em> </label>
                <div class="col-md-5 mb-2 form-group">
                    <?php $dataProvider = $this->db->get_where('operator_selular', array('id' => $data->kartu_provider)) ?>
                    <input type="text" readonly required data-toggle="modal" data-target="#modalProvider" class="tanya" name="kartu_provider" id="kartu_provider" placeholder="Kartu Provider" value="<?= $dataProvider->row()->nama_operator ?>">
                    <input type="hidden" class="tanya" name="kartu_provider_id" id="kartu_provider_id" placeholder="Provinsi" value="<?= $data->kartu_provider ?>">
                </div>
                <label for="" class="control-label col-md-1 ">Jumlah Anak<em style="color:red;">*</em> </label>
                <div class="col-md-5 mb-2 form-group">
                    <input type="text" required class="tanya" name="jumlah_anak" id="jumlah_anak" placeholder="Jumlah Anak" value="<?php echo $data->jumlah_anak ?>">
                </div>
                <label for="" class="control-label col-md-1 ">Jumlah Keluarga<em style="color:red;">*</em> </label>
                <div class="col-md-5 mb-2 form-group">
                    <input type="text" required class="tanya" name="jumlah_keluarga" id="jumlah_keluarga" placeholder="Jumlah Keluarga" value="<?php echo $data->jumlah_keluarga ?>">
                </div>
                <label for="" class="control-label col-md-1 ">Pendapatan Perbulan<em style="color:red;">*</em> </label>
                <div class="col-md-5 mb-2 form-group">
                    <input type="text" required class="tanya" name="jumlah_pendapatan_perbulan" id="jumlah_pendapatan_perbulan" placeholder="Pendapatan Perbulan" value="<?php echo $data->jumlah_pendapatan_perbulan ?>">
                </div>
                <label for="" class="control-label col-md-1 ">Pendapatan Keluarga Perbulan<em style="color:red;">*</em> </label>
                <div class="col-md-5 mb-2 form-group">
                    <input type="text" required class="tanya" name="jumlah_pendapatan_keluarga_perbulan" id="jumlah_pendapatan_keluarga_perbulan" placeholder="Pendapatan Keluarga Perbulan" value="<?php echo $data->jumlah_pendapatan_keluarga_perbulan ?>">
                </div>
                <label for="" class="control-label col-md-1 ">Telepon Rumah<em style="color:red;">*</em> </label>
                <div class="col-md-5 mb-2 form-group">
                    <input type="text" required class="tanya" name="telepon_rumah" id="telepon_rumah" placeholder="Telepon Rumah" value="<?php echo $data->telepon_rumah ?>">
                </div>
                <label for="" class="control-label col-md-1 ">Mobil yang dimiliki<em style="color:red;">*</em> </label>
                <div class="col-md-5 mb-2 form-group">
                    <input type="text" required class="tanya" name="mobil_yang_dimiliki" id="mobil_yang_dimiliki" placeholder="Mobil yang dimiliki" value="<?php echo $data->mobil_yang_dimiliki ?>">
                </div>
                <label for="" class="control-label col-md-1 ">Motor yang dimiliki<em style="color:red;">*</em> </label>
                <div class="col-md-5 mb-2 form-group">
                    <input type="text" required class="tanya" name="motor_yang_dimiliki" id="motor_yang_dimiliki" placeholder="Motor yang dimiliki" value="<?php echo $data->motor_yang_dimiliki ?>">
                </div>
                <label for="" class="control-label col-md-1 ">HP yang dimiliki<em style="color:red;">*</em> </label>
                <div class="col-md-5 mb-2 form-group">
                    <input type="text" required class="tanya" name="hp_yang_dimiliki" id="hp_yang_dimiliki" placeholder="HP yang dimiliki" value="<?php echo $data->hp_yang_dimiliki ?>">
                </div>
                <label for="" class="control-label col-md-1 ">Asuransi Kesehatan<em style="color:red;">*</em> </label>
                <div class="col-md-5 mb-2 form-group">
                    <select name="asuransi_kesehatan" required id="asuransi_kesehatan" class="tanya">
                        <option value="<?= $data->asuransi_kesehatan ?>"><?= $data->asuransi_kesehatan == "" ? "Choose an option" : $data->asuransi_kesehatan ?></option>
                        <option value="Tidak Ada">Tidak Ada</option>
                        <option value="BPJS">BPJS</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
                <label for="" class="control-label col-md-1 ">Riwayat Penyakit Sistemik<em style="color:red;">*</em> </label>
                <div class="col-md-5 mb-2 form-group">
                    <select name="riwayat_penyakit" id="riwayat_penyakit" class="tanya" required>
                        <option value="<?= $data->riwayat_penyakit ?>"><?= $data->riwayat_penyakit == "" ? "Choose an option" : $data->riwayat_penyakit ?></option>
                        <option value="Tidak Ada">Tidak Ada</option>
                        <option value="Hipertensi">Hipertensi(Darah Tinggi)</option>
                        <option value="Diabetes Melitus">Diabetes Melitus(Kencing Manis)</option>
                    </select>
                </div>
                <label for="" class="control-label col-md-1 ">&nbsp;</label>
                <div class="col-md-3 mb-2">
                    <button class="btn btn-danger btn-flat btn-block btn-sm" type="button" id="btnSaveProfile"><span class="fa fa-save"></span> Simpan Perubahan</button>

                </div>
            </div>
        </form>
    </div>
</section>

<script>
    function getProvinsi(id) {
        $.ajax({
            beforeSend: function() {
                $('#searchProvinsi').attr('disabled', true);
                $('#searchProvinsi').html('<i class="fa fa-spinner fa-spin">');
            },
            url: '<?= base_url('publics/getByIdProv') ?>',
            type: "POST",
            data: {
                id
            },
            cache: false,
            dataType: 'JSON',
            success: function(response) {
                if (response.status == 'sukses') {
                    $('#provinsi_id').val(response.value.id);
                    $('#provinsi').val(response.value.name);
                    dataTable2.draw();
                } else {
                    alert(response.pesan);
                }
                $('#searchProvinsi').attr('disabled', false);
                $('#searchProvinsi').html('<i class="fa fa-search">');
            },
            error: function() {
                alert("Something Went Wrong !");
                $('#searchProvinsi').attr('disabled', false);
                $('#searchProvinsi').html('<i class="fa fa-search">');
            }
        });
    }

    function getPekerjaan(id) {
        $.ajax({
            beforeSend: function() {
                $('#searchPekerjaan').attr('disabled', true);
                $('#searchPekerjaan').html('<i class="fa fa-spinner fa-spin">');
            },
            url: '<?= base_url('publics/getByIdPekerjaan') ?>',
            type: "POST",
            data: {
                id
            },
            cache: false,
            dataType: 'JSON',
            success: function(response) {
                if (response.status == 'sukses') {
                    $('#pekerjaan_id').val(response.value.id);
                    $('#pekerjaan').val(response.value.name);
                } else {
                    alert(response.pesan);
                }
                $('#searchPekerjaan').attr('disabled', false);
                $('#searchPekerjaan').html('<i class="fa fa-search">');
            },
            error: function() {
                alert("Something Went Wrong !");
                $('#searchPekerjaan').attr('disabled', false);
                $('#searchPekerjaan').html('<i class="fa fa-search">');
            }
        });
    }

    function getProvider(id) {
        $.ajax({
            beforeSend: function() {
                $('#searchProvider').attr('disabled', true);
                $('#searchProvider').html('<i class="fa fa-spinner fa-spin">');
            },
            url: '<?= base_url('publics/getByIdProvider') ?>',
            type: "POST",
            data: {
                id
            },
            cache: false,
            dataType: 'JSON',
            success: function(response) {
                if (response.status == 'sukses') {
                    $('#kartu_provider').val(response.value.name);
                    $('#kartu_provider_id').val(response.value.id);
                } else {
                    alert(response.pesan);
                }
                $('#searchProvider').attr('disabled', false);
                $('#searchProvider').html('<i class="fa fa-search">');
            },
            error: function() {
                alert("Something Went Wrong !");
                $('#searchProvider').attr('disabled', false);
                $('#searchProvider').html('<i class="fa fa-search">');
            }
        });
    }

    function getKota(id) {
        $.ajax({
            beforeSend: function() {
                $('#searchKota').attr('disabled', true);
                $('#searchKota').html('<i class="fa fa-spinner fa-spin">');
            },
            url: '<?= base_url('publics/getByIdKota') ?>',
            type: "POST",
            data: {
                id
            },
            cache: false,
            dataType: 'JSON',
            success: function(response) {
                if (response.status == 'sukses') {
                    $('#kota_id').val(response.value.id);
                    $('#kota').val(response.value.name);
                } else {
                    alert(response.pesan);
                }
                $('#searchKota').attr('disabled', false);
                $('#searchKota').html('<i class="fa fa-search">');
            },
            error: function() {
                alert("Something Went Wrong !");
                $('#searchKota').attr('disabled', false);
                $('#searchKota').html('<i class="fa fa-search">');
            }
        });
    }

    function upload_ktp(value) {
        var form_ktp = new FormData();
        var newfiles = value.files;

        if (newfiles.length > 0) {
            form_ktp.append('foto_ktp', newfiles[0]);
            $.ajax({
                enctype: 'multipart/form-data',
                url: '<?= base_url('publics/updateFotoKTP') ?>',
                type: 'POST',
                data: form_ktp,
                processData: false,
                contentType: false,
                cache: false,
                dataType: 'JSON',
                success: function(response) {
                    if (response.status == 200) {
                        $('#output_ktp').attr("src", response.data);
                        Swal.fire({
                            icon: 'success',
                            title: 'Notification',
                            text: 'Berhasil Upload foto KTP',

                        });
                    } else {
                        gagal_send();
                    }
                }
            });
        } else {
            validationError();
        }
    }

    $('#btnSaveProfile').click(function() {
        $('#form_user_profile').validate({
            rules: {
                'checkbox': {
                    required: true
                }
            },
            highlight: function(input) {
                $(input).parents('label').addClass('has-error');
            },
            unhighlight: function(input) {
                $(input).parents('.validation').removeClass('has-error');
            }
        })
        var values = {}
        var form_user_profile = $('#form_user_profile').serializeArray();
        var form = $('#form_user_profile');
        for (field of form_user_profile) {
            values[field.name] = field.value;
        }

        if (form.valid()) {

            $.ajax({
                beforeSend: function() {
                    $('#submitBtn').attr('disabled', true);
                    $('#submitBtn').html('<i class="fa fa-spinner fa-spin"></i> Process');
                },
                url: '<?php echo base_url('publics/saveProfile') ?>',
                type: 'POST',
                data: values,
                cache: false,
                dataType: 'JSON',
                success: function(response) {
                    $('#submitBtn').html('<i class="fa fa-save"></i> Save');
                    $('#submitBtn').attr('disabled', false);
                    if (response.status == 'sukses') {
                        setTimeout(() => {
                            window.location = response.link;
                        }, 1000);
                        Swal.fire({
                            icon: 'success',
                            title: 'Notification',
                            text: 'Berhasil mengupdate profile',
                        });

                    } else {
                        $('#submitBtn').attr('disabled', false);
                        alert(response.pesan);
                    }
                },
                error: function() {
                    alert("Gagal");
                    $('#submitBtn').attr('disabled', false);
                }
            });

        } else {
            validationError();

        }
    });
</script>