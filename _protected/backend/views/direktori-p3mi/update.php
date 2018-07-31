<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PciDirektori */

$this->title = 'Ubah Direktori P3MI: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Data P3MI', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Form';
?>
<div class="pci-direktori-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
