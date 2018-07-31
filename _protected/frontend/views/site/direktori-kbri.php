<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Direktori KBRI Jatim';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-xs-6">
	<p style="text-align:center"><iframe frameborder="0" height="315" src="https://www.youtube.com/embed/BvQ4ADr_1l0" width="560"></iframe></p>
</div>

<div class="col-xs-6">
	<p style="text-align:center"><iframe frameborder="0" height="315" src="https://www.youtube.com/embed/kemzDrkMq_8" width="560"></iframe></p>
</div>
<div class="col-xs-12">
	<p style="text-align:center"><iframe frameborder="0" height="315" src="https://www.youtube.com/embed/noUadICAz1g" width="560"></iframe></p>
</div>
<div class="site-about">
	<div class="container-fluid">

<div class="row no-gutter">
  <div class="col-xs-12">
    <div class="block-title">
      <h3><a href="#">DATA KBRI / ADNAKER</a></h3>
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
        echo "<a href='".Url::to(['site/direktori-kbri/','id'=>$list['id']])."'>".$list['nama']."</a>";
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
