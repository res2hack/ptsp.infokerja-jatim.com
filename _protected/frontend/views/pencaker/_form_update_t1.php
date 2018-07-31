<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use app\models\IpkAgama;
use app\models\IpkKecamatan;
use app\models\IpkKabupaten;
use app\models\IpkProvinsi;
use app\models\IpkJabatanPokok;
use app\models\IpkJabatanKelompok;
use app\models\IpkUsahaGolongan;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\file\FileInput;
use yii\jui\DatePicker;
use app\models\IpkJenispddk;

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
  $golusaha= IpkUsahaGolongan::find()->all();
  $listGolusaha=ArrayHelper::map($golusaha,'kode','nama');
  $katjabatan= IpkJabatanPokok::find()->all();
  $listKatjabatan=ArrayHelper::map($katjabatan,'kode','nama');
  $goljabatan= IpkJabatanKelompok::find()->where(['ipk_jabatan_pokok_id'=>$model->jabatan_pokok])->all();
  $listGoljabatan=ArrayHelper::map($goljabatan,'kode','nama');
  $daftarpendidikan= IpkJenispddk::find()->where(['levels' => 'G'])->andWhere(['!=','kode','4000'])->all();
  $listPendidikan=ArrayHelper::map($daftarpendidikan,'kode','nama');
  $subPendidikan= IpkJenispddk::find()->where(['kode_parent' => $model->pddk_tingkat])->all();
  $listSubpendidikan=ArrayHelper::map($subPendidikan,'kode','nama');
  $sub2Pendidikan= IpkJenispddk::find()->where(['kode_parent' => $model->pddk_jenis])->all();
  $listSub2pendidikan=ArrayHelper::map($sub2Pendidikan,'kode','nama');

?>
    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>

<div class="block left" style="width:48%">
    <?= $form->field($model, 'no_nik')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>
    <div class="block left" style="width:48%">
    <?= $form->field($model, 'gelar_depan')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="block left" style="width:48%">
    <?= $form->field($model, 'gelar_belakang')->textInput(['maxlength' => true]) ?>
    </div>

    <?= $form->field($model, 'tgl_lahir')->widget(DatePicker::classname(), [
    //'language' => 'ru',
    'dateFormat' => 'yyyy-MM-dd',
		'options' => [
        'class' => 'form-control',
    ],
		'clientOptions' => [
        'changeMonth'=> true,
				'changeYear'=> true,
				'yearRange'=> "-50:+0",
    ],
    ]) ?>

    <?= $form->field($model, 'jenis_kelamin')->dropDownList(['1'=>'Laki-laki','0'=>'Perempuan'], ['prompt'=>'Pilih', 'class'=>'form-control']) ?>

    <?= $form->field($model, 'hp')->textInput(['maxlength' => true])->label('No HP') ?>
    <?= $form->field($model, 'telpon')->textInput(['maxlength' => true])->label('No Telp') ?>
    <?= $form->field($model, 'agama_id',[
    'template' => "{label}\n<div id='ajx_goljabatan'>\n{input}\n</div>\n{hint}\n{error}"
    ])->dropDownList($listAgama, ['prompt'=>'Pilih', 'class'=>'form-control'])->label('Agama'); ?>
    <?= $form->field($model, 'pddk_tingkat')->dropDownList($listPendidikan, ['prompt'=>'Pilih', 'class'=>'form-control', 'onChange'=>'
      $.get("'.Url::to(['pencaker/pendidikan_sub1']).'?id="+$(this).val(), function(data, status){
        if(status == "success"){
          $("#ajx_golpendidikan").html(data);
        }
      });
    ']) ?>
    <?= $form->field($model, 'pddk_jenis',[
    'template' => "{label}\n<div id='ajx_golpendidikan'>\n{input}\n</div>\n{hint}\n{error}"
    ])->dropDownList($listSubpendidikan, ['prompt'=>'Pilih', 'class'=>'form-control', 'onChange'=>'
      $.get("'.Url::to(['pencaker/pendidikan_sub2']).'?id="+$(this).val(), function(data, status){
        if(status == "success"){
          $("#ajx_subpendidikan").html(data);
        }
      });
    ']) ?>
    <?= $form->field($model, 'pddk_jurusan',[
    'template' => "{label}\n<div id='ajx_subpendidikan'>\n{input}\n</div>\n{hint}\n{error}"
    ])->dropDownList($listSub2pendidikan, ['prompt'=>'Pilih', 'class'=>'form-control']) ?>
    

</div>
<div class="block left restu-block" style="width:48%">

    <?= $form->field($model, 'alamat_jalan')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'kodepos')->textInput(['maxlength' => true]) ?>
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

    <?= $form->field($model, 'usaha_golongan')->dropDownList($listGolusaha, ['prompt'=>'Pilih', 'class'=>'form-control'])->label('Minat Golongan Usaha') ?>

    <?= $form->field($model, 'jabatan_pokok')->dropDownList($listKatjabatan, ['prompt'=>'Pilih', 'class'=>'form-control', 'onChange'=>'
      $.get("'.Url::to(['pencaker/jabatan_sub1','id'=>'']).'"+$(this).val(), function(data, status){
        if(status == "success"){
          $("#ajx_goljabatan").html(data);
        }
      });
    '])->label('Minat Kategori Jabatan') ?>
    
    <?= $form->field($model, 'jabatan_kelompok',[
    'template' => "{label}\n<div id='ajx_goljabatan'>\n{input}\n</div>\n{hint}\n{error}"
    ])->dropDownList($listGoljabatan, ['prompt'=>'Pilih', 'class'=>'form-control'])->label('Minat Jabatan'); ?>
    <?= $form->field($model, 'status_kerja')->radioButtonGroup(['1'=>'Sedang Bekerja','0'=>'Belum / Tidak Bekerja'],['style'=>'width:100%']) ?>

    <?= $form->field($model, 'curiculum_viteae')->widget(FileInput::classname(), [
    'options' => ['accept' => '.pdf, .doc, .docx'],
    ]) ?>
    <?= $form->field($model, 'foto')->widget(FileInput::classname(), [
    'options' => ['accept' => 'image/*'],
    ])->label('Foto Resmi Terbaru') ?>
     <div class="col-md-offset-10 form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
