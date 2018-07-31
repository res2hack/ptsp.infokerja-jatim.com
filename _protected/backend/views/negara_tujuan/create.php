<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\NegaraTujuan */

$this->title = 'Form Negara Tujuan PMI';
$this->params['breadcrumbs'][] = ['label' => 'Data Negara Tujuan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="negara-tujuan-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
