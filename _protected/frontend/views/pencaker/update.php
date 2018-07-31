<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\IpkPencaker */

$this->title = 'Biodata : ' . ' ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Ipk Pencakers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ipk-pencaker-update">

<div class="panel panel-primary">
  <div class="panel-heading"><h1><?= Html::encode($this->title) ?></h1></div>
  <div class="panel-body">

    <?= $this->render('_form_update', [
        'model' => $model,
        'model_pendidikan' => $model_pendidikan,
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
        'searchModel_sertifikasi' => $searchModel_sertifikasi,
        'dataProvider_sertifikasi' => $dataProvider_sertifikasi,
        'model_sertifikasi' => $model_sertifikasi,
    ]) ?>

</div>
</div>
</div>
