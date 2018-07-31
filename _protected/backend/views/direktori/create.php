<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PciDirektori */

$this->title = Yii::t('app', 'Create Pci Direktori');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pci Direktoris'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pci-direktori-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
