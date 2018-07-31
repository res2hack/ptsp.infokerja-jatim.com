<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\IpkAgama;
use common\models\IpkKecamatan;
use common\models\IpkKabupaten;
use common\models\IpkProvinsi;
use common\models\IpkJabatanPokok;
use common\models\IpkJabatanKelompok;
use common\models\IpkUsahaGolongan;
use common\models\NegaraTujuan;
use common\models\Jabatan;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\file\FileInput;
use kartik\widgets\SwitchInput;
// use yii\jui\DatePicker;
use kartik\date\DatePicker;
use common\models\IpkJenispddk;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $model app\models\IpkPencaker */
/* @var $form yii\widgets\ActiveForm */
  $agama= IpkAgama::find()->all();
  $listAgama=ArrayHelper::map($agama,'id','nama');  
  $provinsi= IpkProvinsi::find()->all();
  $listProvinsi=ArrayHelper::map($provinsi,'id','nama');  
  $kabupaten= IpkKabupaten::find()->where(['provinsi_id' => $model->provinsi_id])->all();
  $listKabupaten=ArrayHelper::map($kabupaten,'id','nama');  
  $kecamatan= IpkKecamatan::find()->where(['kabupaten_id' => $model->kabupaten_id])->all();
  $listKecamatan=ArrayHelper::map($kecamatan,'id','nama');  
  // $golusaha= IpkUsahaGolongan::find()->all();
  // $listGolusaha=ArrayHelper::map($golusaha,'kode','nama');
  // $katjabatan= IpkJabatanPokok::find()->all();
  // $listKatjabatan=ArrayHelper::map($katjabatan,'kode','nama');
  // $goljabatan= IpkJabatanKelompok::find()->where(['ipk_jabatan_pokok_id'=>$model->jabatan_pokok])->all();
  // $listGoljabatan=ArrayHelper::map($goljabatan,'kode','nama');
  $daftarpendidikan= IpkJenispddk::find()->where(['levels' => 'G'])->andWhere(['!=','kode','4000'])->all();
  $listPendidikan=ArrayHelper::map($daftarpendidikan,'kode','nama');
  // $subPendidikan= IpkJenispddk::find()->where(['kode_parent' => $model->pddk_tingkat])->all();
  // $listSubpendidikan=ArrayHelper::map($subPendidikan,'kode','nama');
  // $sub2Pendidikan= IpkJenispddk::find()->where(['kode_parent' => $model->pddk_jenis])->all();
  // $listSub2pendidikan=ArrayHelper::map($sub2Pendidikan,'kode','nama');
  $minatNegara= NegaraTujuan::find()->all();
  $listMinatNegara=ArrayHelper::map($minatNegara,'id','negara');  
  $jabatan= Jabatan::find()->all();
  $listJabatan=ArrayHelper::map($jabatan,'kode_jabatan','nama');  

?>

<div class="ipk-pencaker-form">

    <?php $form = ActiveForm::begin(['enableClientValidation' => true,'enableAjaxValidation' => false,'options' => ['enctype'=>'multipart/form-data']]); ?>

<div class="row">
<div  class="col-xs-12 col-sm-6">
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    
    <?= $model->isNewRecord ? $form->field($model, 'password')->passwordInput(['maxlength' => true]):'' ?>

    <?= $form->field($model, 'no_nik')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

<div  class="col-xs-12 col-sm-6">

		<?= $form->field($model, 'tgl_lahir')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Enter birth date ...'],
    'pluginOptions' => [
        'autoclose'=>true,
				'format' => 'yyyy/mm/dd'
    ]
		]);?>
</div>
<div  class="col-xs-12 col-sm-6">
    <?= $form->field($model, 'jenis_kelamin')->dropDownList(['1'=>'Laki-laki','0'=>'Perempuan'], ['prompt'=>'Pilih', 'class'=>'form-control']) ?>
