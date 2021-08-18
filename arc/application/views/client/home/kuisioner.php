<?php
date_default_timezone_set('Asia/Jakarta');
$date = date('Y-m-d');
$batas = 5;
$halaman = isset($_GET['halaman_k']) ? (int)$_GET['halaman_k'] : 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

$previous = $halaman - 1;
$next = $halaman + 1;

$data = $this->db->query("SELECT * FROM kuisioner WHERE '$date' BETWEEN periode_awal and periode_akhir");
$jumlah_data = $data->num_rows();
$total_halaman = ceil($jumlah_data / $batas);

$dataKuisioner = $this->db->query("SELECT a.*,b.kategori_survey FROM kuisioner a join kategori_survey b on a.kategori=b.id  WHERE '$date' BETWEEN a.periode_awal and a.periode_akhir limit $halaman_awal, $batas");
$nomor = $halaman_awal + 1;
?>
<div class="home-block__right">
    <h2 class="h2-title"><img src="<?php echo base_url() ?>image/default/images/home/icon_06.gif" alt="" height="30" width="37" />SURVEI CEPAT</h2>
    <div class="home-block__inner">
        <?php foreach ($dataKuisioner->result() as $rows) : ?>
            <div class="home-block_item heightLine-block01">
                <ul class="home-block__profile clearfix">
                    <li><span class="time"><img src="<?php echo base_url() ?>image/default/images/home/icon_10.gif" alt="" height="14" width="14" /><?php echo formatTanggal($rows->periode_awal) ?> - <?php echo formatTanggal($rows->periode_akhir) ?></span></li>
                    <li><span class="answer"><img src="<?php echo base_url() ?>image/default/images/home/icon_11.gif" alt="" height="14" width="17" />3880 menjawab</span>
                        <p class="profile-show">3880 menjawab</p>
                    </li>
                    <li class="home-block__last"><span class="subject"><img src="<?php echo base_url() ?>image/default/images/home/icon_12.gif" alt="" height="14" width="19" /><a href="index/login-popup-new/redirect/_public_index_resultqquestion_cate_2.html" class="popup-show-register"><?= $rows->kategori_survey ?></a></span>
                        <p class="profile-show"><?= $rows->kategori_survey ?></p>
                    </li>
                </ul>
                <p class="m_b45"><?= $rows->pertanyaan ?></p>
                <ul class="button-list clearfix">
                    <li><a href="index/login-popup-new/redirect/_public_index_single-quick-survey_qid_97988.html" class="orange-bg popup-show-register">Vote</a></li>
                    <li><a href="<?php echo base_url('publics/hasil_kuisioner/' . $rows->id) ?>" class="pink-bg">Hasil</a></li>
                </ul>
                <p class="home-block-right__txt"><img src="<?php echo base_url() ?>image/default/images/home/icon_07.gif" alt="" height="14" width="14" />Buka</p>
            </div>
        <?php endforeach; ?>
        <div class="pager-link">
            <ul class="pager-link__list clearfix">

                <li class="pager-txt">
                    <a class="page-link" <?php if ($halaman > 1) {
                                                echo "href=?halaman_k=$previous'";
                                            } ?>>Halaman sebelumnya</i></a>
                </li>

                <li class="prev-link">
                    <a class="page-link" <?php if ($halaman > 1) {
                                                echo "href=?halaman_k=$previous'";
                                            } ?>>
                        <img src="<?php echo base_url() ?>image/default/images/common/icon_prev.gif" width="20" height="20" alt="" />
                    </a>
                </li>
                <?php for ($i = 1; $i <= $total_halaman; $i++) { ?>
                    <li><a <?php echo $halaman == $i ? "class='active'" : "" ?> href="<?php echo base_url('publics') . "?halaman_k=$i'" ?>"><?= $i ?></a></li>
                <?php } ?>
                <li class="next-link">
                    <a class="page-link" <?php if ($halaman < $total_halaman) {
                                                echo "href=?halaman_k=$next'";
                                            } ?>>
                        <img src="<?php echo base_url() ?>image/default/images/common/icon_next.gif" width="20" height="20" alt="" />
                    </a>
                </li>
                <li class="pager-txt">
                    <a class="page-link" <?php if ($halaman < $total_halaman) {
                                                echo "href=?halaman_k=$next'";
                                            } ?>>Halaman selanjutnya</a>
                </li>
            </ul>
        </div>
    </div>
</div>