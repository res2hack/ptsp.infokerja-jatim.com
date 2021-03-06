<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PciDirektori */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Data P3MI'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pci-direktori-view">
<div class="box box-primary">
	<div class="box-body">

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nama',
            'alamat',
            'kontak',
						[
							'label'=>'Status Tampil',
							'value' => ($model->sts_tampil==1?"Tampil":"Tidak Tampil"),
						],
						[
							'label'=>'Status Valid',
							'value' => ($model->sts_valid==1?"Valid":"Tidak Valid"),
						],
            'detail:html',
        ],
    ]) ?>

</div>
</div>
</div>
