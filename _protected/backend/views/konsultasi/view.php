<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PciKonsultasi */

$this->title = $model->id;
?>
<div class="pci-konsultasi-view">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pertanyaan:ntext',
            'nama',
            'alamat',
            'telp',
            'email:email',
        ],
    ]) ?>

</div>
