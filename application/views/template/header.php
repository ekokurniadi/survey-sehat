<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

    <!-- load jquery CDN -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>template/style.css">
    <script src="<?= base_url("js/vue/qs.min.js") ?>" type="text/javascript"></script>
    <script src="<?= base_url("js/vue/vue.min.js") ?>" type="text/javascript"></script>
    <script src="<?= base_url("js/vue/axios.min.js") ?>" type="text/javascript"></script>
    <script src="<?= base_url("js/vue/accounting.js") ?>" type="text/javascript"></script>
    <script src="<?= base_url("js/vue/vue-numeric.min.js") ?>" type="text/javascript"></script>
    <script src="<?= base_url("js/lodash.min.js") ?>" type="text/javascript"></script>
    <script type="text/javascript" src="<?= base_url("js/moment.min.js") ?>"></script>
    <script type="text/javascript" src="<?= base_url("js/daterangepicker.min.js") ?>"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title id="title">{{title}}</title>
</head>

<body>
    <section class="headers">
        <div class="container py-3">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4 py-2">
                    <!-- <img src="<?php echo base_url() ?>image/survey-sehat.png" alt="" class="img-fluid" width="100px"> -->
                    <strong>Survey</strong>Sehat
                </div>
                <div class="col-md-4 d-flex align-items-center ml-auto mb-3">
                    <button class="btn btn-flat btn-primary mr-2 px-5">Daftar</button>
                    <button class="btn btn-flat btn-danger px-5">Login</button>
                </div>
            </div>
        </div>
    </section>
    <section class="navigation">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item  px-3">
                            <a class="nav-link" href="<?= base_url('publics') ?>">Halaman Muka <span class="sr-only">(current)</span></a>
                            <div class="set1"  <?php echo $this->uri->segment(2) == "" ? "" :  "style='display: none;'" ?>>&nbsp;</div>
                        </li>

                        <li class="nav-item px-3">
                            <a class="nav-link" href="<?= base_url('publics/perkenalan') ?>">Perkenalan</a>
                            <div class="set1" <?php echo $this->uri->segment(2) == "perkenalan" ? "" :  "style='display: none;'" ?>>&nbsp;</div>
                        </li>
                        <li class="nav-item px-3">
                            <a class="nav-link" href="<?= base_url('publics/pointhadiah') ?>">Point dan Hadiah</a>
                            <div class="set1" <?php echo $this->uri->segment(2) == "pointhadiah" ? "" :  "style='display: none;'" ?>>&nbsp;</div>
                        </li>
                        <li class="nav-item px-3">
                            <a class="nav-link" href="<?= base_url('publics/laporan_penelitian') ?>">Laporan Penelitian</a>
                            <div class="set1" <?php echo $this->uri->segment(2) == "laporan_penelitian" ? "" :  "style='display: none;'" ?>>&nbsp;</div>
                        </li>
                        <li class="nav-item px-3">
                            <a class="nav-link" href="<?= base_url('publics/faq') ?>">Q/A</a>
                            <div class="set1" <?php echo $this->uri->segment(2) == "faq" ? "" :  "style='display: none;'" ?>>&nbsp;</div>
                        </li>
                        <li class="nav-item px-3">
                            <a class="nav-link" href="<?= base_url('publics/contact') ?>">Hubungi Kami</a>
                            <div class="set1" <?php echo $this->uri->segment(2) == "contact" ? "" :  "style='display: none;'" ?> style="display: none;">&nbsp;</div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>


    <script>
        var title = new Vue({
            el: '#title',
            data: {
                title: '<?php echo $this->db->get('profil_perusahaan')->row()->nama_perusahaan ?>'
            }
        });
    </script>