<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

/* @var $this yii\web\View */
/* @var $model app\models\PciDirektori */
/* @var $form yii\widgets\ActiveForm */
$sts_tampil=array('1'=>'TAMPIL','0'=>'TIDAK TAMPIL');
$sts_valid=array('1'=>'LEGAL','0'=>'ILEGAL');
$kategori=array('blk-swasta'=>'SWASTA','blk-negeri'=>'PEMERINTAH');
?>

<div class="box box-primary">
<div class="box-body">

    <?php $form = ActiveForm::begin(); ?>


  <div class="row">
		<div class="col-md-6">
			<?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>
		</div>
		<div class="col-md-6">
			<?= $form->field($model, 'kontak')->textInput(['maxlength' => true]) ?>
		</div>
  </div>
    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'detail')->widget(CKEditor::className(), [
      'editorOptions' => ElFinder::ckeditorOptions(['elfinder', 
        'controller' => 'elfinder',
    'path' => 'image',
    // 'filter'     => 'image',
    // 'name'       => 'myinput',
    // 'value'      => '',
        ],[/* Some CKEditor Options */]),
    ]) ?>
	<div class="row">
  <div class="col-md-4"><?=$form->field($model, 'kategori')->widget(Select2::classname(), [
      'data' => $kategori,
      'pluginOptions' => [
        'allowClear' => true
      ],
    ])->label('PENGELOLA');;
    ?>
	</div>
  <div class="col-md-4"><?=$form->field($model, 'sts_tampil')->widget(Select2::classname(), [
      'data' => $sts_tampil,
      'pluginOptions' => [
        'allowClear' => true
      ],
    ])->label('TAMPIL / TIDAK');;
    ?>
	</div>
  <div class="col-md-4"><?=$form->field($model, 'sts_valid')->widget(Select2::classname(), [
      'data' => $sts_valid,
      'pluginOptions' => [
        'allowClear' => true
      ],
    ])->label('LEGAL / ILEGAL');;
    ?>
	</div>
	</div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
