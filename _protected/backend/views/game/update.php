<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PciPosting */

$this->title = 'Update Game: ';
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pci-posting-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
