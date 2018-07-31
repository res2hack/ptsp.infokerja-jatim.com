<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Perusahaan */

$this->title = 'Form Perusahaan';
$this->params['breadcrumbs'][] = ['label' => 'Data Perusahaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perusahaan-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
