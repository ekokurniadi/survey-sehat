<section class="survey py-3">
    <div class="container container-survey">
        <div class="row">
            <div class="col-md-6 colum-public">
                <div class="row">
                    <div class="col-md-1">
                        <img src="<?php echo base_url() ?>image/default/images/home/icon_05.gif" width="30px" alt="">
                    </div>
                    <div class="col-md-12">
                        <h5>Survey Public</h5>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="date" value="" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <input type="date" value="" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mt-2">
                                    <button type="button" class="btn btn-sm btn-flat btn-warning"><span class="fa fa-search" style="color:white"> Terapkan</span></button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="table-responsive" id="surveyPublic">
                            <table class="table" id="example1" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Survey</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                            <!-- <table width="100%">
                                <thead v-for="(public,index) of surveyPublics">
                                    <tr>
                                        <th colspan="2">{{public.periode_awal}} - {{public.periode_akhir}}</th>
                                    </tr>
                                    <tr>
                                        <th>{{public.judul}}</th>
                                        <th rowspan="3"><button class="btn btn-sm btn-danger">{{public.poin}}</button></th>
                                    </tr>
                                    <tr>
                                        <th><button class="btn btn-flat btn-md btn-danger">Daftar</button></th>
                                    </tr>
                                    <tr>
                                        <th colspan="2">
                                            <hr style="background-color:white">
                                        </th>
                                    </tr>
                                </thead>
                            </table> -->
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        dataTable = $('#example1').DataTable({
            "processing": true,
            "serverSide": true,
            "scrollX": false,
            "language": {
                "infoFiltered": "",
                "processing": "",
            },
            "order": [],
            "lengthMenu": [
                [10, 25, 50, 75, 100],
                [10, 25, 50, 75, 100]
            ],
            "ajax": {
                url: "<?php echo site_url('publics/fetch_data_survey'); ?>",
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