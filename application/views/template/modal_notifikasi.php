<section class="contact_us">
    <div class="modal fade" id="modalNotifikasi" tabindex="-1" aria-labelledby="modalNotifikasi" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#182260;">
                    <!-- <img src="<?php echo base_url('image/survey-sehat.jpeg') ?>" width="10%" alt=""> -->
                    <h5 class="modal-title" id="exampleModalLabel" style="color:white">MOHON LENGKAPI BIODATA ANDA UNTUK MENGIKUTI SURVEY !</h5>
                   
                </div>
                <div class="modal-body">
                    <?php $this->load->view('template/user_profile');?>
                </div>
                <div class="modal-footer">
                   <a href="<?=base_url('auth_client/logout')?>" class="btn btn-warning">Log Out</a>
                </div>
            </div>
        </div>
    </div>
</section>
