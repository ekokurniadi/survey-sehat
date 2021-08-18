<div class="home-block clearfix">
    <?php
    date_default_timezone_set('Asia/Jakarta');
    $date = date('Y-m-d');
    $batas = 5;
    $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
    $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

    $previous = $halaman - 1;
    $next = $halaman + 1;

    $data = $this->db->query("SELECT * FROM survey WHERE '$date' BETWEEN periode_awal and periode_akhir");
    $jumlah_data = $data->num_rows();
    $total_halaman = ceil($jumlah_data / $batas);

    $dataSurvey = $this->db->query("SELECT * FROM survey WHERE '$date' BETWEEN periode_awal and periode_akhir limit $halaman_awal, $batas");
    $nomor = $halaman_awal + 1;
    ?>
    <div class="home-block__left">
        <h2 class="h2-title"><img src="<?php echo base_url() ?>image/default/images/home/icon_05.gif" alt="" height="30" width="37" />DAFTAR SURVEI</h2>
        <div class="home-block__inner">
            <?php
            $id = isset($_SESSION['id']) ? $_SESSION['id'] : 0;
            foreach ($dataSurvey->result() as $rows) : ?>
                <div class="home-block_item heightLine-block01">
                    <p class="home-block__date "><?php echo formatTanggal($rows->periode_awal) ?> - <?php echo formatTanggal($rows->periode_akhir) ?></p>
                    <div class="clearfix m_b45">
                        <p class="home-block__txt"><?php echo $rows->judul ?></p>
                        <p class="home-block__point"><span><?php echo $rows->poin ?></span>poin</p>
                    </div>
                    <?php
                    $cek  = $this->db->query("SELECT * from survey_member where kode_survey='$rows->kode_survey' and id_user ='$id'"); ?>
                    <?php
                    if ($cek->num_rows() > 0) { ?>
                        <ul class="button-list clearfix">
                            <li><a href="#" class="gray-bg popup-show-register">Selesai</a></li>
                        </ul>
                    <?php } else { ?>
                        <ul class="button-list clearfix">
                            <li><a href="<?php echo base_url('publics/survey_register?id=' . $rows->id) ?>" class="pink-bg popup-show-register">Daftar</a></li>
                        </ul>
                    <?php } ?>
                </div>
            <?php endforeach; ?>
            <div class="pager-link">
                <ul class="pager-link__list clearfix">

                    <li class="pager-txt">
                        <a class="page-link" <?php if ($halaman > 1) {
                                                    echo "href=?halaman=$previous'";
                                                } ?>>Halaman sebelumnya</i></a>
                    </li>

                    <li class="prev-link">
                        <a class="page-link" <?php if ($halaman > 1) {
                                                    echo "href=?halaman=$previous'";
                                                } ?>>
                            <img src="<?php echo base_url() ?>image/default/images/common/icon_prev.gif" width="20" height="20" alt="" />
                        </a>
                    </li>
                    <?php for ($i = 1; $i <= $total_halaman; $i++) { ?>
                        <li><a <?php echo $halaman == $i ? "class='active'" : "" ?> href="<?php echo base_url('publics') . "?halaman=$i'" ?>"><?= $i ?></a></li>
                    <?php } ?>
                    <li class="next-link">
                        <a class="page-link" <?php if ($halaman < $total_halaman) {
                                                    echo "href=?halaman=$next'";
                                                } ?>>
                            <img src="<?php echo base_url() ?>image/default/images/common/icon_next.gif" width="20" height="20" alt="" />
                        </a>
                    </li>
                    <li class="pager-txt">
                        <a class="page-link" <?php if ($halaman < $total_halaman) {
                                                    echo "href=?halaman=$next'";
                                                } ?>>Halaman selanjutnya</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <?php $this->load->view('client/home/kuisioner')?>
</div>