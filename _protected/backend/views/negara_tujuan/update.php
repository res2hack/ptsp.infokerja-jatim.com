<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NegaraTujuan */

$this->title = 'Ubah Negara Tujuan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Data Negara Tujuan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="negara-tujuan-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
