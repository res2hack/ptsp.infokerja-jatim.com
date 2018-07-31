<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PciKonsultasi */

$this->title = 'Update Pci Konsultasi: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pci Konsultasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pci-konsultasi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
