<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\WebRtext */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Data Info', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-rtext-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'isi:ntext',
            'tgl_mulai',
            'tgl_selesai',
        ],
    ]) ?>

</div>
