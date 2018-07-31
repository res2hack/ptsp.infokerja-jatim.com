<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\IpkPencaker */

$this->title = 'Pendaftaran PENCAKER';
$this->params['breadcrumbs'][] = ['label' => 'Ipk Pencakers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ipk-pencaker-create">

<div class="panel panel-primary">
  <div class="panel-heading"><h1><?= Html::encode($this->title) ?></h1></div>
  <div class="panel-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
