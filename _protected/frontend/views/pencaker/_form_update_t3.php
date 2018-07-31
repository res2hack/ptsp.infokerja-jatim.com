<?php
use yii\helpers\Html;
use yii\grid\GridView;
use kartik\form\ActiveForm;
use yii\helpers\Url;
?>

    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>
    <?= $form->field($model, 'nama')->textInput(['maxlength' => true])->label('Nama Institusi Penyelenggara Sertifikasi') ?>
<div class="block left" style="width:50%">
    <?= $form->field($model, 'keahlian')->textInput(['maxlength' => true])->label('Keahlian Sertifikasi') ?>
</div>
<div class="block left" style="width:50%">
    <?= $form->field($model, 'nilai')->textInput(['maxlength' => true])->label('Penilaian Sertifikasi') ?>
</div>

     <div class="col-md-offset-11 form-group">
        <?= Html::submitButton('Tambah', ['class' => 'btn btn-danger']) ?>
    </div>
    <?php ActiveForm::end(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            // 'tingkatPendidikan.nama',
            'nama',
            'keahlian',
            'nilai',
            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{delete}',
            'buttons'=>[
              'delete' => function ($url, $model) {   
                 $url = Yii::$app->urlManager->createUrl(['pencaker/pencaker/delete_sertifikasi','id'=>$model->id]);
                return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                        'title' => Yii::t('yii', 'Hapus'),
                ]);                                

              }
            ]
            ],
        ],
    ]); ?>
