<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PciPostingTag */

$this->title = 'Create Pci Posting Tag';
$this->params['breadcrumbs'][] = ['label' => 'Pci Posting Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pci-posting-tag-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
