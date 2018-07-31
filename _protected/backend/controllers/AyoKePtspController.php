<?php

namespace backend\controllers;

use Yii;
use common\models\PciPosting;
use common\models\PciPostingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessRule;

/**
 * PostingController implements the CRUD actions for PciPosting model.
 */
class AyoKePtspController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
			'access' => [
				'class' => \yii\filters\AccessControl::className(),
				'ruleConfig' => [
					'class' => AccessRule::className(),
				],
				'rules' => [
					[
						'allow' => true,
						'roles' => ['admin'],
					],
				],
			],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all PciPosting models.
     * @return mixed
     */

    public function actionUpdate()
    {
			$id=3;
        $model = $this->findModel($id);
        $model->slug = "ayo-ke-ptsp";
        $model->waktu_update = date("Y-m-d H:i:s");

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
					// print_r(Yii::$app->request->post());
        // if ($model->load(Yii::$app->request->post())) {
						// print_r($model);
            return $this->redirect(['update']);
        } else {
					// var_dump($model->errors);
					
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    protected function findModel($id)
    {
        if (($model = PciPosting::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
