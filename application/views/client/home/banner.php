<div class="home-block clearfix">
    <div class="home-block__left">
        <h2 class="h2-title"><img src="<?php echo base_url() ?>image/default/images/home/icon_05.gif" alt="" height="30" width="37" />DAFTAR SURVEI</h2>
        <div class="home-block__inner">
            <?php 
           $id = isset($_SESSION['id']) ? $_SESSION['id'] : 0;
           foreach($dataSurvey->result() as $rows):?>
            <div class="home-block_item heightLine-block01">
                <p class="home-block__date "><?php echo formatTanggal($rows->periode_awal)?> - <?php echo formatTanggal($rows->periode_akhir)?></p>
                <div class="clearfix m_b45">
                    <p class="home-block__txt"><?php echo $rows->judul?></p>
                    <p class="home-block__point"><span><?php echo $rows->poin?></span>poin</p>
                </div>
                <?php
                $cek  = $this->db->query("SELECT * from survey_member where kode_survey='$rows->id' and id_user ='$id'");?>
                <?php 
                if($cek->num_rows() > 0){?>

                <?php }else{?>
                <ul class="button-list clearfix">
                    <li><a href="<?php echo base_url('publics/survey_register?id='.$rows->id)?>" class="pink-bg popup-show-register">Daftar</a></li>
                </ul>
                <?php } ?>
            </div>
           <?php endforeach;?>
            <p class="link_more heightLine-block06"><a href="index/index/redirect/_public_index_public-survey.html"><a href="index/login-popup-new/redirect/_public_index_public-survey.html" class="popup-show-register">Lihat Lainnya</a></a></p>
        </div>
    </div>

    <div class="home-block__right">
        <h2 class="h2-title"><img src="<?php echo base_url() ?>image/default/images/home/icon_06.gif" alt="" height="30" width="37" />SURVEI CEPAT</h2>
        <div class="home-block__inner">
            <div class="home-block_item heightLine-block01">
                <ul class="home-block__profile clearfix">
                    <li><span class="name"><img src="<?php echo base_url() ?>image/default/images/home/icon_09.gif" alt="" height="14" width="10" />Rahmatik...</span>
                        <p class="profile-show">RahmatikaChoiria</p>
                    </li>
                    <li><span class="time"><img src="<?php echo base_url() ?>image/default/images/home/icon_10.gif" alt="" height="14" width="14" />29-07-2021 - 05-08-2021</span></li>
                    <li><span class="answer"><img src="<?php echo base_url() ?>image/default/images/home/icon_11.gif" alt="" height="14" width="17" />3880 menjawab</span>
                        <p class="profile-show">3880 menjawab</p>
                    </li>
                    <li class="home-block__last"><span class="subject"><img src="<?php echo base_url() ?>image/default/images/home/icon_12.gif" alt="" height="14" width="19" /><a href="index/login-popup-new/redirect/_public_index_resultqquestion_cate_2.html" class="popup-show-register">Hidup</a></span>
                        <p class="profile-show">Hidup</p>
                    </li>
                </ul>
                <p class="m_b45">Apa kamu pernah naik becak?</p>
                <ul class="button-list clearfix">
                    <li><a href="index/login-popup-new/redirect/_public_index_single-quick-survey_qid_97988.html" class="orange-bg popup-show-register">Vote</a></li>
                    <li><a href="index/result-quick-survey/qid/97988.html" class="pink-bg">Hasil</a></li>
                </ul>
                <p class="home-block-right__txt"><img src="<?php echo base_url() ?>image/default/images/home/icon_07.gif" alt="" height="14" width="14" />Buka</p>
            </div>
            <div class="home-block_item heightLine-block02">
                <ul class="home-block__profile clearfix">
                    <li><span class="name"><img src="<?php echo base_url() ?>image/default/images/home/icon_09.gif" alt="" height="14" width="10" />arihrahm...</span>
                        <p class="profile-show">arihrahmawati</p>
                    </li>
                    <li><span class="time"><img src="<?php echo base_url() ?>image/default/images/home/icon_10.gif" alt="" height="14" width="14" />29-07-2021 - 05-08-2021</span></li>
                    <li><span class="answer"><img src="<?php echo base_url() ?>image/default/images/home/icon_11.gif" alt="" height="14" width="17" />3718 menjawab</span>
                        <p class="profile-show">3718 menjawab</p>
                    </li>
                    <li class="home-block__last"><span class="subject"><img src="<?php echo base_url() ?>image/default/images/home/icon_12.gif" alt="" height="14" width="19" /><a href="index/login-popup-new/redirect/_public_index_resultqquestion_cate_2.html" class="popup-show-register">Hidup</a></span>
                        <p class="profile-show">Hidup</p>
                    </li>
                </ul>
                <p class="m_b45">Manakah yang lebih kamu suka?</p>
                <ul class="button-list clearfix">
                    <li><a href="index/login-popup-new/redirect/_public_index_single-quick-survey_qid_98019.html" class="orange-bg popup-show-register">Vote</a></li>
                    <li><a href="index/result-quick-survey/qid/98019.html" class="pink-bg">Hasil</a></li>
                </ul>
                <p class="home-block-right__txt"><img src="<?php echo base_url() ?>image/default/images/home/icon_07.gif" alt="" height="14" width="14" />Buka</p>
            </div>
            <div class="home-block_item heightLine-block03">
                <ul class="home-block__profile clearfix">
                    <li><span class="name"><img src="<?php echo base_url() ?>image/default/images/home/icon_09.gif" alt="" height="14" width="10" />Krisnata</span>
                        <p class="profile-show">Krisnata</p>
                    </li>
                    <li><span class="time"><img src="<?php echo base_url() ?>image/default/images/home/icon_10.gif" alt="" height="14" width="14" />29-07-2021 - 05-08-2021</span></li>
                    <li><span class="answer"><img src="<?php echo base_url() ?>image/default/images/home/icon_11.gif" alt="" height="14" width="17" />3671 menjawab</span>
                        <p class="profile-show">3671 menjawab</p>
                    </li>
                    <li class="home-block__last"><span class="subject"><img src="<?php echo base_url() ?>image/default/images/home/icon_12.gif" alt="" height="14" width="19" /><a href="index/login-popup-new/redirect/_public_index_resultqquestion_cate_2.html" class="popup-show-register">Hidup</a></span>
                        <p class="profile-show">Hidup</p>
                    </li>
                </ul>
                <p class="m_b45">Apakah Anda memiliki sepatu khusus olah raga?</p>
                <ul class="button-list clearfix">
                    <li><a href="index/login-popup-new/redirect/_public_index_single-quick-survey_qid_98029.html" class="orange-bg popup-show-register">Vote</a></li>
                    <li><a href="index/result-quick-survey/qid/98029.html" class="pink-bg">Hasil</a></li>
                </ul>
                <p class="home-block-right__txt"><img src="<?php echo base_url() ?>image/default/images/home/icon_07.gif" alt="" height="14" width="14" />Buka</p>
            </div>
            <div class="home-block_item heightLine-block04">
                <ul class="home-block__profile clearfix">
                    <li><span class="name"><img src="<?php echo base_url() ?>image/default/images/home/icon_09.gif" alt="" height="14" width="10" />Krisnata</span>
                        <p class="profile-show">Krisnata</p>
                    </li>
                    <li><span class="time"><img src="<?php echo base_url() ?>image/default/images/home/icon_10.gif" alt="" height="14" width="14" />29-07-2021 - 05-08-2021</span></li>
                    <li><span class="answer"><img src="<?php echo base_url() ?>image/default/images/home/icon_11.gif" alt="" height="14" width="17" />3651 menjawab</span>
                        <p class="profile-show">3651 menjawab</p>
                    </li>
                    <li class="home-block__last"><span class="subject"><img src="<?php echo base_url() ?>image/default/images/home/icon_12.gif" alt="" height="14" width="19" /><a href="index/login-popup-new/redirect/_public_index_resultqquestion_cate_2.html" class="popup-show-register">Hidup</a></span>
                        <p class="profile-show">Hidup</p>
                    </li>
                </ul>
                <p class="m_b45">Manakah yang biasanya kamu gunakan?</p>
                <ul class="button-list clearfix">
                    <li><a href="index/login-popup-new/redirect/_public_index_single-quick-survey_qid_98038.html" class="orange-bg popup-show-register">Vote</a></li>
                    <li><a href="index/result-quick-survey/qid/98038.html" class="pink-bg">Hasil</a></li>
                </ul>
                <p class="home-block-right__txt"><img src="<?php echo base_url() ?>image/default/images/home/icon_07.gif" alt="" height="14" width="14" />Buka</p>
            </div>
            <div class="home-block_item heightLine-block05">
                <ul class="home-block__profile clearfix">
                    <li><span class="name"><img src="<?php echo base_url() ?>image/default/images/home/icon_09.gif" alt="" height="14" width="10" />fifah08</span>
                        <p class="profile-show">fifah08</p>
                    </li>
                    <li><span class="time"><img src="<?php echo base_url() ?>image/default/images/home/icon_10.gif" alt="" height="14" width="14" />29-07-2021 - 05-08-2021</span></li>
                    <li><span class="answer"><img src="<?php echo base_url() ?>image/default/images/home/icon_11.gif" alt="" height="14" width="17" />3665 menjawab</span>
                        <p class="profile-show">3665 menjawab</p>
                    </li>
                    <li class="home-block__last"><span class="subject"><img src="<?php echo base_url() ?>image/default/images/home/icon_12.gif" alt="" height="14" width="19" /><a href="index/login-popup-new/redirect/_public_index_resultqquestion_cate_2.html" class="popup-show-register">Hidup</a></span>
                        <p class="profile-show">Hidup</p>
                    </li>
                </ul>
                <p class="m_b45">Apakah kamu selalu sarapan di pagi hari?</p>
                <ul class="button-list clearfix">
                    <li><a href="index/login-popup-new/redirect/_public_index_single-quick-survey_qid_98053.html" class="orange-bg popup-show-register">Vote</a></li>
                    <li><a href="index/result-quick-survey/qid/98053.html" class="pink-bg">Hasil</a></li>
                </ul>
                <p class="home-block-right__txt"><img src="<?php echo base_url() ?>image/default/images/home/icon_07.gif" alt="" height="14" width="14" />Buka</p>
            </div>
            <div class="clearfix heightLine-block06">
                <div class="box-button"><a href="news/index/new-rule-quick-survey.html" class="left">Peraturan</a><a href="index/login-popup-new/redirect/_public_index_resultqquestion.html" class="popup-show-register">Buat Kuesioner</a></div>
                <p class="link_more"><a href="index/login-popup-new/redirect/_public_index_resultqquestion_active_1.html" class="popup-show-register">Lihat Lainnya</a></p>
            </div>
        </div>
    </div>
</div>