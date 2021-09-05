<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title><?php echo $id ?></title>
</head>

<body style="padding:10px">
    <?php $data = $this->db->get_where('survey', array('id' => $id))->row() ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

            </div>
            <br>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <img src="<?= base_url('image/survey-sehat.jpeg') ?>" alt="survey sehat" class="img-responsive" width="80px;">
                        <h5 class="text-center d-flex align-content-center"><?= $data->judul ?></h5>
                    </div>
                    <div class="card-body">
                        <form method="post" method="POST" enctype="multipart/form-data" id="form_">
                            <table>
                                <tr>
                                    <th>Periode Survey</th>
                                    <th>:</th>
                                    <th><?= formatTanggal($data->periode_awal) ?> - <?= formatTanggal($data->periode_akhir) ?></th>
                                </tr>
                                <tr>
                                    <th>Poin didapatkan</th>
                                    <th>:</th>
                                    <th><?= $data->poin ?></th>
                                </tr>
                                <tr>
                                    <th>Ketentuan</th>
                                    <th>:</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th colspan="3">
                                        <?= $data->ketentuan ?>
                                    </th>
                                </tr>
                            </table>
                    </div>
                    <div class="card-footer">
                        <input type="hidden" name="id" id="id" value="<?php echo $data->id ?>">
                        <input type="hidden" name="idSurvey" id="idSurvey" value="<?php echo $data->kode_survey ?>">
                        <input type="hidden" name="sessionId" id="sessionId" value="<?php echo isset($_SESSION['id']) ? $_SESSION['id'] : "" ?>">
                        <button type="button" class="btn btn-flat btn-danger" id="btnSubmit">Mulai Survey</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script>
        $('#btnSubmit').click(function() {
            var values = {
                header: ''
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
                url: '<?= base_url('publics/start_survey') ?>',
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
                error:function(){
                    alert('gagal');
                    $('#submitBtn').attr('disabled', false);
                }
            });
        });
    </script>
</body>

</html>