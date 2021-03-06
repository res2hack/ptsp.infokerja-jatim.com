<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Direktori P3MI Jatim';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
	<div class="container-fluid">

	<div class="row no-gutter">
		<div class="col-xs-12">
			<div class="block-title">
				<h3><a href="#"><?= $model['nama']; ?></a></h3>
			</div>
				
			<div class="block-content" >    
				<?php 
					// echo "<a href='".Url::to(['site/direktori-disnaker/','id'=>$model['id']])."'>".$model['nama']."</a>";
				?>
					<?= "<p>".$model['nama']."</p>"; ?>
					<?= "<p>"."Alamat : ".$model['alamat']."</p>"; ?>
					<?= "<p>"."Kontak : ".$model['kontak']."</p>"; ?>
					<?= "<p>".$model['detail']."</p>"; ?>
					<?= "<p>PUSAT / CABANG : ".($model['kategori']=='p3mi-pusat'?'KANTOR PUSAT':'KANTOR CABANG')."</p>"; ?>
					<?= "<p>"."Status Legalitas : ".($model['sts_valid']==1?"<span class='label label-success'>Legal</span>":"<span class='label label-danger'>Ilegal</span>")."</p>"; ?>
			</div>
		</div>

	</div>
</div>

</div>
