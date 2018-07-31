<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;
use app\models\NegaraTujuan;
use app\models\Jabatan;

/* @var $this yii\web\View */
/* @var $model app\models\Sip */
/* @var $form yii\widgets\ActiveForm */
$negara_tujuan=NegaraTujuan::find()->all();
$jabatan=Jabatan::find()->all();
//use yii\helpers\ArrayHelper;
$list_negara_tujuan=ArrayHelper::map($negara_tujuan,'id','negara');
$list_jabatan=ArrayHelper::map($jabatan,'id','nama');
$list_formal=array('1'=>'FORMAL','0'=>'INFORMAL');

?>

<div class="sip-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
  <div class="col-md-8"><?= $form->field($model, 'no_sip')->textInput(['maxlength' => true])->label('NOMOR SIP'); ?></div>
  <div class="col-md-4"><?=$form->field($model, 'sts_formal')->widget(Select2::classname(), [
      'data' => $list_formal,
      'pluginOptions' => [
        'allowClear' => true
      ],
    ])->label('FORMAL / INFORMAL');;
    ?>
</div>
</div>
<div class="row">
  <div class="col-md-6"><?= $form->field($model, 'nama_perusahaan')->textInput(['maxlength' => true])->label('NAMA PERUSAHAAN'); ?></div>
  <div class="col-md-6"><?= $form->field($model, 'agency')->textInput(['maxlength' => true])->label('PERUSAHAAN AGENCY'); ?></div>
</div>
<div class="row">
  <div class="col-md-3"><?= $form->field($model, 'contact_nama')->textInput(['maxlength' => true])->label('NAMA KONTAK'); ?></div>
  <div class="col-md-3"><?= $form->field($model, 'contact_telp')->textInput(['maxlength' => true])->label('TELP PERUSAHAAN'); ?></div>
  <div class="col-md-6"><?= $form->field($model, 'alamat')->textInput(['maxlength' => true])->label('ALAMAT PERUSAHAAN'); ?></div>
</div>
<div class="row">
  <div class="col-md-6"><?=$form->field($model, 'jabatan_id')->widget(Select2::classname(), [
      'data' => $list_jabatan,
      'options' => ['placeholder' => 'Jabatan ....'],
      'pluginOptions' => [
        'allowClear' => true
      ],
    ])->label('JABATAN');;
    ?></div>
  <div class="col-md-6"><?=$form->field($model, 'negara_tujuan')->widget(Select2::classname(), [
      'data' => $list_negara_tujuan,
      'options' => ['placeholder' => 'Negara Tujuan ....'],
      'pluginOptions' => [
        'allowClear' => true
      ],
    ])->label('NEGARA TUJUAN');;
    ?></div>
</div>
<div class="row">
  <div class="col-md-4"><?= $form->field($model, 'jumlah_l')->textInput()->label('JUMLAH L'); ?></div>
  <div class="col-md-4"><?= $form->field($model, 'jumlah_p')->textInput()->label('JUMLAH P'); ?></div>
  <div class="col-md-4"><?= $form->field($model, 'jumlah_lp')->textInput()->label('JUMLAH L/P'); ?></div>
</div>
<div class="row">
  <div class="col-md-6">
  <?=$form->field($model, 'tgl_ijin_awal')->widget(DatePicker::classname(), [
      'options' => ['placeholder' => 'Tanggal Ijin SIP'],
      'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd'
      ]
    ])->label('TANGGAL BERLAKU IJIN');;
    ?></div>
  <div class="col-md-6">    <?=$form->field($model, 'tgl_ijin_akhir')->widget(DatePicker::classname(), [
      'options' => ['placeholder' => 'Tanggal Ijin SIP'],
      'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd'
      ]
    ])->label('IJIN BERLAKU HINGGA TANGGAL');;
    ?></div>
</div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
