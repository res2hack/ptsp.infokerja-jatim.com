<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Direktori LSP Jatim';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
	<div class="container-fluid">

	<div class="row no-gutter">
		<div class="col-xs-12">
			<div class="block-title">
				<h3><a href="#"><?php //  $model['nama']; ?> INFO LSP</a></h3>
			</div>
				
			<div class="block-content" >    
				<?php 
					// echo "<a href='".Url::to(['site/direktori-disnaker/','id'=>$model['id']])."'>".$model['nama']."</a>";
				?>
					<?php // "<p>".$model['nama']."</p>"; ?>
					<?php //  "<p>"."Alamat : ".$model['alamat']."</p>"; ?>
					<?php //  "<p>"."Kontak : ".$model['kontak']."</p>"; ?>
					<?= "<p>".$model['detail']."</p>"; ?>
					<?php //  "<p>"."Status Data : ".($model['sts_valid']==1?"<span class='label label-success'>Valid</span>":"<span class='label label-danger'>Tidak Valid</span>")."</p>"; ?>
			</div>
		</div>

	</div>
</div>

</div>
