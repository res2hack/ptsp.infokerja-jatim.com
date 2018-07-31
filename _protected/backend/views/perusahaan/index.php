<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PerusahaanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Perusahaan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perusahaan-index">
<div class="box box-primary">
<div class="box-body">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Perusahaan Baru', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'nama',
            // 'alamat',
            // 'contact_nama',
            // 'contact_telp',

            [
							'class' => 'yii\grid\ActionColumn',
							'contentOptions' => ['style' => 'width:70px;'],
						],
        ],
    ]); ?>
</div>
</div>
</div>
