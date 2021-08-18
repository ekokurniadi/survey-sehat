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
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1> Kuisioner </h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></div>
        <div class="breadcrumb-item"><a href="#"> Kuisioner </a></div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Form Kuisioner </h4>
            </div>
            <form id="form_" enctype="multipart/form-data" method="post" class="form-horizontal">

              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Kode Kuisioner <?php echo form_error('kode_kuisioner') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="kode_kuisioner" id="kode_kuisioner" readonly placeholder="Kode Kuisioner" value="<?php echo $kode_kuisioner; ?>" />
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
                <label class="col-sm-2 control-label" for="pertanyaan">Pertanyaan <?php echo form_error('pertanyaan') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="pertanyaan" id="pertanyaan" placeholder="Pertanyaan" value="<?php echo $pertanyaan; ?>">
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
                <div class="col-sm-12">
                  <input type="button" class="btn btn-block btn-flat btn-danger" value="Detail Jawaban" readonly>
                </div>
              </div>
              <?php $details = $this->db->get_where('kuisioner_jawaban', array('id_kuisioner' => $kode_kuisioner))->result() ?>
              <div class="form-group">
                <div class="col-sm-12">
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th width="5%">No</th>
                          <th>Jawaban</th>
                          <th width="5%">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(dt,index) of details">
                          <td>{{index+1}}</td>
                          <td>{{dt.jawaban}}</td>
                          <td v-if="mode=='edit' || mode=='create'">
                            <button type="button" class="btn btn-sm btn-flat btn-danger" @click.prevent="del(index)"><span class="fa fa-trash"></span></button>
                          </td>
                        </tr>
                      </tbody>
                      <tfoot>
                        <tr>
                          <td colspan="2"><input type="text" class="form-control" v-model="detail.jawaban" name="jawaban" id="jawaban"></td>
                          <td v-if="mode=='edit' || mode=='create'">
                            <button type="button" class="btn btn-sm btn-flat btn-success" @click.prevent="addData()"><span class="fa fa-plus"></span></button>
                          </td>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>


              <div class="card-footer text-left">
                <input type="hidden" name="id" value="<?php echo $id; ?>" />

                <button type="button" v-if="mode=='edit' || mode=='create'" id="btnSubmit" class="btn btn-primary"><span class="fa fa-edit"></span><?php echo $button ?></button>

                <a href="<?php echo site_url('kuisioner') ?>" class="btn btn-icon icon-left btn-success">Cancel</a>

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<script>
  var form_ = new Vue({
    el: '#form_',
    data: {
      mode: '<?php echo $mode ?>',
      detail: {
        id_kuisioner: '',
        jawaban: '',
      },
      details: <?php echo isset($details) ? json_encode($details) : '[]' ?>,
    },
    methods: {
      clearData: function() {
        this.detail = {}
      },
      addData: function() {
        if (this.detail.jawaban === '' || this.detail.jawaban === undefined) {
          alert('Isi Jawaban terlebih dahulu');
          return false;
        }
        this.details.push(this.detail);
        this.clearData();
      },
      del: function(index) {
        this.details.splice(index, 1);
      }
    }
  });
  $('#btnSubmit').click(function() {
    var values = {
      detail: form_.details
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