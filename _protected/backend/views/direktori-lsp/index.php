<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PciDirektoriSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Data LSP');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pci-direktori-index">
<div class="box box-primary">
	<div class="box-body">

    <p>
        <?= Html::a(Yii::t('app', 'LSP Baru'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'nama',
            'alamat',
            // 'kontak',
						[
								'attribute'=>'sts_tampil',
								'filter'=>["1"=>"Tampil","0"=>"Tidak"],
								'value' => function ($model) {
									 return ($model->sts_tampil==1?"Tampil":"Tidak");
							 },
								
						],
						[
								'attribute'=>'sts_valid',
								'filter'=>["1"=>"Valid","0"=>"Tidak"],
								'value' => function ($model) {
									 return ($model->sts_valid==1?"Valid":"Tidak");
							 },
								
						],
            // 'detail:ntext',
            // 'lat',
            // 'lon',
            // 'sts_tampil',
            // 'sts_valid',
            // 'kategori',
            // 'urutan',

            [
							'class' => 'yii\grid\ActionColumn',
							'contentOptions' => ['style' => 'width:70px;'],
						],
        ],
    ]); ?>
</div>
</div>
</div>
