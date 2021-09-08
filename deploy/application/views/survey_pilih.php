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
<style>
    table {
        position: relative;
    }

    th {
        position: sticky;
        top: 0;
        z-index: 999;

    }
</style>

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
                                    <div class="col-md-12">
                                        <input type="button" class="btn btn-danger btn-flat btn-block" value="Tambahkan User">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalUser"><span class="fa fa-user-plus"></span> Pilih User</button>

                                    </div>
                                    <div style="text-align:center;vertical-align: middle;position:absolute;z-index:9999;background:transparent;opacity: 1.5;right:0;left:0;bottom:0" id="loading">
                                        <img src="<?= base_url('image/loading.gif') ?>" alt="" class="img-fluid">
                                        <p>Sedang Memproses...</p>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="table-responsive" style="max-height: 300px;">
                                            <div id="listku"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer text-left">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                                    <a href="<?php echo site_url('survey') ?>" class="btn btn-icon icon-left btn-success">Kembali</a>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <style>
        div.modal {
            width: 100%;


        }
    </style>
    <div class="modal fade" id="modalUser" tabindex="-1" aria-labelledby="modalUser" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalUser">Cari User</h5>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table id="tableKota" class="table" style="width:100% !important;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Pekerjaan</th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <script>
                            $(document).ready(function() {
                                dataTable2 = $('#tableKota').DataTable({
                                    "processing": true,
                                    "serverSide": true,
                                    "scrollX": false,
                                    "paging": true,
                                    "autoWidth": true,
                                    "language": {
                                        "infoFiltered": "",
                                        "processing": "",
                                    },
                                    "order": [],
                                    "lengthMenu": [
                                        [5, 10, 25, 50, 75, 100],
                                        [5, 10, 25, 50, 75, 100]
                                    ],
                                    "ajax": {
                                        url: "<?php echo site_url('survey/fetch_data_user'); ?>",
                                        type: "POST",
                                        dataSrc: "data",
                                        data: function(d) {
                                            d.filters = form_.user_data;
                                            d.kode = $('#kode_survey').val();
                                            d.jumlah = $('#kuota').val();
                                        },
                                    },
                                    "columnDefs": [{
                                            "targets": [2],
                                            "orderable": false
                                        },
                                        {
                                            "targets": [0],
                                            "className": 'text-center'
                                        },

                                    ],
                                });
                                dataTable2.on('draw.dt', function() {
                                    var info = dataTable2.page.info();
                                    dataTable2.column(0, {
                                        search: 'applied',
                                        order: 'applied',
                                        page: 'applied'
                                    }).nodes().each(function(cell, i) {
                                        cell.innerHTML = i + 1 + info.start + ".";
                                    });
                                });
                            });
                        </script>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn-simpan">Simpan</button>
                </div>
            </div>
        </div>
    </div>



    <script>
        function loadData() {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('survey/loadDataUser') ?>",
                data: {
                    id: $('#kode_survey').val()
                },
                success: function(html) {
                    $('#listku').html(html);
                    $('#loading').hide();
                }
            });
        }



        function hapus(id, id_user) {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('survey/hapusData') ?>",
                data: {
                    id: id,
                    id_user: id_user
                },
                beforeSend: function() {
                    $('#loading').show();
                },
                success: function(html) {
                    $("#dataku" + id).hide(500);
                    index_user = _.indexOf(form_.user_data, id_user);
                    form_.user_data.splice(index_user, 1);
                    $('#loading').hide();
                    dataTable2.draw();
                }
            });
        }
    </script>


    <script>
        $(document).ready(function() {
            $("#tableKota").on('change', "input.checkbox-item", function(e) {
                target = $(e.target);
                id_user = target.attr('data-id-user');

                if (target.is(':checked')) {
                    form_.user_data.push(id_user);
                } else {
                    index_user = _.indexOf(form_.user_data, id_user);
                    form_.user_data.splice(index_user, 1);
                }

                var value = {
                    id_survey: '<?= $kode_survey ?>',
                    data: form_.user_data.toString().split(","),
                    kuota: '<?= $kuota ?>',
                }

                $.ajax({
                    url: '<?= base_url('survey/input_user') ?>',
                    type: 'POST',
                    data: value,
                    cache: false,
                    dataType: 'JSON',
                    success: function(response) {
                        if (response.status == "Success") {
                            loadData();
                        } else {
                            Swal.fire({
                                'icon': 'error',
                                'title': 'Notifikasi',
                                'text': response.Pesan
                            });
                        }

                        dataTable2.draw();
                    },
                    error: function() {
                        Swal.fire({
                            'icon': 'error',
                            'title': 'Notifikasi',
                            'text': 'Gagal, Sudah melewati batas maksimal peserta'
                        });
                        form_.user_data = [];
                        dataTable2.draw();

                    },
                });
                dataTable2.draw();

            });
        });
    </script>

    <script>
        <?php $user = $this->db->query("SELECT id_user from survey_pilihan_user where kode_survey='$kode_survey' and id_user !=0")->result_array() ?>

        <?php
        $data = array();
        foreach ($user as $rows) {
            $sub_array = array();
            $sub_array[] = $rows['id_user'];
            $data[] = $sub_array;
        }
        $res = $data;
        ?>
        var form_ = new Vue({
            el: '#form_',
            data: {
                index_user: 0,
                user_data: <?php echo isset($res) ? json_encode($res) : '[]' ?>,
            }
        });
    </script>