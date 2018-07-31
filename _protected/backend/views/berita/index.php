<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PciPostingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pci Postings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pci-posting-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pci Posting', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'slug',
            'judul:ntext',
            // 'isi:ntext',
            // 'ringkasan:ntext',
            // 'gambar',
            // 'link',
            // 'tanggal',
            // 'waktu_post',
            // 'waktu_update',
            // 'user_id',
            // 'kategori_id',
            // 'bahasa_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
