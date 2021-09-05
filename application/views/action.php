<?php
$state = '';
$state2 = '';

if (count($this->input->post('filters')) > 0) {
    if (in_array($id_user, $this->input->post('filters'))) {
        $state = 'checked';
    }else{
        $state='';
    }
}
$kodeSurvey = $this->input->post('kode');
$cek = $this->db->query("SELECT * from survey_pilihan_user where kode_survey='$kodeSurvey' and id_user !=0");
if ($cek->num_rows() > 0) {
    foreach ($cek->result() as $rows) {
        if ($rows->id_user == $id_user) {
            $state2 = 'checked';
        }
    }
}
?>
<input <?= $state ?> <?= $state2 ?> type="checkbox" class='checkbox-item' data-id-user='<?= $id_user ?>'>