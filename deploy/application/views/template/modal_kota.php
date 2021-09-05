<style>
    div.modal {
        width: 100%;
    }
</style>
<div class="modal fade" id="modalKota" tabindex="-1" aria-labelledby="modalKota" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalKota">Cari Kabupaten/Kota</h5>
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
                                <th>ID Provinsi</th>
                                <th>Nama Kabupaten Kota</th>
                                <th>Action</th>
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
                                    [5,10, 25, 50, 75, 100],
                                    [5,10, 25, 50, 75, 100]
                                ],
                                "ajax": {
                                    url: "<?php echo site_url('publics/fetch_data_kota'); ?>",
                                    type: "POST",
                                    dataSrc: "data",
                                    data: function(d) {
                                        d.id_provinsi = $('#provinsi_id').val();
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>