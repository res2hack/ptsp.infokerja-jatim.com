<?php

namespace backend\controllers;

use Yii;
use common\models\Perusahaan;
use common\models\PerusahaanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\IpkKecamatan;
use common\models\IpkKabupaten;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * PerusahaanController implements the CRUD actions for Perusahaan model.
 */
class PerusahaanController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Perusahaan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PerusahaanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Perusahaan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Perusahaan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Perusahaan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Perusahaan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Perusahaan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
			// $this->findModel($id)->delete();
			try {
        if($this->findModel($id)->delete()){
           Yii::$app->session->setFlash('success', "Data Berhasil Dihapus");
        }
     } catch (\Exception $e) {
        Yii::$app->session->setFlash('error', "Data GAGAL Dihapus");
     }
     return $this->redirect(['index']);
    }

    /**
     * Finds the Perusahaan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Perusahaan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Perusahaan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionKabupaten($id=0) //ajax sub pendidikan
    {
      $usaha= IpkKabupaten::find()->where(['provinsi_id' => $id])->all();
      $listUsaha=ArrayHelper::map($usaha,'id','nama');
      echo Html::dropDownList('Perusahaan[kabkota_id]','',$listUsaha,['prompt'=>'Kabupaten', 'class'=>'form-control', 'onChange'=>'
              $.get("'.Url::to(['perusahaan/kecamatan','id'=>'']).'"+$(this).val(), function(data, status){
                if(status == "success"){
                  $("#ajx_kecamatan").html(data);
                }
              });
            ']);
      // echo $id;
    }    
    public function actionKecamatan($id=0) //ajax sub pendidikan
    {
      $usaha= IpkKecamatan::find()->where(['kabupaten_id' => $id])->all();
      $listUsaha=ArrayHelper::map($usaha,'id','nama');
      echo Html::dropDownList('Perusahaan[kecamatan_id]','',$listUsaha,['prompt'=>'Kecamatan', 'class'=>'form-control']);
      // echo $id;
    }

}
