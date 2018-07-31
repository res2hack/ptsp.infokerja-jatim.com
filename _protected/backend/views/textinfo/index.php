<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WebRtextSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Web Info';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-rtext-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Info Baru', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'isi:ntext',
            'tgl_mulai',
            'tgl_selesai',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
