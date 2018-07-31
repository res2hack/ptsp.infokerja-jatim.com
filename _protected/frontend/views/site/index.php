<?php

use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'PTSP disnaker jatim';

?>
<div class="container-fluid">

<div class="row no-gutter">
  <div class="col-xs-6">
  <a href="<?php echo Url::to(['site/lowongan-luar-negeri']); ?>"><img src="<?= @uploads ?>/image/menu-lowongan-luar-negeri.png" style="width:100%"/></a>
    <a href="<?php echo Url::to(['site/ayo-ke-ptsp']); ?>"><img src="<?= @uploads ?>/image/menu-ayo-ke-ptps.png" style="width:100%"/></a>
    <a href="<?php echo Url::to(['site/direktori-disnaker']); ?>"><img src="<?= @uploads ?>/image/menu-direktori-disnaker.png" style="width:100%"/></a>
    <a href="<?php echo Url::to(['site/direktori-p3mi']); ?>"><img src="<?= @uploads ?>/image/menu-direktori-P3MI.png" style="width:100%"/></a>
    <a href="<?php echo Url::to(['site/direktori-blk']); ?>"><img src="<?= @uploads ?>/image/menu-direktori-BLK.png" style="width:100%"/></a>
    <a href="<?php echo Url::to(['site/prodesmigratif']); ?>"><img src="<?= @uploads ?>/image/menu-pro-desmigratif.png" style="width:100%"/></a>

    </div>
  <div class="col-xs-2" style="margin-bottom:30px">
    <div style="width: 60%; margin: 0 auto;">
    <a href="<?php echo Url::to(['site/pengumuman']); ?>"><img  src="<?= @uploads ?>/image/icon-pengumuman.jpg" style="width:100%"/></a>
    </div>
    <p style="font-weight:bold; font-size:20px;text-align:center; margin-top:20px">
    Pengumuman
    </p>
  </div>
  <div class="col-xs-2" style="margin-bottom:30px">
    <div style="width: 60%; margin: 0 auto;">
    <a href="<?php echo Url::to(['pencaker/create']); ?>"><img  src="<?= @uploads ?>/image/icon-daftar-pmi.jpg" style="max-height:105px; width:100%"/></a>
    </div>
    <p style="font-weight:bold; font-size:20px;text-align:center; margin-top:20px">
    Daftar Jadi PMI
    </p>
  </div>
  <div class="col-xs-2" style="margin-bottom:30px">
    <div style="width:60%; margin: 0 auto;">
    <a href="<?php echo Url::to(['site/direktori-kbri']); ?>"><img  src="<?= @uploads ?>/image/icon-kbri.jpg" style="width:100%"/></a>
    </div>
    <p style="font-weight:bold; font-size:20px;text-align:center; margin-top:20px">
    Info KBRI/Adnaker
    </p>
  </div>
  <div class="col-xs-2" style="margin-bottom:30px">
    <div style="width:60%; margin: 0 auto;">
    <a href="<?php echo Url::to(['site/syarat-jadi-pmi']); ?>"><img  src="<?= @uploads ?>/image/icon-syarat-pmi.png" style="width:100%"/></a>
    </div>
    <p style="font-weight:bold; font-size:20px;text-align:center; margin-top:20px">
    Syarat Jadi PMI
    </p>
  </div>
  <div class="col-xs-2" style="margin-bottom:30px">
    <div style="width:60%; margin: 0 auto;">
    <a href="<?php echo Url::to(['site/konsultasi']); ?>"><img  src="<?= @uploads ?>/image/icon-konsultasi.jpg" style="width:100%; max-height:105px"/></a>
    </div>
    <p style="font-weight:bold; font-size:20px;text-align:center; margin-top:20px;">
    Konsultasi
    </p>
  </div>
  <div class="col-xs-2" style="margin-bottom:30px">
    <div style="width:60%; margin: 0 auto;">
    <a href="<?php echo Url::to(['site/direktori-lsp']); ?>"><img  src="<?= @uploads ?>/image/icon-lsp.jpg" style="width:100%"/></a>
    </div>
    <p style="font-weight:bold; font-size:20px;text-align:center; margin-top:20px;">
    Info LSP
    </p>
  </div>
  <div class="col-xs-2" style="margin-bottom:30px">
    <div style="width:60%; margin: 0 auto;">
    <a href="<?php echo Url::to(['site/skema-kerja-pmi']); ?>"><img  src="<?= @uploads ?>/image/icon-skema-pmi.jpg" style="width:100%"/></a>
    </div>
    <p style="font-weight:bold; font-size:20px;text-align:center; margin-top:20px">
    Skema Kerja PMI
    </p>
  </div>
  <div class="col-xs-2" style="margin-bottom:30px">
    <div style="width:60%; margin: 0 auto;">
    <a href="<?php echo Url::to(['site/asuransi']); ?>"><img  src="<?= @uploads ?>/image/icon-asuransi.png"style="width:100%"/></a>
    </div>
    <p style="font-weight:bold; font-size:20px;text-align:center; margin-top:20px">
    Asuransi
    </p>
  </div>
  <div class="col-xs-2" style="margin-bottom:30px">
    <div style="width:60%; margin: 0 auto;">
    <a href="<?php echo Url::to(['site/game']); ?>"><img  src="<?= @uploads ?>/image/icon-game.jpg" style="width:100%"/></a>
    </div>
    <p style="font-weight:bold; font-size:20px;text-align:center; margin-top:20px">
    Game & Video
    </p>
  </div>

</div>


</div>
