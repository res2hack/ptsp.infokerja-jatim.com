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
      <h3><a href="#">DINAS TENAGA KERJA SEJATIM</a></h3>
    </div>
      
    <div class="block-content" >    
			<form method="post">
				<input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
				<div class="col-md-11"><input name="cari" type="text" class="form-control" value="<?= $cari; ?>" placeholder="CARI <?=$this->title;?>"></div>
				<div class="col-md-1"><button class="btn btn-primary" type="submit">CARI</button></div>
			</form>
      <ul class="article-list">
      <?php 
      foreach ($model as $list){
        echo "<li>";
        echo "<a href='".Url::to(['site/direktori-disnaker/','id'=>$list['id']])."'>".$list['nama']."</a>";
        echo "</li>";
			}
      ?>
      </ul>
    </div>
  </div>
<?= LinkPager::widget([
    'pagination' => $pagination,
]);?>

</div>
	</div>
</div>
