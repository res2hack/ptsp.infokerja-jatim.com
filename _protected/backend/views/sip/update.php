<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sip */

$this->title = Yii::t('app', 'Ubah {modelClass}: ', [
    'modelClass' => 'Sip',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Data SIP'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="sip-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
