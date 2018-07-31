<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Sip */

$this->title = Yii::t('app', 'Form SIP');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Data SIP'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sip-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
