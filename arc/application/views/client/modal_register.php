<style>
    body .modal-dialog {
        max-width: 70%;

    }
</style>
<div class="modal fade" id="modalPart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cari Data Part</h5>
                <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="example3" class="table" style="width:100% !important;table-layout:auto">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Part</th>
                                <th>Deskripsi Part</th>
                                <th>Harga</th>
                                <th>Stock</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                    <script>
                        $(document).ready(function() {
                            dataTable = $('#example3').DataTable({
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
                                    [10, 25, 50, 75, 100],
                                    [10, 25, 50, 75, 100]
                                ],
                                "ajax": {
                                    url: "<?php echo site_url('api/fetch_part'); ?>",
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
<script>
    function showModalPart() {
        $('#example3').DataTable().ajax.reload();
        $('#modalPart').modal('show');
    }
</script>