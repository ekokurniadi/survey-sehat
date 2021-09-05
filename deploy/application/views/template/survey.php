<section class="survey py-3">
    <div class="container container-survey">
        <div class="row">
            <div class="col-md-6 colum-public">
                <div class="row">
                    <div class="col-md-1">
                        <img src="<?php echo base_url() ?>image/default/images/home/icon_05.gif" width="30px" alt="">
                    </div>
                    <div class="col-md-11">
                        <h5>Survey Public</h5>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="date" name="awal" id="awal" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <input type="date" name="akhir" id="akhir" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mt-2">
                                    <button type="button" id="cariPublic" class="btn btn-sm btn-flat btn-warning"><span class="fa fa-search" style="color:white"> Terapkan</span></button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="table-responsive" id="surveyPublic">
                            <table class="table table-hover table-bordered" id="example1" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Survey</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 colum-cepat">
                <div class="row">
                    <div class="col-md-1">
                        <img src="<?php echo base_url() ?>image/default/images/home/icon_05.gif" width="30px" alt="">
                    </div>
                    <div class="col-md-11">
                        <h5>Survey Cepat</h5>
                        <div class="container">
                            <div class="row">
                            <div class="col-md-6">
                                    <input type="date" name="awal_k" id="awal_k" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <input type="date" name="akhir_k" id="akhir_k" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mt-2">
                                    <button type="button" id="cariCepat" class="btn btn-sm btn-flat btn-warning"><span class="fa fa-search" style="color:white"> Terapkan</span></button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="table-responsive" id="surveyPublic">
                            <table class="table table-hover table-bordered" id="example2" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kuisioner</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('#cariPublic').click(function() {
            dataTable1.draw();
        });
    });
    $(document).ready(function() {
        $('#cariCepat').click(function() {
            dataTable.draw();
        });
    });
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
                url: "<?php echo site_url('publics/fetch_data_survey'); ?>",
                type: "POST",
                dataSrc: "data",
                data: function(d) {
                    d.awal = $('#awal').val();
                    d.akhir = $('#akhir').val();
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
                url: "<?php echo site_url('publics/fetch_data_kuisioner'); ?>",
                type: "POST",
                dataSrc: "data",
                data: function(d) {
                    d.awal_k = $('#awal_k').val();
                    d.akhir_k = $('#akhir_k').val();
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
    <?php $data = $this->db->get('survey')->result() ?>
    var surveyPublic = new Vue({
        el: '#surveyPublic',
        data: {
            surveyPublics: <?php echo json_encode($data) ?>,
        }
    });
</script>