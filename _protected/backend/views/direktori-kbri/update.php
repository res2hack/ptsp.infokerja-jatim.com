<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PciDirektori */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'KBRI',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Data KBRI'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="pci-direktori-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
