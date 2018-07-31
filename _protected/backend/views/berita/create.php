<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PciPosting */

$this->title = 'Pengumuman';
$this->params['breadcrumbs'][] = ['label' => 'Pengumuman', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pci-posting-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
