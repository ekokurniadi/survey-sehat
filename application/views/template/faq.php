<section class="faq">
    <div class="container mb-3">
        <div class="row">
            <div class="col-md-12 mb-2">
                <img src="<?php echo base_url() ?>image/default/images/home/icon_05.gif" width="30px" alt="">
                <strong>Ajukan Pertanyaan</strong>
            </div>
        </div>

        <div class="row container-perkenalan">
            <table style="vertical-align: top;" width="100%">
                <form method="post" enctype="multipart/form-data" id="form_">
                    <tr>
                        <td width="20%"><label for="" class="label">Nama</label></td>
                        <td><input type="text" required class="form-control tanya" name="nama" id="nama" placeholder="Nama"></td>
                    </tr>
                    <tr>
                        <td><label for="" class="label">Email</label></td>
                        <td><input type="text" required class="form-control tanya" name="email" id="email" placeholder="Email"></td>
                    </tr>
                    <tr>
                        <td><label for="" class="label">Kategori Pertanyaan</label></td>
                        <td>
                            <select name="kategori" required id="kategori" class="form-control">
                                <option value="">Choose an option</option>
                                <option value="Daftar">Pendaftaran</option>
                                <option value="Login">Login - Password</option>
                                <option value="Survey">Survey</option>
                                <option value="Poin">Penukaran Poin</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </td>

                    </tr>
                    <tr>
                        <td><label for="" class="label">Pertanyaan</label></td>
                        <td>
                            <textarea name="prt" id="prt" required class="form-control" cols="30" rows="5"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <button type="button" id="submitMessage" class="btn btn-flat btn-primary mt-2"><span class="fa fa-send"></span> Send</button>
                        </td>
                    </tr>
            </table>
            </form>
        </div>

        <div class="row">
            <div class="col-md-12 mt-2 mb-2">
                <img src="<?php echo base_url() ?>image/default/images/home/icon_05.gif" width="30px" alt="">
                <strong>Pertanyaan Umum</strong>
            </div>
        </div>
        <div class="row container-perkenalan">
            <div class="col-md-12 mb-3 mt-3">
                <ul class="nav nav-pills nav-fill tabs">
                    <li class="nav-item">
                        <a class="nav-link" id="tOne" onclick="setPage(1)" aria-current="page">Daftar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tTwo" onclick="setPage(2)" aria-current="page">Login - Password</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tThree" onclick="setPage(3)" aria-current="page">Daftar Survey</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tFour" onclick="setPage(4)" aria-current="page">Poin Bonus</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tFive" onclick="setPage(5)" aria-current="page">Lainnya</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row container-perkenalan" id="daftar_">
            <?php $daftar = $this->db->get_where('faq', array('status' => 'Close', 'kategori' => 'Daftar'))->result() ?>
            <?php foreach ($daftar as $rows) : ?>
                <div class="col-md-12 d-flex justify-content-between">
                    <p class="pertanyaan"><?= $rows->pertanyaan ?></p>
                    <a class="btn" type="button" data-toggle="collapse" data-target="#collapseExample<?= $rows->id ?>" aria-expanded="false" aria-controls="collapseExample<?= $rows->id ?>">
                        <i class="fa fa-chevron-down"></i>
                    </a>
                </div>
                <div class="col-md-12 mb-2">
                    <div class="collapse" id="collapseExample<?= $rows->id ?>">
                        <div class="card card-body jawaban">
                            <?php echo $rows->jawaban ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
        <div class="row container-perkenalan" id="login">
            <?php $daftar2 = $this->db->get_where('faq', array('status' => 'Close', 'kategori' => 'Login'))->result() ?>
            <?php foreach ($daftar2 as $rows) : ?>
                <div class="col-md-12 d-flex justify-content-between">
                    <p class="pertanyaan"><?= $rows->pertanyaan ?></p>
                    <a class="btn" type="button" data-toggle="collapse" data-target="#collapseExample<?= $rows->id ?>" aria-expanded="false" aria-controls="collapseExample<?= $rows->id ?>">
                        <i class="fa fa-chevron-down"></i>
                    </a>
                </div>
                <div class="col-md-12 mb-2">
                    <div class="collapse" id="collapseExample<?= $rows->id ?>">
                        <div class="card card-body jawaban">
                            <?php echo $rows->jawaban ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
        <div class="row container-perkenalan" id="survey">
            <?php $daftar3 = $this->db->get_where('faq', array('status' => 'Close', 'kategori' => 'Survey'))->result() ?>
            <?php foreach ($daftar3 as $rows) : ?>
                <div class="col-md-12 d-flex justify-content-between">
                    <p class="pertanyaan"><?= $rows->pertanyaan ?></p>
                    <a class="btn" type="button" data-toggle="collapse" data-target="#collapseExample<?= $rows->id ?>" aria-expanded="false" aria-controls="collapseExample<?= $rows->id ?>">
                        <i class="fa fa-chevron-down"></i>
                    </a>
                </div>
                <div class="col-md-12 mb-2">
                    <div class="collapse" id="collapseExample<?= $rows->id ?>">
                        <div class="card card-body jawaban">
                            <?php echo $rows->jawaban ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
        <div class="row container-perkenalan" id="poin">
            <?php $daftar4 = $this->db->get_where('faq', array('status' => 'Close', 'kategori' => 'Poin'))->result() ?>
            <?php foreach ($daftar4 as $rows) : ?>
                <div class="col-md-12 d-flex justify-content-between">
                    <p class="pertanyaan"><?= $rows->pertanyaan ?></p>
                    <a class="btn" type="button" data-toggle="collapse" data-target="#collapseExample<?= $rows->id ?>" aria-expanded="false" aria-controls="collapseExample<?= $rows->id ?>">
                        <i class="fa fa-chevron-down"></i>
                    </a>
                </div>
                <div class="col-md-12 mb-2">
                    <div class="collapse" id="collapseExample<?= $rows->id ?>">
                        <div class="card card-body jawaban">
                            <?php echo $rows->jawaban ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="row container-perkenalan" id="lainnya">
            <?php $daftar5 = $this->db->get_where('faq', array('status' => 'Close', 'kategori' => 'Lainnya'))->result() ?>
            <?php foreach ($daftar5 as $rows) : ?>
                <div class="col-md-12 d-flex justify-content-between">
                    <p class="pertanyaan"><?= $rows->pertanyaan ?></p>
                    <a class="btn" type="button" data-toggle="collapse" data-target="#collapseExample<?= $rows->id ?>" aria-expanded="false" aria-controls="collapseExample<?= $rows->id ?>">
                        <i class="fa fa-chevron-down"></i>
                    </a>
                </div>
                <div class="col-md-12 mb-2">
                    <div class="collapse" id="collapseExample<?= $rows->id ?>">
                        <div class="card card-body jawaban">
                            <?php echo $rows->jawaban ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
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
</script>

