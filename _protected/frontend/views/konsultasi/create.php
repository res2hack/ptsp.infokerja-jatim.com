<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PciKonsultasi */

$this->title = 'Konsultasi';
$this->params['breadcrumbs'][] = ['label' => 'Pci Konsultasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pci-konsultasi-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