</div>
    <?= $form->field($model, 'hp')->textInput(['maxlength' => true]) ?>
		<?= $form->field($model, 'alamat_jalan')->textInput(['maxlength' => true]) ?>		
    <?= $form->field($model, 'provinsi_id')->dropDownList($listProvinsi, ['prompt'=>'Provinsi', 'class'=>'form-control', 'onChange'=>'
      $.get("'.Url::to(['pencaker/kabupaten','id'=>'']).'"+$(this).val(), function(data, status){
        if(status == "success"){
          $("#ajx_kabupaten").html(data);
          $("#ajx_kecamatan").html("");
        }
      });
    ']) ?>

    <?= $form->field($model, 'kabupaten_id',[
    'template' => "{label}\n<div id='ajx_kabupaten'>\n{input}\n</div>\n{hint}\n{error}"
    ])->dropDownList($listKabupaten, ['prompt'=>'Kabupaten', 'class'=>'form-control', 'onChange'=>'
              $.get("'.Url::to(['pencaker/kecamatan','id'=>'']).'"+$(this).val(), function(data, status){
                if(status == "success"){
                  $("#ajx_kecamatan").html(data);
                }
              });
            ']) ?>

    <?= $form->field($model, 'kecamatan_id',[
    'template' => "{label}\n<div id='ajx_kecamatan'>\n{input}\n</div>\n{hint}\n{error}"
    ])->dropDownList($listKecamatan, ['prompt'=>'Kecamatan']) ?>
 
</div>
<div  class="col-xs-12 col-sm-6">
	<div  class="col-xs-12 col-sm-6">
		<?= $form->field($model, 'agama_id')->dropDownList($listAgama, ['prompt'=>'Pilih', 'class'=>'form-control'])->label('Agama') ?>
	</div>
	<div  class="col-xs-12 col-sm-6">
   <?= $form->field($model, 'pddk_tingkat')->dropDownList($listPendidikan, ['prompt'=>'Pilih', 'class'=>'form-control'])->label('Pendidikan') ?>
	</div>
    <?= $form->field($model, 'pddk_lainnya')->textInput(['maxlength' => true]) ?>
    

    <?php 
		// $form->field($model, 'usaha_golongan')->dropDownList($listGolusaha, ['prompt'=>'Pilih', 'class'=>'form-control'])->label('Minat Golongan Usaha')

    // $form->field($model, 'jabatan_pokok')->dropDownList($listKatjabatan, ['prompt'=>'Pilih', 'class'=>'form-control', 'onChange'=>'
      // $.get("'.Url::to(['pencaker/jabatan_sub1','id'=>'']).'"+$(this).val(), function(data, status){
        // if(status == "success"){
          // $("#ajx_goljabatan").html(data);
        // }
      // });
    // '])->label('Minat Kategori Jabatan')
    
    // $form->field($model, 'jabatan_kelompok',[
    // 'template' => "{label}\n<div id='ajx_goljabatan'>\n{input}\n</div>\n{hint}\n{error}"
    // ])->dropDownList($listGoljabatan, ['prompt'=>'Pilih', 'class'=>'form-control'])->label('Minat Jabatan'); 
		?>
    
		<?= $form->field($model, 'minat_negara')->dropDownList($listMinatNegara, ['prompt'=>'Pilih', 'class'=>'form-control']) ?>
		
    <?= $form->field($model, 'minat_jabatan')->dropDownList($listJabatan, ['prompt'=>'Pilih', 'class'=>'form-control']) ?>

		
		<?= $form->field($model, 'foto')->widget(FileInput::classname(), [
    'options' => ['accept' => 'image/*'],
		'pluginOptions' => [
			'showPreview' => false,
			'showCaption' => true,
			'showRemove' => true,
			'showUpload' => false
    ],

    ])->label('Foto Resmi Terbaru') ?>

    <?= $form->field($model, 'curiculum_viteae')->widget(FileInput::classname(), [
    'options' => ['accept' => '.pdf, .doc, .docx'],
		'pluginOptions' => [
			'showPreview' => false,
			'showCaption' => true,
			'showRemove' => true,
			'showUpload' => false
    ],
    ]) ?>
	<?= $form->field($model, 'no_bpjs')->textInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'sts_kompetensi')->checkbox(); ?>
	<?= $form->field($model, 'sts_sehat')->checkbox(); ?>
	<?= $form->field($model, 'sts_dokumen')->checkbox(); ?>
    <?= $form->field($model, 'reCaptcha')->widget(Captcha::className(),[
		]) ?>
     <div class="col-xs-12 col-xs-offset-2">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
