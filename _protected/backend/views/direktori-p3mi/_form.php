<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\switchinput\SwitchInput;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\PciDirektori */
/* @var $form yii\widgets\ActiveForm */
$kategori=array('p3mi-pusat'=>'KANTOR PUSAT','p3mi-cabang'=>'KANTOR CABANG');
?>

<div class="box box-primary">
<div class="box-body">

    <?php $form = ActiveForm::begin(); ?>
	<div class="col-xs-12 col-sm-6">
    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>
	</div>
	<div class="col-xs-12 col-sm-6">
    <?= $form->field($model, 'kontak')->textInput(['maxlength' => true]) ?>
	</div>
	<div class="col-xs-12">
    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>
	</div>
	<div class="col-xs-12">
    <?= $form->field($model, 'detail')->widget(CKEditor::className(), [
      'editorOptions' => ElFinder::ckeditorOptions(['elfinder', 
        'controller' => 'elfinder',
    'path' => 'image',
    // 'filter'     => 'image',
    // 'name'       => 'myinput',
    // 'value'      => '',
        ],[/* Some CKEditor Options */]),
    ]) ?>
	</div>
  	<div class="col-xs-12 col-sm-4">
			<?=$form->field($model, 'kategori')->widget(Select2::classname(), [
      'data' => $kategori,
      'pluginOptions' => [
        'allowClear' => true
      ],
    ])->label('Pusat / Cabang');;
    ?>
	</div>
	<div class="col-xs-12 col-sm-4">
		<?= $form->field($model, 'sts_tampil')->widget(SwitchInput::classname(), [
		'type' => SwitchInput::CHECKBOX,
		'pluginOptions' => [
				'onText' => 'Tampil',
				'offText' => 'Tidak',
		],
		'pluginEvents' => [
		],
		])->label('Tampilkan / Tidak ?'); ?>
	</div>
	<div class="col-xs-12 col-sm-4">
		<?= $form->field($model, 'sts_valid')->widget(SwitchInput::classname(), [
		'type' => SwitchInput::CHECKBOX,
		'pluginOptions' => [
				'onText' => 'Valid',
				'offText' => 'Tidak',
		],
		'pluginEvents' => [
		],
		])->label('Data Valid / Tidak ?'); ?>
	</div>
	<div class="col-xs-12">
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
	</div>

    <?php ActiveForm::end(); ?>

</div>
</div>
