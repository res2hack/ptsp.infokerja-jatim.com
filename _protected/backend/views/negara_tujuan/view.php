<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\NegaraTujuan */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Data Negara Tujuan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="negara-tujuan-view">
<div class="box box-primary">
	<div class="box-body">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Anda yakin Akan Menghapus Data ini ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'negara',
        ],
    ]) ?>

</div>
</div>
</div>
