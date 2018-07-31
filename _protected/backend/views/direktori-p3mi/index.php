<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PciDirektoriSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Direktori P3MI');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pci-direktori-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'P3MI Baru'), ['create'], ['class' => 'btn btn-success']) ?>
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
            // 'detail:ntext',
            // 'lat',
            // 'lon',
            // 'sts_tampil',
            
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
						
            // 'kategori',
            // 'urutan',

            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width:70px;'],
            ],
        ],
    ]); ?>
</div>
