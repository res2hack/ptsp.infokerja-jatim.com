<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sips';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sip-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sip', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'no_sip',
            'nama_perusahaan',
            'alamat:ntext',
            'contact_nama',
            // 'contact_telp',
            // 'sts_formal',
            // 'agency',
            // 'jabatan_id',
            // 'negara_tujuan',
            // 'tgl_ijin_awal',
            // 'tgl_ijin_akhir',
            // 'jumlah_l',
            // 'jumlah_p',
            // 'jumlah_lp',
            // 'tgl_input',
            // 'tgl_update',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
