<script src="<?= base_url("js/vue/qs.min.js") ?>" type="text/javascript"></script>
<script src="<?= base_url("js/vue/vue.min.js") ?>" type="text/javascript"></script>
<script src="<?= base_url("js/vue/axios.min.js") ?>" type="text/javascript"></script>
<script src="<?= base_url("js/vue/accounting.js") ?>" type="text/javascript"></script>
<script src="<?= base_url("js/vue/vue-numeric.min.js") ?>" type="text/javascript"></script>
<script src="<?= base_url("js/lodash.min.js") ?>" type="text/javascript"></script>
<script type="text/javascript" src="<?= base_url("js/moment.min.js") ?>"></script>
<script type="text/javascript" src="<?= base_url("js/daterangepicker.min.js") ?>"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url("js/daterangepicker.css") ?>" />
<script>
  Vue.use(VueNumeric.default);
</script>

<body onload="loadData()">
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
              <form id="form_" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="varchar">Kode Survey <?php echo form_error('kode_survey') ?></label>
                  <div class="col-sm-12">
                    <input type="text" readonly class="form-control" name="kode_survey" id="kode_survey" placeholder="Kode Survey" value="<?php echo $kode_survey; ?>" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label" for="varchar">Judul <?php echo form_error('judul') ?></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" value="<?php echo $judul; ?>" />
                  </div>
                </div>
                <?php $jenis_survey = $this->db->get('jenis_survey'); ?>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="int">Jenis <?php echo form_error('jenis') ?></label>
                  <div class="col-sm-12">
                    <select name="jenis" id="jenis" class="form-control">
                      <option value="<?= $jenis ?>"><?= $jenis == "" ? "Choose an option" : $this->db->get_where('jenis_survey', array('id' => $jenis))->row()->jenis; ?></option>
                      <?php foreach ($jenis_survey->result() as $rows) : ?>
                        <option value="<?= $rows->id ?>"><?= $rows->jenis ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <?php $kategori_survey = $this->db->get('kategori_survey'); ?>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="int">Kategori <?php echo form_error('kategori') ?></label>
                  <div class="col-sm-12">
                    <select name="kategori" id="kategori" class="form-control">
                      <option value="<?= $kategori ?>"><?= $kategori == "" ? "Choose an option" : $this->db->get_where('kategori_survey', array('id' => $kategori))->row()->kategori_survey; ?></option>
                      <?php foreach ($kategori_survey->result() as $rows) : ?>
                        <option value="<?= $rows->id ?>"><?= $rows->kategori_survey ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label" for="date">Periode Awal <?php echo form_error('periode_awal') ?></label>
                  <div class="col-sm-12">
                    <input type="date" class="form-control" name="periode_awal" id="periode_awal" placeholder="Periode Awal" value="<?php echo $periode_awal; ?>" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label" for="date">Periode Akhir <?php echo form_error('periode_akhir') ?></label>
                  <div class="col-sm-12">
                    <input type="date" class="form-control" name="periode_akhir" id="periode_akhir" placeholder="Periode Akhir" value="<?php echo $periode_akhir; ?>" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label" for="int">Poin <?php echo form_error('poin') ?></label>
                  <div class="col-sm-12">
                    <input type="number" class="form-control" name="poin" id="poin" placeholder="Poin" value="<?php echo $poin; ?>" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="int">Maksimal peserta <?php echo form_error('kuota') ?></label>
                  <div class="col-sm-12">
                    <input type="number" class="form-control" name="kuota" id="kuota" placeholder="Maksimal Peserta" value="<?php echo $kuota; ?>" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label" for="ketentuan">Ketentuan <?php echo form_error('ketentuan') ?></label>
                  <div class="col-sm-12">
                    <textarea class="form-control textarea_editor" rows="3" name="ketentuan" id="ketentuan" placeholder="Ketentuan"><?php echo $ketentuan; ?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-12">
                    <input type="button" class="btn btn-danger btn-block btn-flat" readonly name="" id="" value="Detail Pertanyaan & Jawaban">
                  </div>
                </div>
                <?php
                $tanya = $this->db->get_where('survey_pertanyaan', array('kode_survey' => $kode_survey))->result();

                ?>
                <div class="form-group">
                  <div class="col-sm-12">
                    <table class="table table-bordered">
                      <tfoot>
                        <tr>
                          <td>Pertanyaan</td>
                          <td>
                            <textarea class="form-control textarea_editor" rows="3" name="pertanyaan" id="pertanyaan" placeholder="Pertanyaan"></textarea>
                          </td>
                        </tr>
                        <tr>
                          <td>Jawaban 1</td>
                          <td>
                            <textarea class="form-control textarea_editor" rows="3" name="jawaban_1" id="jawaban_1" placeholder="Jawaban 1"></textarea>
                          </td>
                        </tr>
                        <tr>
                          <td>Jawaban 2</td>
                          <td>
                            <textarea class="form-control textarea_editor" rows="3" name="jawaban_2" id="jawaban_2" placeholder="Jawaban 2"></textarea>
                          </td>
                        </tr>
                        <tr>
                          <td>Jawaban 3</td>
                          <td>
                            <textarea class="form-control textarea_editor" rows="3" name="jawaban_3" id="jawaban_3" placeholder="Jawaban 3"></textarea>
                          </td>
                        </tr>
                        <tr>
                          <td>Jawaban 4</td>
                          <td>
                            <textarea class="form-control textarea_editor" rows="3" name="jawaban_4" id="jawaban_4" placeholder="Jawaban 4"></textarea>
                          </td>
                        </tr>
                        <tr>
                          <td>Jawaban 5</td>
                          <td>
                            <textarea class="form-control textarea_editor" rows="3" name="jawaban_5" id="jawaban_5" placeholder="Jawaban 5"></textarea>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="2" v-if="mode == 'edit' || mode=='create'">
                            <button type="button" onclick="tambahkan()" class="btn btn-md btn-flat btn-primary"><i class="fa fa-plus"></i> Simpan</button>
                          </td>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>

                <div class="form-group">
                  <div style="text-align:center;vertical-align: middle;position:absolute;z-index:9999;background:transparent;opacity: 1.5;right:0;left:0;bottom:0" id="loading">
                    <img src="<?= base_url('image/loading.gif') ?>" alt="" class="img-fluid">
                    <p>Sedang Memproses...</p>
                  </div>
                  <div class="col-md-12">
                    <div class="table-responsive">
                      <div id="listku"></div>
                    </div>
                  </div>
                </div>


                <div class="card-footer text-left">
                  <input type="hidden" name="id" value="<?php echo $id; ?>" />
                  <button type="button" v-if="mode == 'edit' || mode=='create'" class="btn btn-primary" id="btnSubmit"><span class="fa fa-edit"></span><?php echo $button ?></button>
                  <a href="<?php echo site_url('survey') ?>" class="btn btn-icon icon-left btn-success">Cancel</a>

                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script type="text/javascript">
    function tambahkan() {
      var kode_survey = $('#kode_survey').val();
      var pertanyaan = $('#pertanyaan').val();
      var jawaban_1 = $('#jawaban_1').val();
      var jawaban_2 = $('#jawaban_2').val();
      var jawaban_3 = $('#jawaban_3').val();
      var jawaban_4 = $('#jawaban_4').val();
      var jawaban_5 = $('#jawaban_5').val();

      var data = {
        kode_survey: kode_survey,
        pertanyaan: pertanyaan,
        jawaban_1: jawaban_1,
        jawaban_2: jawaban_2,
        jawaban_3: jawaban_3,
        jawaban_4: jawaban_4,
        jawaban_5: jawaban_5,
      }

      simpanData(data);
    }

    function loadData() {
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('survey/loadData') ?>",
        data: {
          id: $('#kode_survey').val()
        },
        success: function(html) {
          $('#listku').html(html);
          $('#loading').hide();
        }
      });
    }



    function hapus(id) {
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('survey/hapusData') ?>",
        data: {id:id},
        beforeSend:function(){
          $('#loading').show();
        },
        success: function(html) {
          $("#dataku" + id).hide(500);
          $('#loading').hide();
        }
      });
    }


    function simpanData(data) {
      if (data.pertanyaan === "" || data.pertanyaan === undefined || data.jawaban_1 === "" || data.jawaban_1 === undefined) {
        validationError();
      } else {
        $.ajax({
          url: '<?= base_url('survey/addDetails') ?>',
          type: "POST",
          data: {
            kode_survey: data.kode_survey,
            pertanyaan: data.pertanyaan,
            jawaban_1: data.jawaban_1,
            jawaban_2: data.jawaban_2,
            jawaban_3: data.jawaban_3,
            jawaban_4: data.jawaban_4,
            jawaban_5: data.jawaban_5,
          },
          cache: false,
          dataType: 'JSON',
          beforeSend: function() {
            $('#loading').show();
          },
          success: function(response) {
            loadData();
            $('#loading').hide();
          },
          error: function() {
            gagal_send();
            $('#loading').hide();
          }
        });
      }
    }
  </script>

  <script>
    var form_ = new Vue({
      el: '#form_',
      data: {
        mode: '<?php echo $mode ?>',
      },


    })
    $('#btnSubmit').click(function() {
      var values = {
        soal: form_.detailTanya
      }
      var form = $('#form_').serializeArray();
      for (field of form) {
        values[field.name] = field.value;
      }


      $.ajax({
        beforeSend: function() {
          $('#submitBtn').attr('disabled', true);
          $('#submitBtn').html('<i class="fa fa-spinner fa-spin"></i> Process');
        },
        url: '<?= $action ?>',
        type: 'POST',
        data: values,
        cache: false,
        dataType: 'JSON',
        success: function(response) {
          $('#submitBtn').html('<i class="fa fa-save"></i> Save');
          if (response.status == 'sukses') {
            window.location = response.link;
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
    });
  </script>