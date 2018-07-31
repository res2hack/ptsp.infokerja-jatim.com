<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;
use app\models\NegaraTujuan;
use app\models\Jabatan;
use app\models\Perusahaan;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Sip */
/* @var $form yii\widgets\ActiveForm */
$negara_tujuan=NegaraTujuan::find()->all();
$jabatan=Jabatan::find()->orderBy('nama')->all();
$perusahaan=Perusahaan::find()->orderBy('nama')->all();
//use yii\helpers\ArrayHelper;
$list_negara_tujuan=ArrayHelper::map($negara_tujuan,'id','negara');
$list_jabatan=ArrayHelper::map($jabatan,'id','nama');
$list_perusahaan=ArrayHelper::map($perusahaan,'id','nama');
$list_formal=array('1'=>'FORMAL','0'=>'INFORMAL');

?>

<div class="kbri-form">

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
  <div class="col-md-6">
  <?=$form->field($model, 'perusahaan_id')->widget(Select2::classname(), [
      'data' => $list_perusahaan,
      'options' => ['placeholder' => 'Perusahaan ....'],
      'pluginOptions' => [
        'allowClear' => true
      ],
    ])->label('PERUSAHAAN');
    ?>
  </div>
  <div class="col-md-6">
  <?= $form->field($model, 'agency')->textInput(['maxlength' => true])->label('PERUSAHAAN AGENCY'); ?>
  </div>
</div>
<div class="row">
</div>
<div class="row">
  <div class="col-md-6">
  <?=$form->field($model, 'jabatan_id')->widget(Select2::classname(), [
      'data' => $list_jabatan,
      'options' => ['placeholder' => 'Jabatan ....'],
      'pluginOptions' => [
        'allowClear' => true
      ],
    ])->label('JABATAN');
    ?></div>
  <div class="col-md-6">
  <?=$form->field($model, 'negara_tujuan')->widget(Select2::classname(), [
      'data' => $list_negara_tujuan,
      'options' => ['placeholder' => 'Negara Tujuan ....'],
      'pluginOptions' => [
        'allowClear' => true
      ],
    ])->label('NEGARA TUJUAN');
    ?>
    </div>
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
    <?= $form->field($model, 'ket')->widget(CKEditor::className(), [
      'editorOptions' => ElFinder::ckeditorOptions(['elfinder', 
        'controller' => 'elfinder',
    'path' => 'image',
    // 'filter'     => 'image',
    // 'name'       => 'myinput',
    // 'value'      => '',
        ],[/* Some CKEditor Options */]),
    ]) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
