<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Booking */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="booking-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tgl_booking')->textInput() ?>
    <?=$form->field($model, 'tgl_booking')->widget(DatePicker::classname(), [
      'options' => ['placeholder' => 'Tanggal Booking'],
      'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd'
      ]
    ])->label('TANGGAL BOOKING');
    ?>
    <?= $form->field($model, 'jumlah')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
