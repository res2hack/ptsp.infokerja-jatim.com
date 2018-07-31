<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Perusahaan */

$this->title = 'Update Perusahaan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Perusahaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="perusahaan-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
