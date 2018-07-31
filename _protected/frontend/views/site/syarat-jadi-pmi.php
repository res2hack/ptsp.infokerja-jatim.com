<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = $model['judul'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
	<div class="block-title">
		<h1><?= Html::encode($this->title) ?></h1>
	</div>
	<div class="container-fluid">

		<div class="row no-gutter">
			<div class="col-xs-12">
				<?= $model['isi']; ?>
			</div>
		</div>
	</div>
</div>
