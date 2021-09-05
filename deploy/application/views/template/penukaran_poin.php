<style>
    table.examples tbody tr td{
        background-color: white;
        font-size: 11pt;
    }
    .tabs{
        background-color: #f52060;
        color: white;
    }
</style>
<section class="contact_us">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <img src="<?php echo base_url() ?>image/default/images/home/icon_05.gif" width="30px" alt="">
                <strong>Penukaran Poin</strong>
            </div>
        </div>
        <div class="row container-perkenalan mt-3" style="cursor: pointer;">
            <div class="col-md-12">
                <ul class="nav nav-pills nav-fill tabs">
                    <li class="nav-item">
                        <a class="nav-link" id="tOne" onclick="setPage(1)" aria-current="page">Pengajuan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tTwo" onclick="setPage(2)" aria-current="page">Progress</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tThree" onclick="setPage(3)" aria-current="page">History</a>
                    </li>

                </ul>
            </div>

        </div>
        <div class="row container-perkenalan" id="daftar_">
            <table style="vertical-align: top;" width="100%">
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url('publics/penukaran_poin_user_action')?>">
                    <tr>
                        <td width="25%"><label for="" class="label">Poin<em style="color:red;">*</em></label></td>
                        <td><input type="text" onkeyup="cek_point(this)" required class="form-control tanya" name="poin_" id="poin_" placeholder="Jumlah poin yang ingin di tukarkan"></td>
                    </tr>

                    <tr>
                        <td><label for="" class="label">Jenis Penukaran<em style="color:red;">*</em></label></td>
                        <td>
                            <select name="kategori" required id="kategori" class="form-control tanya">
                                <option value="">Choose an option</option>
                                <option value="Pulsa">Pulsa</option>
                                <option value="Uang">Uang Tunai</option>
                            </select>
                        </td>

                    </tr>
                    <tr>
                        <td><label for="" class="label">Catatan</label></td>
                        <td>
                            <textarea name="catatan" id="catatan" class="form-control tanya" cols="30" rows="5"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <button type="submit" class="btn btn-flat btn-primary mt-2"><span class="fa fa-send"></span> Send</button>
                        </td>
                    </tr>
            </table>
            </form>
        </div>
        <div class="row container-perkenalan" id="login">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered examples" id="example1" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Jumlah Poin</th>
                                <th>Penukaran</th>
                                <th>Catatan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row container-perkenalan" id="survey">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered examples" id="example2" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Jumlah Poin</th>
                                <th>Penukaran</th>
                                <th>Catatan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</section>

<script>
    $(document).ready(function() {
        dataTable1 = $('#example1').DataTable({
            "processing": true,
            "serverSide": true,
            "scrollX": false,
            "language": {
                "infoFiltered": "",
                "processing": "",
            },
            "order": [],
            "lengthMenu": [
                [5,10, 25, 50, 75, 100],
                [5,10, 25, 50, 75, 100]
            ],
            "ajax": {
                url: "<?php echo site_url('publics/fetch_data_penukaran'); ?>",
                type: "POST",
                dataSrc: "data",
                data: function(d) {
                  return d;
                },
            },
            "columnDefs": [{
                "targets": [0],
                "className": 'text-center'
            }, ],
        });
        dataTable1.on('draw.dt', function() {
            var info = dataTable1.page.info();
            dataTable1.column(0, {
                search: 'applied',
                order: 'applied',
                page: 'applied'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1 + info.start + ".";
            });
        });
        dataTable = $('#example2').DataTable({
            "processing": true,
            "serverSide": true,
            "scrollX": false,
            "language": {
                "infoFiltered": "",
                "processing": "",
            },
            "order": [],
            "lengthMenu": [
                [5,10, 25, 50, 75, 100],
                [5,10, 25, 50, 75, 100]
            ],
            "ajax": {
                url: "<?php echo site_url('publics/fetch_data_penukaran_history'); ?>",
                type: "POST",
                dataSrc: "data",
                data: function(d) {
                  return d;
                },
            },
            "columnDefs": [{
                "targets": [0],
                "className": 'text-center'
            }, ],
        });
        dataTable.on('draw.dt', function() {
            var info = dataTable.page.info();
            dataTable.column(0, {
                search: 'applied',
                order: 'applied',
                page: 'applied'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1 + info.start + ".";
            });
        });
    });
