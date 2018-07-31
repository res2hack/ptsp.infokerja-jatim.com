<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Direktori Disnaker Jatim';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
	<div class="container-fluid">

<div class="row no-gutter">
  <div class="col-xs-12">
    <div class="block-title">
      <h3><a href="#">LOWONGAN LUAR NEGERI</a></h3>
    </div>
      
    <div class="block-content" >    
      <ul class="article-list">
      <?php 
      foreach ($model as $list){
        echo "<li>";
        echo "<a href='".Url::to(['site/lowongan-luar-negeri-detail/','id'=>$list['id']])."'>".'Lowongan '.$list['jabatan'].' Pada Negara '.$list['negara']."</br><b>PJTKI</b> : ".$list['perusahaan']."</br><b>AGENCY</b> : ".$list['agency']."</a>";
        echo "</li>";
			}
      ?>
      </ul>
			<?= LinkPager::widget([
					'pagination' => $pagination,
			]);?>
    </div>
  </div>
 
</div>
	</div>
</div>
