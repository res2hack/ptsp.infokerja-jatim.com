<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'DATA BLK SEJATIM';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
	<div class="container-fluid">

<div class="row no-gutter">
  <div class="col-xs-12">
    <div class="block-title">
      <h3><a href="#">DATA BLK SEJATIM</a></h3>
    </div>
      
    <div class="block-content" >
			<form method="post">
				<input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
				<div class="col-md-11"><input name="cari" type="text" class="form-control" value="<?= $cari; ?>" placeholder="CARI <?=$this->title;?>"></div>
				<div class="col-md-1"><button class="btn btn-primary" type="submit">CARI</button></div>
			</form>
			<table class="table table-hover">
			<thead>
			<tr>
				<th>#</th>
				<th>NAMA BLK</th>
				<th>PENGELOLA</th>
				<th>LEGALITAS</th>
			</tr>
			</thead>
			<tbody>
      <?php 
			$i=0;
      foreach ($model as $list){
				$i++;
				echo "<tr>";
				echo "<td scope='row'>".$i."</td>";
				echo "<td>"."<a href='".Url::to(['site/direktori-blk/','id'=>$list['id']])."'>".$list['nama']."</a></td>";
				echo "<td>".($list['kategori']=='blk-swasta'?'SWASTA':'PEMERINTAH')."</td>";
				echo "<td>".($list['sts_valid']=='1'?"<span class='label label-success'>LEGAL</span>":"<span class='label label-danger'>ILEGAL</span>")."</td>";
				echo "</tr>";
			}
      ?>
			</tbody>
			</table>
    </div>

  </div>
<?= LinkPager::widget([
    'pagination' => $pagination,
]);?>

</div>
	</div>
</div>