<script>
    function kosongkan() {
        $('#nama').val("");
        $('#email').val("");
        $('#kategori').val("");
        $('#prt').val("");
    }

    $('#submitMessage').click(function() {
        var form = $('#form_').serializeArray();
        var values = {}
        for (field of form) {
            values[field.name] = field.value;
        }
        var nama = $('#nama').val();
        var email = $('#email').val();
        var kategori = $('#kategori').val();
        var prt = $('#prt').val();

        if (nama === "" || nama === undefined || email === "" || email === undefined || kategori === "" || kategori === undefined || prt === "" || prt === undefined) {
            validationError();
        } else {
            $.ajax({
                beforeSend: function() {
                    $('#submitMessage').attr('disabled', true);
                    $('#submitMessage').html('<i class="fa fa-spinner fa-spin"></i> Process');
                },
                url: '<?= base_url('publics/saveMessage') ?>',
                type: 'POST',
                data: values,
                cache: false,
                dataType: 'JSON',
                success: function(response) {
                    $('#submitMessage').html('<span class="fa fa-send"></span> Send');
                    $('#submitMessage').attr('disabled', false);
                    if (response.status == 'sukses') {
                        success_send();
                        kosongkan();
                    } else {
                        $('#submitMessage').attr('disabled', false);
                        gagal_send();
                    }
                },
                error: function() {
                    gagal_send();
                    alert("Gagal");
                    $('#submitMessage').attr('disabled', false);
                }
            });
        }
    });
</script>