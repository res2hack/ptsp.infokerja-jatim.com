<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\PciPosting */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="box box-primary">

            <!-- /.box-header -->
            <!-- form start -->
<div class="box-body">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'judul')->textInput() ?>
    <?= $form->field($model, 'isi')->widget(CKEditor::className(), [
      'editorOptions' => ElFinder::ckeditorOptions(['elfinder', 
        'controller' => 'elfinder',
    'path' => 'image',
    // 'filter'     => 'image',
    // 'name'       => 'myinput',
    // 'value'      => '',
        ],[/* Some CKEditor Options */]),
    ]) ?>
    <?= $form->field($model, 'gambar')->widget(FileInput::classname(), [
    'options' => ['accept' => 'image/*'],
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
