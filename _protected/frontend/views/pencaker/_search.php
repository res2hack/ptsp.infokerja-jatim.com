<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IpkPencakerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ipk-pencaker-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'bio_key') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'password') ?>

    <?php // echo $form->field($model, 'aktif') ?>

    <?php // echo $form->field($model, 'regip') ?>

    <?php // echo $form->field($model, 'tanggal_registrasi') ?>

    <?php // echo $form->field($model, 'no_nik') ?>

    <?php // echo $form->field($model, 'nama') ?>

    <?php // echo $form->field($model, 'gelar_depan') ?>

    <?php // echo $form->field($model, 'gelar_belakang') ?>

    <?php // echo $form->field($model, 'tempat_lahir') ?>

    <?php // echo $form->field($model, 'tgl_lahir') ?>

    <?php // echo $form->field($model, 'jenis_kelamin') ?>

    <?php // echo $form->field($model, 'status_nikah') ?>

    <?php // echo $form->field($model, 'beban_keluarga') ?>

    <?php // echo $form->field($model, 'wni') ?>

    <?php // echo $form->field($model, 'tinggi') ?>

    <?php // echo $form->field($model, 'berat') ?>

    <?php // echo $form->field($model, 'alamat_jalan') ?>

    <?php // echo $form->field($model, 'alamat_kota') ?>

    <?php // echo $form->field($model, 'kodepos') ?>

    <?php // echo $form->field($model, 'telpon') ?>

    <?php // echo $form->field($model, 'hp') ?>

    <?php // echo $form->field($model, 'agama_id') ?>

    <?php // echo $form->field($model, 'provinsi_id') ?>

    <?php // echo $form->field($model, 'kabupaten_id') ?>

    <?php // echo $form->field($model, 'kecamatan_id') ?>

    <?php // echo $form->field($model, 'sim_a') ?>

    <?php // echo $form->field($model, 'sim_b1') ?>

    <?php // echo $form->field($model, 'sim_b2') ?>

    <?php // echo $form->field($model, 'sim_c') ?>

    <?php // echo $form->field($model, 'foto') ?>

    <?php // echo $form->field($model, 'usaha_golongan') ?>

    <?php // echo $form->field($model, 'tgl_hapus') ?>

    <?php // echo $form->field($model, 'sts') ?>

    <?php // echo $form->field($model, 'jabatan_pokok') ?>

    <?php // echo $form->field($model, 'jabatan_kelompok') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
