<style>
    div.modal{
        width: 100%;
    }
</style>
<div class="modal fade" id="modalProvinsi" tabindex="-1" aria-labelledby="modalProvinsi" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalProvinsi">Cari Provinsi</h5>
                <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="tableprovinsi" class="table" style="width:100% !important;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Provinsi</th>
                                <th>Nama Provinsi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                    <script>
                        $(document).ready(function() {
                            dataTable = $('#tableprovinsi').DataTable({
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
                                    [5,10, 25, 50, 75, 100],
                                    [5,10, 25, 50, 75, 100]
                                ],
                                "ajax": {
                                    url: "<?php echo site_url('publics/fetch_data_provinsi'); ?>",
                                    type: "POST",
                                    dataSrc: "data",
                                    data: function(d) {
                                        return d;
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
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>