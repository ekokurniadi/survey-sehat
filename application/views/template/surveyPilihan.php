<section class="faq">
    <div class="container mb-3 mt-3">
        <div class="row">
            <div class="col-md-12 mb-2">
                <img src="<?php echo base_url() ?>image/default/images/home/icon_05.gif" width="30px" alt="">
                <strong>Ajukan Pertanyaan</strong>
            </div>
        </div>
        <div class="row container-perkenalan mt-3">
            <div class="col-md-12 mb-3 mt-3">
                <ul class="nav nav-pills nav-fill tabs">
                    <li class="nav-item">
                        <a class="nav-link" id="tOne" onclick="setPage(1)" aria-current="page">Survey Pilihan</a>
                    </li>
                    
                </ul>
            </div>
        </div>
        <div class="row container-perkenalan" id="login">
            <div class="col-md-12">
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
</section>

<script>
    $('document').ready(function() {
        setPage(0);
    });

    function setPage(value) {
        if (value == 0) {
            $('#tOne').attr("class", "nav-link active");
            $('#tTwo').attr("class", "nav-link");
            $('#login').show();
            $('#daftar_').hide();
        }
        if (value == 1) {
            $('#tOne').attr("class", "nav-link active");
            $('#tTwo').attr("class", "nav-link");
            $('#login').show();
            $('#daftar_').hide();
        }
        if (value == 2) {
            $('#tOne').attr("class", "nav-link");
            $('#tTwo').attr("class", "nav-link active");
            $('#login').hide();
            $('#daftar_').show();
        }
    }
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
                url: "<?php echo site_url('publics/fetch_data_survey_pilihan'); ?>",
                type: "POST",
                dataSrc: "data",
                data: function(d) {
                    d.id = '<?= $_SESSION['id'] ?>';

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
    });
</script>