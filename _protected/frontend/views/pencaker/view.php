<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\IpkPencaker */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Ipk Pencakers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ipk-pencaker-view">
Terimakasih telah melakukan pendaftaran pada website ini</br>
data anda akan kami teruskan kepada P3MI yang bersangkutan terimakasih
<div class="panel panel-primary">
  <div class="panel-heading"><h1><?= Html::encode("Identitas") ?></h1></div>
  <div class="panel-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            // 'bio_key',
            // 'username',
            'email:email',
            // 'password',
            // 'aktif',
            // 'regip',
            'tanggal_registrasi',
            'no_nik',
            // 'gelar_depan',
            'nama',
            // 'gelar_belakang',
            // 'tempat_lahir',
            'tgl_lahir',
            [
             'label' => 'Jenis Kelamin',
             'format' => 'raw',
             'value' => function ($data) {
                  return ($data->jenis_kelamin=='1')?'Laki-laki':'Perempuan';
              },
            ],
            [
             'label' => 'Agama',
             'format' => 'raw',
             'value' => function ($data) {
                  return $data->agama->nama;
              },
            ],
            // 'status_nikah',
            // 'beban_keluarga',
            // 'wni',
            // 'tinggi',
            // 'berat',
            'alamat_jalan',
            // 'alamat_kota',
            // 'kodepos',
            // 'telpon',
            'hp',
            // 'agama_id',
            [
             'label' => 'Kecamatan',
             'format' => 'raw',
             'value' => function ($data) {
                  return $data->kecamatan->nama;
              },
            ],
             [
             'label' => 'Kabupaten / Kota',
             'format' => 'raw',
             'value' => function ($data) {
                  return $data->kabupaten->nama;
              },
            ],
             [
             'label' => 'Provinsi',
             'format' => 'raw',
             'value' => function ($data) {
                  return $data->provinsi->nama;
              },
            ],
            [
                 'label'=>'Curiculum Viteae',
                 'format'=>'raw',
                 'value'=>function ($data) {
                   if($data->curiculum_viteae != ''){
                    return Html::a('Download', ['/files/foto/'.$data->curiculum_viteae]);
                   }else{
                     return "-";
                   }
                 },
           ],
            [
                 'label'=>'Foto',
                 'format'=>'raw',
                 'value'=>Html::img(Yii::$app->request->baseUrl.'/files/foto/'.$model->foto,['width'=>'100px']),
           ],
            // 'usaha_golongan',
            // 'tgl_hapus',
            // 'sts',
            // 'jabatan_pokok',
            // 'jabatan_kelompok',
            // 'status',
        ],
    ]) ?>
</div>
</div>
</div>