</script>

<script>
    $('document').ready(function() {
        setPage(0);
    });

    function setPage(value) {
        if (value == 0) {
            $('#tOne').attr("class", "nav-link active");
            $('#tTwo').attr("class", "nav-link");
            $('#tThree').attr("class", "nav-link");
            $('#tFour').attr("class", "nav-link");
            $('#tFive').attr("class", "nav-link");
            $('#login').hide();
            $('#daftar_').show();
            $('#survey').hide();
            $('#poin').hide();
            $('#lainnya').hide();
        }
        if (value == 1) {
            $('#tOne').attr("class", "nav-link active");
            $('#tTwo').attr("class", "nav-link");
            $('#tThree').attr("class", "nav-link");
            $('#tFour').attr("class", "nav-link");
            $('#tFive').attr("class", "nav-link");
            $('#login').hide();
            $('#daftar_').show();
            $('#survey').hide();
            $('#poin').hide();
            $('#lainnya').hide();
        }
        if (value == 2) {
            $('#tOne').attr("class", "nav-link");
            $('#tTwo').attr("class", "nav-link active");
            $('#tThree').attr("class", "nav-link");
            $('#tFour').attr("class", "nav-link");
            $('#tFive').attr("class", "nav-link");
            $('#login').show();
            $('#daftar_').hide();
            $('#survey').hide();
            $('#poin').hide();
            $('#lainnya').hide();
        }
        if (value == 3) {
            $('#tOne').attr("class", "nav-link");
            $('#tTwo').attr("class", " nav-link");
            $('#tThree').attr("class", "nav-link active");
            $('#tFour').attr("class", "nav-link");
            $('#tFive').attr("class", "nav-link");
            $('#login').hide();
            $('#daftar_').hide();
            $('#survey').show();
            $('#poin').hide();
            $('#lainnya').hide();
        }
        if (value == 4) {
            $('#tOne').attr("class", "nav-link");
            $('#tTwo').attr("class", " nav-link");
            $('#tFour').attr("class", "nav-link active");
            $('#tThree').attr("class", "nav-link");
            $('#tFive').attr("class", "nav-link");
            $('#login').hide();
            $('#daftar_').hide();
            $('#survey').hide();
            $('#poin').show();
            $('#lainnya').hide();
        }
        if (value == 5) {
            $('#tOne').attr("class", "nav-link");
            $('#tTwo').attr("class", " nav-link");
            $('#tFive').attr("class", "nav-link active");
            $('#tThree').attr("class", "nav-link");
            $('#tFour').attr("class", "nav-link");
            $('#login').hide();
            $('#daftar_').hide();
            $('#survey').hide();
            $('#poin').hide();
            $('#lainnya').show();
        }

    }

    function cek_point(e) {
        <?php $id = isset($_SESSION['id']) ? $_SESSION['id'] : "" ?>
        <?php $point = $this->db->get_where('user', array('id' => $id))->row() ?>
        var nilai = e.value
        var point_user = '<?php echo $point->jumlah_poin ?>';
        var jumlah_point = document.getElementById('poin_');
        if(isNaN(nilai)==true){
            Swal.fire({
                icon: 'error',
                title: 'Notifikasi',
                text: 'Silahkan masukan angka'
            });
        }
        if (parseInt(point_user) < parseInt(nilai)) {
            Swal.fire({
                icon: 'error',
                title: 'Notifikasi',
                text: 'Jumlah Poin tidak mencukupi'
            });
            jumlah_point.value = "";
        }
    }
</script>