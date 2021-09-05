<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Survey Sehat </title>
</head>
<?php
$batas = 1;
$kode_survey = $_GET['q'];
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

$previous = $halaman - 1;
$next = $halaman + 1;

$data = $this->db->get_where('survey_pertanyaan', array('kode_survey' => $kode_survey));
$jumlah_data = $data->num_rows();
$total_halaman = ceil($jumlah_data / $batas);

$data_pertanyaan = $this->db->query("select * from survey_pertanyaan where kode_survey='$kode_survey' limit $halaman_awal, $batas");
$nomor = $halaman_awal + 1;
?>

<body style="padding:10px">

    <div class="container">
        <div class="row">
            <div class="col-md-12">

            </div>
            <br>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <img src="<?= base_url('image/survey-sehat.jpeg') ?>" alt="survey sehat" class="img-responsive" width="80px;">
                        <h5 class="text-center d-flex align-content-center"></h5>
                    </div>
                    <div class="card-body">
                        <form method="post" method="POST" enctype="multipart/form-data" id="form_">
                            <div class="table-responsive">
                                <table>
                                    <?php
                                    foreach ($data_pertanyaan->result() as $rows) : ?>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <?= $nomor; ?>. <?= $rows->pertanyaan ?>
                                                    <input type="hidden" name="id_pertanyaan" id="id_pertanyaan" value="<?= $rows->id ?>">

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="jawaban_1" name="jawaban" value='<?= $rows->jawaban_1 ?>'>

                                                    <?= $rows->jawaban_1 ?>

                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="jawaban_2" name="jawaban" value='<?= $rows->jawaban_2 ?>'>

                                                    <?= $rows->jawaban_2 ?>

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="jawaban_3" name="jawaban" value='<?= $rows->jawaban_3 ?>'>

                                                    <?= $rows->jawaban_3 ?>

                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="jawaban_4" name="jawaban" value='<?= $rows->jawaban_4 ?>'>

                                                    <?= $rows->jawaban_4 ?>

                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    endforeach; ?>
                                    <?php if ($halaman > $total_halaman) { ?>
                                        <tr>
                                            <td>
                                                <img src="<?= base_url() ?>image/thx.jpg" alt="" width="30%">
                                                <br>
                                                <br>
                                                <p>
                                                    Terima kasih Anda telah menjawab Survey,
                                                    Klik tombol simpan untuk menyimpan
                                                </p>

                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table>
                                <!-- <nav>
                                    <ul class="pagination justify-content-left">
                                    <?php if ($halaman > 1) { ?>
                                        <li class="page-item">
                                            <a class="page-link" <?php if ($halaman > 1) {
                                                                        echo "href=?q=$kode_survey&halaman=$previous'";
                                                                    } ?>>Prev</i></a>
                                        </li>
                                    <?php } ?>
                                         <?php if ($halaman < $total_halaman) { ?>                           
                                        <li class="page-item">
                                            <a class="page-link" <?php if ($halaman < $total_halaman) {
                                                                        echo "href=?q=$kode_survey&halaman=$next'";
                                                                    } ?>>Next</a>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </nav> -->
                            </div>
                    </div>
                    <div class="card-footer">
                        <?php if ($halaman > $total_halaman) { ?>
                            <button type="button" class="btn btn-flat btn-primary" id="btnSubmit"><span class="fa fa-save"></span> Simpan Survey</button>
                        <?php } ?>

                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script type="text/javascript">
        function preventBack() {
            window.history.forward();
        }
        setTimeout("preventBack()", 0);
        window.onunload = function() {
            null
        };
    </script>
    <script>
        $('input[type=radio][name=jawaban]').on('change', function() {
            var value = {
                id_survey: '<?= $kode_survey ?>',
                id_soal: $('#id_pertanyaan').val(),
                id_user: <?php echo $_SESSION['id'] ?>,
                jawaban: this.value,
            }
            console.log(value);
            $.ajax({
                url: '<?= base_url('publics/input_survey_action') ?>',
                type: 'POST',
                data: value,
                cache: false,
                dataType: 'JSON',
                success: function(response) {
                    window.location = '<?php echo base_url() ?>publics/input_survey?q=<?= $kode_survey ?>&halaman=<?= $next ?>';
                },
                error: function() {
                    alert('gagal');
                }
            });
        });
    </script>
    <script>
        $('#btnSubmit').click(function() {
            var values = {
                id_survey: '<?= $kode_survey ?>',
            }
            $.ajax({
                beforeSend: function() {
                    $('#submitBtn').attr('disabled', true);
                    $('#submitBtn').html('<i class="fa fa-spinner fa-spin"></i> Process');
                },
                url: '<?= base_url('publics/close_survey') ?>',
                type: 'POST',
                data: values,
                cache: false,
                dataType: 'JSON',
                success: function(response) {
                    $('#submitBtn').html('<i class="fa fa-save"></i> Save');
                    if (response.status == 'sukses') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Oops...',
                            text: response.pesan,
                        });
                        setTimeout(() => {
                            window.location = response.link;
                        }, 2000);
                    } else {
                        $('#submitBtn').attr('disabled', false);
                        alert(response.pesan);
                    }
                },
                error: function() {
                    alert('gagal');
                    $('#submitBtn').attr('disabled', false);
                }
            });
        });
    </script>


</body>

</html>