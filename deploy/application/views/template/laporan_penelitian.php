<section class="laporan_penelitian mb-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('publics/beranda') ?>">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page"><?= ucwords(str_replace("_", " ", $this->uri->segment(2))) ?></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= ucwords(str_replace("_", " ", $this->uri->segment(3))) == "" ? "Laporan Penelitian" : ucwords(str_replace("_", " ", $this->uri->segment(3))) ?></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4 tabs_laporan_penelitian">
                <a href="<?= base_url('publics/laporan_penelitian') ?>">
                    <h5>Laporan Penelitian</h5>
                </a>
            </div>
            <div class="col-md-4 tabs_laporan_penelitian">
                <a href="<?= base_url('publics/laporan_penelitian/Berita') ?>">
                    <h5>Berita</h5>
                </a>
            </div>
            <div class="col-md-4 tabs_laporan_penelitian">
                <a href="<?= base_url('publics/laporan_penelitian/Pemberitahuan') ?>">
                    <h5>Pemberitahuan</h5>
                </a>

            </div>
        </div>
        <div class="row container-perkenalan" <?= $this->uri->segment(3) == "" ? "" : "style='display:none'" ?>>
            <table id="example" width="100%">
                <thead>
                    <tr>
                        <th style="background-color: transparent !important;width:100%" colspan="5"></th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <div class="row container-perkenalan" <?= $this->uri->segment(3) == "Berita" ? "" : "style='display:none'" ?>>
            <table id="example1" width="100%">
                <thead>
                    <tr>
                        <th style="background-color: transparent !important;width:100%" colspan="5"></th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <div class="row container-perkenalan" <?= $this->uri->segment(3) == "Pemberitahuan" ? "" : "style='display:none'" ?>>
            <table id="example2" width="100%">
                <thead>
                    <tr>
                        <th style="background-color: transparent !important;width:100%" colspan="5">
                            </th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        dataTable = $('#example').DataTable({
            "processing": true,
            "serverSide": true,
            "scrollX": false,
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
                url: "<?php echo site_url('publics/fetch_data_penelitian'); ?>",
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

            });
        });
    });
</script>

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
                [5, 10, 25, 50, 75, 100],
                [5, 10, 25, 50, 75, 100]
            ],
            "ajax": {
                url: "<?php echo site_url('publics/fetch_data_berita'); ?>",
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
        dataTable1.on('draw.dt', function() {
            var info = dataTable1.page.info();
            dataTable1.column(0, {
                search: 'applied',
                order: 'applied',
                page: 'applied'
            }).nodes().each(function(cell, i) {

            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        dataTable2 = $('#example2').DataTable({
            "processing": true,
            "serverSide": true,
            "scrollX": false,
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
                url: "<?php echo site_url('publics/fetch_data_pengumuman'); ?>",
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
        dataTable2.on('draw.dt', function() {
            var info = dataTable2.page.info();
            dataTable2.column(0, {
                search: 'applied',
                order: 'applied',
                page: 'applied'
            }).nodes().each(function(cell, i) {

            });
        });
    });
</script>