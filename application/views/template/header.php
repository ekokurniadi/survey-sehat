<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#182260">

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
    <!-- load maps CDN -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <title id="title">{{title}}</title>
</head>

<body>
    <section class="headers">
        <div class="container py-3">
            <div class="row">
                <div class="col-md-3 col-sm-4 col-xs-4 py-2">
                    <!-- <img src="<?php echo base_url() ?>image/survey-sehat.png" alt="" class="img-fluid" width="100px"> -->
                    <strong>Survey</strong>Sehat
                </div>
                <?php $id = isset($_SESSION['id']) ? $_SESSION['id'] : "" ?>
                <?php if ($id == "") { ?>
                    <div class="col-md-4 d-flex align-items-center ml-auto mb-3">
                        <a href="#" class="btn btn-flat btn-primary px-5 mr-2" data-toggle="modal" data-target="#exampleModalRegister">Daftar</a>
                        <a href="#" class="btn btn-flat btn-danger px-5" data-toggle="modal" data-target="#exampleModal">Login</a>
                    </div>
                <?php } else { ?>
                    <?php $gambar = $this->db->get_where('user', array('id' => $id))->row() ?>
                    <div class="col-md-5 ml-auto mb-3">
                        <a href="#" class="btn btn-flat btn-sm btn-primary"></i> Penukaran</a>
                        <a href="#" class="btn btn-flat btn-sm btn-primary" style="background-color: #f52060;"><i class="fas fa-coins" id="point" style="color:white"></i> </a>
                        <?php if ($gambar->foto_profil == "") { ?>
                            <img src="<?php echo base_url() . 'image/default.png' ?>" width="50px" height="50px" class="rounded-circle mr-" alt="">
                        <?php } else { ?>
                            <img src="<?php echo base_url('image/') . $gambar->foto_profil ?>" width="50px" height="50px" class="rounded-circle mr-" alt="">
                        <?php } ?>
                        <a href="#" class="btn btn-flat btn-sm btn-default" style="color: white;"><?= $gambar->nama ?></a>
                        <div class="dropdown">
                            <button class="dropbtn btn btn-flat btn-sm btn-default" id="ntf"><i class="fa fa-bell"></i></button>
                            <div class="dropdown-content">
                                <ul class="dropdown-notif">


                                </ul>
                            </div>
                        </div>
                        <div class="dropdown2">
                            <button class="dropbtn btn btn-flat btn-sm btn-default" id="drp"><i class="fa fa-bars"></i></button>
                            <div class="dropdown-content2">
                                <ul class="dropdown-notif2">
                                    <li>
                                        <a href="">
                                            <i class="fa fa-user rounded-circle"></i> Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <i class="fa fa-lock rounded-password"></i> Ganti Password
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <i class="fas fa-coins rounded-password"></i> Penukaran Poin
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <i class="fas fa-trash rounded-password"></i> Hapus Akun
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('auth_client/logout') ?>">
                                            <i class="fa fa-sign-out rounded-password"></i> Logout
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>

                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <section class="navigation">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span>
                </button>
                <span class="navbar-toggler" style="font-size: 15px; color:white;border:none">
                    <strong>Survey</strong>Sehat
                </span>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item  px-3">
                            <a class="nav-link" href="<?= base_url('publics') ?>">Halaman Muka <span class="sr-only">(current)</span></a>
                            <div class="set1" <?php echo $this->uri->segment(2) == "" ? "" :  "style='display: none;'" ?>>&nbsp;</div>
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
                            <div class="set1" <?php echo $this->uri->segment(2) == "contact" ? "" :  "style='display: none;'" ?>>&nbsp;</div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>
    <?php $this->load->view('template/modal_login') ?>
    <?php $this->load->view('template/register_modal') ?>
    <div style="margin-top: 8px" id="message">
        <?php
        if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
        ?>
            <script>
                Swal.fire({
                    icon: '<?php echo $_SESSION['tipe'] ?>',
                    title: 'Notification',
                    text: '<?php echo $_SESSION['pesan'] ?>',

                })
            </script>
        <?php
        }
        $_SESSION['pesan'] = '';

        ?>
    </div>


    <script>
        var title = new Vue({
            el: '#title',
            data: {
                title: '<?php echo $this->db->get('profil_perusahaan')->row()->nama_perusahaan ?>'
            }
        });
    </script>

    <script>
        $('#ntf').on('click', function(e) {
            $('.dropdown-content').toggle('slow');
            $('.dropdown-content').toggleClass('blo');
        });
        $('#drp').on('click', function(e) {
            $('.dropdown-content2').toggle('slow');
            $('.dropdown-content2').toggleClass('blo');
        });
    </script>

    <script>
        $(document).ready(function() {
            get_notif();
            getPengumuman();
            setTimeout(get_notif, 5000);
            setInterval(get_notif, 5000); // The interval set to 20 seconds
            setInterval(getPengumuman, 5000); // The interval set to 20 seconds

        })

        function get_notif() {
            $.ajax({
                url: "<?php echo site_url('publics/getPoint'); ?>",
                cache: false,
                type: "POST",
                dataType: 'JSON',
                success: function(response) {
                    showPoint(response);
                },
            });
        }

        function showPoint(response) {
            $('#point').text(response.total_notif + " Point");
        }

        function getPengumuman() {
            $.ajax({
                url: "<?php echo site_url('dashboard/getNotification'); ?>",
                cache: false,
                type: "POST",
                dataType: 'JSON',
                success: function(response) {
                    showPengumuman(response);
                },
            });
        }

        function showPengumuman(response) {
            $(".dropdown-notif").html('');
            var html = '';
            for (rsp of response.data) {
                html += "<li><a href='" + rsp[3] + "'><i class='fa fa-info'> Notifikasi</i><div class='dropdown-item-desc'>" + rsp[4] + "</div></a><span></span></li>";
                // toastr_success(rsp.pesan);        
            }
            // console.log(popup_showed);
            $(".dropdown-notif").append(html);
        }
    </script>