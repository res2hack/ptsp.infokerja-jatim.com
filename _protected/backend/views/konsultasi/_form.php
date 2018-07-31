<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PciKonsultasi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pci-konsultasi-form">
	<div class="container-fluid">

    <?php $form = ActiveForm::begin(); ?>
<div class="row no-gutter">
    <div class="block-title">
      <h3><a href="#">KONSULTASI</a></h3>
    </div>
	<div class="col-md-4">
    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>
	</div>
	<div class="col-md-4">
	<?= $form->field($model, 'telp')->textInput(['maxlength' => true]) ?>
	</div>
  <div class="col-md-4">
  <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
  </div>  		
</div>
<div class="row no-gutter">
	<div class="col-md-12">
		<?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>
	</div>
</div>
<div class="row no-gutter">
	<div class="col-md-12">
    <?= $form->field($model, 'pertanyaan')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'jawaban')->textarea(['rows' => 6]) ?>
	</div>
</div>

    <div class="form-group">
        <?= Html::submitButton('SIMPAN', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
