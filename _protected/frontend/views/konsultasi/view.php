<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PciKonsultasi */

$this->title = $model->id;
?>
<div class="pci-konsultasi-view">
<h1>TERIMAKASIH TELAH MENGIRIMKAN PERTANYAAN, TIM KAMI AKAN SEGERA MEMBERIKAN JAWABAN </br>SISTEM AKAN OTOMATIS MENGIRIM KE EMAIL ANDA</h1>
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
