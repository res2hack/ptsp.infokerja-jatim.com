<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PencakerSip */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pencaker-sip-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pencaker_id')->textInput() ?>

    <?= $form->field($model, 'sip_id')->textInput() ?>

    <?= $form->field($model, 'date_create')->textInput() ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
