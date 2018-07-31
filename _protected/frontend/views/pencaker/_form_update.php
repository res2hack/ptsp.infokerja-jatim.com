<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
// use app\models\IpkAgama;
// use app\models\IpkKecamatan;
// use app\models\IpkKabupaten;
// use app\models\IpkProvinsi;
// use app\models\IpkJabatanPokok;
// use app\models\IpkJabatanKelompok;
// use app\models\IpkUsahaGolongan;
// use yii\helpers\ArrayHelper;
// use yii\helpers\Url;
// use kartik\file\FileInput;
// use yii\jui\DatePicker;
// use app\models\IpkJenispddk;

/* @var $this yii\web\View */
/* @var $model app\models\IpkPencaker */
/* @var $form yii\widgets\ActiveForm */
  // $agama= IpkAgama::find()->all();
  // $listAgama=ArrayHelper::map($agama,'id','nama');
  // $provinsi= IpkProvinsi::find()->all();
  // $listProvinsi=ArrayHelper::map($provinsi,'id','nama');  
  // $kabupaten= IpkKabupaten::find()->where(['provinsi_id' => $model->provinsi_id])->all();
  // $listKabupaten=ArrayHelper::map($kabupaten,'id','nama');  
  // $kecamatan= IpkKecamatan::find()->where(['kabupaten_id' => $model->kabupaten_id])->all();
  // $listKecamatan=ArrayHelper::map($kecamatan,'id','nama');  
  // $golusaha= IpkUsahaGolongan::find()->all();
  // $listGolusaha=ArrayHelper::map($golusaha,'kode','nama');
  // $katjabatan= IpkJabatanPokok::find()->all();
  // $listKatjabatan=ArrayHelper::map($katjabatan,'kode','nama');
  // $goljabatan= IpkJabatanKelompok::find()->where(['ipk_jabatan_pokok_id'=>$model->jabatan_pokok])->all();
  // $listGoljabatan=ArrayHelper::map($goljabatan,'kode','nama');
  // $daftarpendidikan= IpkJenispddk::find()->where(['levels' => 'G'])->andWhere(['!=','kode','4000'])->all();
  // $listPendidikan=ArrayHelper::map($daftarpendidikan,'kode','nama');
  $this->registerJs(
   'var url = document.location.toString();
   
    if (url.match(\'#\')) {
      console.log(url);
        $(\'.nav-tabs a[href="#\' + url.split(\'#\')[1]).tab("show");
    }else{
      $(\'.nav-tabs a[href="#\' + "tab1").tab("show");
    }'
  );
?>

<div class="ipk-pencaker-form">

<ul class="nav nav-tabs nav-justified">
  <li role="presentation"><a  data-toggle="tab" href="#tab1">IDENTITAS DIRI</a></li>
  <li role="presentation"><a  data-toggle="tab" href="#tab2">RIWAYAT PENDIDIKAN</a></li>
  <li role="presentation"><a  data-toggle="tab" href="#tab3">RIWAYAT SERTIFIKASI</a></li>
</ul>
<div class="tab-content">
  <div id="tab1" class="tab-pane fade in active">
    <?= $this->render('_form_update_t1', [
        'model' => $model,
    ]) ?>
  </div>
  <div id="tab2" class="tab-pane fade">
    <?= $this->render('_form_update_t2', [
        'model' => $model_pendidikan,
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
    ]) ?>
  </div>
  <div id="tab3" class="tab-pane fade">
    <?= $this->render('_form_update_t3', [
        'model' => $model_sertifikasi,
        'searchModel' => $searchModel_sertifikasi,
        'dataProvider' => $dataProvider_sertifikasi,
    ]) ?>
   </div>
</div>
</div>
