
<div class="box-content">
        <div class="survey-box">
            <h3 class="survey-title"><span>KERJAKAN SURVEI SEKARANG UNTUK MENDAPATKAN BONUS POIN</span></h3>
            <ul class="survey-list clearfix">
                <?php foreach($alurPoint as $rows):?>
                <li class="">
                    <a href="register/acceptrule.html">
                        <span class="survey-box__item">
                            <span class="survey__sub-title"><?=$rows->label?></span>
                            <span class="survey-box__txt"><?=$rows->keterangan?></span>
                        </span>
                        <span class="survey-box__show"><span class="survey-show__txt"><?=$rows->label?></span></span>
                   </a>
                </li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>