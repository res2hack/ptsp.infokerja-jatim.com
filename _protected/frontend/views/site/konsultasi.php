<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $model app\models\PciKonsultasi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pci-konsultasi-create">

    <?php $form = ActiveForm::begin(); ?>
  <div class="col-xs-12">
    <div class="block-title">
      <h3>KONSULTASI ONLINE</h3>
    </div>
      
    <div class="block-content" >    
			<div class="row no-gutter">
				<div class="col-xs-4">
					<?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>
				</div>
				<div class="col-xs-4">
					<?= $form->field($model, 'telp')->textInput(['maxlength' => true]) ?>
				</div>
				<div class="col-xs-4">
					<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
				</div>
				<div class="col-xs-12">
					<?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>
				</div>
				<div class="col-xs-12">
					<?= $form->field($model, 'pertanyaan')->textarea(['rows' => 6]) ?>
				</div>
				<div class="col-xs-12 col-md-4">
				<?= $form->field($model, 'reCaptcha')->widget(Captcha::className(),[
					// 'captchaAction' => 'site/captcha',
				]) ?>
					<?php // echo $form->field($model, 'reCaptcha')->widget(
						//	\himiklab\yii2\recaptcha\ReCaptcha::className(),
						//	['siteKey' => '6LcMjkAUAAAAAMKtxEfgI5r6trutXWtVLcunt4cb']
					//) ?>
					<?php echo Html::submitButton('Kirim Konsultasi', ['class' => 'btn btn-success']) ?>
				</div>
			</div>
		</div>
	</div>

    <?php ActiveForm::end(); ?>

</div>
