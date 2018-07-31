<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Sip */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sips', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sip-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'no_sip',
            'nama_perusahaan',
            'alamat:ntext',
            'contact_nama',
            'contact_telp',
            'sts_formal',
            'agency',
            'jabatan_id',
            'negara_tujuan',
            'tgl_ijin_awal',
            'tgl_ijin_akhir',
            'jumlah_l',
            'jumlah_p',
            'jumlah_lp',
            'tgl_input',
            'tgl_update',
        ],
    ]) ?>

</div>
