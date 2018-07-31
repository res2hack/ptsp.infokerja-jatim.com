<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PciDirektori */

$this->title = Yii::t('app', 'Form BLK');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Data BLK'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pci-direktori-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
