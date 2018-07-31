<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SipSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sip-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'no_sip') ?>

    <?= $form->field($model, 'perusahaan_id') ?>

    <?= $form->field($model, 'sts_formal') ?>

    <?= $form->field($model, 'agency') ?>

    <?php // echo $form->field($model, 'jabatan_id') ?>

    <?php // echo $form->field($model, 'negara_tujuan') ?>

    <?php // echo $form->field($model, 'tgl_ijin_awal') ?>

    <?php // echo $form->field($model, 'tgl_ijin_akhir') ?>

    <?php // echo $form->field($model, 'jumlah_l') ?>

    <?php // echo $form->field($model, 'jumlah_p') ?>

    <?php // echo $form->field($model, 'jumlah_lp') ?>

    <?php // echo $form->field($model, 'tgl_input') ?>

    <?php // echo $form->field($model, 'tgl_update') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
