<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $model['judul'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
	<div class="container-fluid">

	<div class="row no-gutter">
		<div class="col-xs-12">
			<div class="block-title">
				<h3><?= $model['judul']; ?></h3>
			</div>
				
			<div class="block-content" >    
				<?php 
					// echo "<a href='".Url::to(['site/direktori-disnaker/','id'=>$model['id']])."'>".$model['nama']."</a>";
				?>
					<?= $model['isi']; ?>
			</div>
		</div>

	</div>
</div>

</div>
