<?php
use yii\helpers\Html;
use yii\grid\GridView;
use kartik\form\ActiveForm;
use app\models\IpkJenispddk;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\jui\DatePicker;
use yii\widgets\Pjax;

  $daftarpendidikan= IpkJenispddk::find()->where(['levels' => 'G'])->andWhere(['!=','kode','4000'])->all();
  $listPendidikan=ArrayHelper::map($daftarpendidikan,'kode','nama');

?>

    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>
    <?= $form->field($model, 'nama')->textInput(['maxlength' => true])->label('Nama Institusi Pendidikan') ?>
<div class="block left" style="width:50%">
    <?= $form->field($model, 'jenis')->dropDownList($listPendidikan, ['prompt'=>'Pendidikan', 'class'=>'form-control'])->label('Tingkat Pendidikan') ?>
    <?= $form->field($model, 'nilai')->textInput(['maxlength' => true]) ?>
</div>
<div class="block left" style="width:50%">
    <?= $form->field($model, 'tahun_masuk')->widget(DatePicker::classname(), [
    //'language' => 'ru',
    'dateFormat' => 'yyyy-MM-dd',
    'options' => ['class'=>'form-control',],
		'clientOptions' => [
        'changeMonth'=> true,
				'changeYear'=> true,
				'yearRange'=> "-50:+0",
    ],
    ])->label('Tanggal Masuk') ?>
    <?= $form->field($model, 'tahun_lulus')->widget(DatePicker::classname(), [
    //'language' => 'ru',
    'dateFormat' => 'yyyy-MM-dd',
    'options' => ['class'=>'form-control',],
		'clientOptions' => [
        'changeMonth'=> true,
				'changeYear'=> true,
				'yearRange'=> "-50:+0",
    ],
    
    ])->label('Tanggal Lulus') ?>

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
            'jenisPendidikan.nama',
            'nama',
            'tahun_masuk',
            'tahun_lulus',
            'nilai',


            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{delete}',
            'buttons'=>[
              'delete' => function ($url, $model) {   
                 $url = Yii::$app->urlManager->createUrl(['pencaker/pencaker/delete_pendidikan','id'=>$model->id]);
                return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                        'title' => Yii::t('yii', 'Hapus'),
                ]);                                

              }
            ]
            ],
        ],
    ]); ?>
