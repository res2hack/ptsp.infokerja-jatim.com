<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PciKategori */

$this->title = 'Create Pci Kategori';
$this->params['breadcrumbs'][] = ['label' => 'Pci Kategoris', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pci-kategori-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
