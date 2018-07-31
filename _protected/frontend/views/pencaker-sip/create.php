<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PencakerSip */

$this->title = Yii::t('app', 'Create Pencaker Sip');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pencaker Sips'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pencaker-sip-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
