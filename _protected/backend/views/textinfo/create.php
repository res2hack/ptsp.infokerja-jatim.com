<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\WebRtext */

$this->title = 'Create Web Rtext';
$this->params['breadcrumbs'][] = ['label' => 'Data Info', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-rtext-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
