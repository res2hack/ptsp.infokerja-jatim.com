<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NegaraTujuanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Konsultasi Online';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="negara-tujuan-index">
<div class="box box-primary">
	<div class="box-body">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Konsultasi Baru', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pertanyaan',
            'jawaban',

            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width:70px;'],
            ],
        ],
    ]); ?>
</div>
</div>
</div>
