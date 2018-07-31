<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use common\models\IpkKecamatan;
use common\models\IpkKabupaten;
use common\models\IpkProvinsi;
/* @var $this yii\web\View */
/* @var $model common\models\Perusahaan */
/* @var $form yii\widgets\ActiveForm */
  $provinsi= IpkProvinsi::find()->all();
  $listProvinsi=ArrayHelper::map($provinsi,'id','nama');  
  $kabupaten= IpkKabupaten::find()->where(['provinsi_id' => $model->provinsi_id])->all();
  $listKabupaten=ArrayHelper::map($kabupaten,'id','nama');  
  $kecamatan= IpkKecamatan::find()->where(['kabupaten_id' => $model->kabkota_id])->all();
  $listKecamatan=ArrayHelper::map($kecamatan,'id','nama');  
?>

<div class="box box-primary">

            <!-- /.box-header -->
            <!-- form start -->
<div class="box-body">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>
  <div class="row">
  <div class="col-xs-12 col-sm-4">
    <?= $form->field($model, 'provinsi_id')->dropDownList($listProvinsi, ['prompt'=>'Provinsi', 'class'=>'form-control', 'onChange'=>'
      $.get("'.Url::to(['perusahaan/kabupaten','id'=>'']).'"+$(this).val(), function(data, status){
        if(status == "success"){
          $("#ajx_kabupaten").html(data);
          $("#ajx_kecamatan").html("");
        }
      });
    ']) ?>
  </div>
  <div class="col-xs-12 col-sm-4">

    <?= $form->field($model, 'kabkota_id',[
    'template' => "{label}\n<div id='ajx_kabupaten'>\n{input}\n</div>\n{hint}\n{error}"
    ])->dropDownList($listKabupaten, ['prompt'=>'Kabupaten', 'class'=>'form-control', 'onChange'=>'
              $.get("'.Url::to(['perusahaan/kecamatan','id'=>'']).'"+$(this).val(), function(data, status){
                if(status == "success"){
                  $("#ajx_kecamatan").html(data);
                }
              });
            ']) ?>
  </div>
  <div class="col-xs-12 col-sm-4">

    <?= $form->field($model, 'kecamatan_id',[
    'template' => "{label}\n<div id='ajx_kecamatan'>\n{input}\n</div>\n{hint}\n{error}"
    ])->dropDownList($listKecamatan, ['prompt'=>'Kecamatan']) ?>
	</div>
	</div>
  <div class="row">
  <div class="col-xs-12 col-sm-4">
    <?= $form->field($model, 'contact_nama')->textInput(['maxlength' => true]) ?>
  </div>
  <div class="col-xs-12 col-sm-4">

    <?= $form->field($model, 'contact_telp')->textInput(['maxlength' => true]) ?>
  </div>
  <div class="col-xs-12 col-sm-4">

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
  </div>
  </div>
    <?= $form->field($model, 'profil')->widget(CKEditor::className(), [
      'editorOptions' => ElFinder::ckeditorOptions(['elfinder', 
        'controller' => 'elfinder',
    'path' => 'image',
    // 'filter'     => 'image',
    // 'name'       => 'myinput',
    // 'value'      => '',
        ],['preset' => 'basic','inline' => false,'height'=>500]),
    ]) ?>
		
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
