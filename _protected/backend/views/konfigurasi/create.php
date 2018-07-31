<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Konfigurasi */

$this->title = Yii::t('app', 'Create Konfigurasi');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Konfigurasis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="konfigurasi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
