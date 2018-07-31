<?php

namespace frontend\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use common\models\LoginForm;
use common\models\ContactForm;
use yii\data\Pagination;
use common\models\PciKonsultasi;
use common\models\User;
use frontend\models\AccountActivation;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                // 'fixedVerifyCode' => YII_ENV_TEST ? 'xx' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
      $slider = (new \yii\db\Query())
        ->select('*')
        ->from('pci_posting')
        ->innerJoin('pci_kategori', 'pci_posting.kategori_id=pci_kategori.id')
        ->where(['pci_kategori.kategori' => 'slider'])
        ->andWhere(['pci_posting.sts_aktif' => '1'])
        ->orderBy('pci_posting.id DESC')
        ->limit('10')
        ->all();
        return $this->render('index',[
        'slider'=>$slider,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    public function actionProdesmigratif()
    {        
      $model = (new \yii\db\Query())
				->select('pci_posting.*')
        ->from('pci_posting')
				->leftJoin('pci_kategori', 'pci_posting.kategori_id=pci_kategori.id')
        ->where(['pci_posting.slug'=>'prodesmigratif'])
        ->andWhere(['pci_posting.sts_aktif'=>1])
        ->one();

 			return $this->render('prodesmigratif',[
				'model'=>$model,
			]);
    }
    public function actionAyoKePtsp()
    {        
      $model = (new \yii\db\Query())
				->select('pci_posting.*')
        ->from('pci_posting')
				->leftJoin('pci_kategori', 'pci_posting.kategori_id=pci_kategori.id')
        ->where(['pci_posting.slug'=>'ayo-ke-ptsp'])
        ->andWhere(['pci_posting.sts_aktif'=>1])
        ->one();

 			return $this->render('ayo-ke-ptsp-pmi-jatim',[
				'model'=>$model,
			]);
    }
    public function actionDaftarJadiPmi()
    {        
      $model = (new \yii\db\Query())
				->select('pci_posting.*')
        ->from('pci_posting')
				->leftJoin('pci_kategori', 'pci_posting.kategori_id=pci_kategori.id')
        ->where(['pci_posting.slug'=>'daftar-jadi-pmi'])
        ->andWhere(['pci_posting.sts_aktif'=>1])
        ->one();

 			return $this->render('daftar-jadi-pmi',[
				'model'=>$model,
			]);
    }
    public function actionSyaratJadiPmi()
    {        
      $model = (new \yii\db\Query())
				->select('pci_posting.*')
        ->from('pci_posting')
				->leftJoin('pci_kategori', 'pci_posting.kategori_id=pci_kategori.id')
        ->where(['pci_posting.slug'=>'syarat-jadi-pmi'])
        ->andWhere(['pci_posting.sts_aktif'=>1])
        ->one();

 			return $this->render('syarat-jadi-pmi',[
				'model'=>$model,
			]);
    }
    public function actionSkemaKerjaPmi()
    {        
      $model = (new \yii\db\Query())
				->select('pci_posting.*')
        ->from('pci_posting')
				->leftJoin('pci_kategori', 'pci_posting.kategori_id=pci_kategori.id')
        ->where(['pci_posting.slug'=>'skema-kerja-pmi'])
        ->andWhere(['pci_posting.sts_aktif'=>1])
        ->one();

 			return $this->render('skema-kerja-pmi',[
				'model'=>$model,
			]);
    }
    public function actionAsuransi()
    {        
      $model = (new \yii\db\Query())
				->select('pci_posting.*')
        ->from('pci_posting')
				->leftJoin('pci_kategori', 'pci_posting.kategori_id=pci_kategori.id')
        ->where(['pci_posting.slug'=>'asuransi'])
        ->andWhere(['pci_posting.sts_aktif'=>1])
        ->one();

 			return $this->render('asuransi',[
				'model'=>$model,
			]);
    }
    public function actionTentangKami()
    {        
      $model = (new \yii\db\Query())
				->select('pci_posting.*')
        ->from('pci_posting')
				->leftJoin('pci_kategori', 'pci_posting.kategori_id=pci_kategori.id')
        ->where(['pci_posting.slug'=>'tentang-kami'])
        ->andWhere(['pci_posting.sts_aktif'=>1])
        ->one();

 			return $this->render('ayo-ke-ptsp-pmi-jatim',[
				'model'=>$model,
			]);
    }
		
    public function actionGame()
    {        
      $model = (new \yii\db\Query())
				->select('pci_posting.*')
        ->from('pci_posting')
				->leftJoin('pci_kategori', 'pci_posting.kategori_id=pci_kategori.id')
        ->where(['pci_posting.slug'=>'game'])
        ->andWhere(['pci_posting.sts_aktif'=>1])
        ->one();

 			return $this->render('game',[
				'model'=>$model,
			]);
    }
    public function actionPengumuman()
    {        
      $model = (new \yii\db\Query())
				->select('pci_posting.*, pci_kategori.kategori')
        ->from('pci_posting')
				->innerJoin('pci_kategori', 'pci_posting.kategori_id=pci_kategori.id')
        ->where(['pci_kategori.kategori'=>'pengumuman'])
        ->orderBy('pci_posting.id desc')
        ->limit('10')
        ->all();
 			return $this->render('pengumuman',[
				'model'=>$model,
			]);
    }
    public function actionKonsultasi()
    {
        $model = new PciKonsultasi();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
 						Yii::$app->session->setFlash('success', "Konsultasi Telah Berhasil Di Kirim.. Terimakasih");
           return $this->redirect(['konsultasi/view', 'id' => $model->id]);
        } else {
            return $this->render('konsultasi', [
                'model' => $model,
            ]);
        }
    }
    public function actionPengumumanDetail($id)
    {        
      $model = (new \yii\db\Query())
				->select('pci_posting.*, pci_kategori.kategori')
        ->from('pci_posting')
				->innerJoin('pci_kategori', 'pci_posting.kategori_id=pci_kategori.id')
        ->where(['pci_kategori.kategori'=>'pengumuman'])
        ->andWhere(['pci_posting.id'=>$id])
        ->orderBy('pci_posting.id desc')
        ->limit('10')
        ->one();
 			return $this->render('pengumuman-detail',[
				'model'=>$model,
			]);
    }
    public function actionLowonganLuarNegeri()
    {        
      // $lowongan_ln = (new \yii\db\Query())
				// ->select('sip.*, perusahaan.nama as perusahaan, jabatan.nama as jabatan, negara_tujuan.negara')
        // ->from('sip')
				// ->innerJoin('perusahaan', 'sip.perusahaan_id=perusahaan.id')
				// ->innerJoin('jabatan', 'sip.jabatan_id=jabatan.id')
				// ->innerJoin('negara_tujuan', 'sip.negara_tujuan=negara_tujuan.id')
        // ->where(['>','sip.tgl_ijin_akhir',date('Y-m-d')])
        // ->orderBy('sip.id desc')
        // ->limit('10')
        // ->all();
      $negara = (new \yii\db\Query())
				->select('negara_tujuan.id,negara_tujuan.negara, count(sip.id) as jumlah')
        ->from('sip')
				->innerJoin('negara_tujuan', 'sip.negara_tujuan=negara_tujuan.id')
        ->where(['>','sip.tgl_ijin_akhir',date('Y-m-d')])
				->groupBy('negara_tujuan.negara')
        ->orderBy('negara')
        ->having('jumlah > 0')
        // ->limit('10')
        ->all();
      $jabatan = (new \yii\db\Query())
				->select('jabatan.id, jabatan.nama as jabatan, count(sip.id) as jumlah')
        ->from('sip')
				->innerJoin('jabatan', 'sip.jabatan_id=jabatan.id')
        ->where(['>','sip.tgl_ijin_akhir',date('Y-m-d')])
				->groupBy('jabatan.nama')
        ->orderBy('jabatan.nama')
        // ->limit('10')
        ->all();

     $model = (new \yii\db\Query())
				->select('sip.*, perusahaan.nama as perusahaan, jabatan.nama as jabatan, negara_tujuan.negara')
        ->from('sip')
				->innerJoin('perusahaan', 'sip.perusahaan_id=perusahaan.id')
				->innerJoin('jabatan', 'sip.jabatan_id=jabatan.id')
				->innerJoin('negara_tujuan', 'sip.negara_tujuan=negara_tujuan.id')
        ->where(['>','sip.tgl_ijin_akhir',date('Y-m-d')])
        ->orderBy('sip.id desc');

        if(isset($_POST['cari'])){
          $query = $model->orderBy('sip.id desc')
                  ->andWhere(['like','jabatan.nama',$_POST['cari']]);
          $count = $query->count();
          $pageSize = 10;
          $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);
          $model = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
          // return $this->render('direktori-disnaker', [
              // 'model' => $model,
              // 'pagination' => $pagination,
              // 'cari'=>$_POST['cari'],
          // ]);        
        }else{
          $query = $model->orderBy('sip.id desc');
          $count = $query->count();
          $pageSize = 10;
          $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);
          $model = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
          // return $this->render('direktori-disnaker', [
          // ]);        
        }
      
 			return $this->render('lowongan-luar-negeri',[
				// 'lowongan_ln'=>$lowongan_ln,
				'negara'=>$negara,
				'jabatan'=>$jabatan,
				'model' => $model,
				'pagination' => $pagination,
				'cari'=>'',
			]);
    }
    public function actionLowonganLuarNegeriDetail($id)
    {        
      $model = (new \yii\db\Query())
				->select('sip.*, perusahaan.nama as perusahaan,perusahaan.alamat, perusahaan.contact_nama, perusahaan.contact_telp,perusahaan.email, jabatan.nama as jabatan, negara_tujuan.negara')
        ->from('sip')
				->innerJoin('perusahaan', 'sip.perusahaan_id=perusahaan.id')
				->innerJoin('jabatan', 'sip.jabatan_id=jabatan.id')
				->innerJoin('negara_tujuan', 'sip.negara_tujuan=negara_tujuan.id')
        ->where(['>','sip.tgl_ijin_akhir',date('Y-m-d')])
        ->andWhere(['sip.id'=>$id])
        // ->orderBy('sip.id desc')
        // ->limit('10')
        ->one();

 			return $this->render('lowongan-luar-negeri-detail',[
				'model'=>$model,
			]);
    }
    public function actionLowonganLuarNegeriByNegara($id=0) //detail
    {
     $model = (new \yii\db\Query())
				->select('sip.*, perusahaan.nama as perusahaan, jabatan.nama as jabatan, negara_tujuan.negara')
        ->from('sip')
				->innerJoin('perusahaan', 'sip.perusahaan_id=perusahaan.id')
				->innerJoin('jabatan', 'sip.jabatan_id=jabatan.id')
				->innerJoin('negara_tujuan', 'sip.negara_tujuan=negara_tujuan.id')
        ->where(['>','sip.tgl_ijin_akhir',date('Y-m-d')])
        ->orderBy('sip.id desc');
     if($id!=0){
        $query = $model->andWhere(['sip.negara_tujuan'=>$id]);
					$count = $query->count();
          $pageSize = 10;
          $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);
          $model = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
          return $this->render('lowongan-luar-negeri-by-negara', [
              'model' => $model,
              'pagination' => $pagination,
              'cari'=>'',
          ]);        
      }else{ //list
        if(isset($_POST['cari'])){
          $query = $model;
          $count = $query->count();
          $pageSize = 10;
          $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);
          $model = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
          return $this->render('lowongan-luar-negeri-by-negara', [
              'model' => $model,
              'pagination' => $pagination,
              'cari'=>$_POST['cari'],
          ]);        
        }else{
          $query = $model;
          $count = $query->count();
          $pageSize = 10;
          $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);
          $model = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
          return $this->render('lowongan-luar-negeri-by-negara', [
              'model' => $model,
              'pagination' => $pagination,
              'cari'=>'',
          ]);        
        }
      }
    }
    public function actionLowonganLuarNegeriByJabatan($id=0) //detail
    {
     $model = (new \yii\db\Query())
				->select('sip.*, perusahaan.nama as perusahaan, jabatan.nama as jabatan, negara_tujuan.negara')
        ->from('sip')
				->innerJoin('perusahaan', 'sip.perusahaan_id=perusahaan.id')
				->innerJoin('jabatan', 'sip.jabatan_id=jabatan.id')
				->innerJoin('negara_tujuan', 'sip.negara_tujuan=negara_tujuan.id')
        ->where(['>','sip.tgl_ijin_akhir',date('Y-m-d')])
        ->orderBy('sip.id desc');
     if($id!=0){
        $query = $model->andWhere(['sip.jabatan_id'=>$id]);
					$count = $query->count();
          $pageSize = 10;
          $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);
          $model = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
          return $this->render('lowongan-luar-negeri-by-jabatan', [
              'model' => $model,
              'pagination' => $pagination,
              'cari'=>'',
          ]);        
      }else{ //list
        if(isset($_POST['cari'])){
          $query = $model;
          $count = $query->count();
          $pageSize = 10;
          $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);
          $model = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
          return $this->render('lowongan-luar-negeri-by-jabatan', [
              'model' => $model,
              'pagination' => $pagination,
              'cari'=>$_POST['cari'],
          ]);        
        }else{
          $query = $model;
          $count = $query->count();
          $pageSize = 10;
          $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);
          $model = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
          return $this->render('lowongan-luar-negeri-by-jabatan', [
              'model' => $model,
              'pagination' => $pagination,
              'cari'=>'',
          ]);        
        }
      }
    }

    public function actionProdesmigratif2($id=0) //detail
    {
     $model = (new \yii\db\Query())
        ->select('*')
        ->from('pci_direktori')
        ->where(['pci_direktori.kategori' => 'disnaker'])
        ->limit('10')
        ->all();
     if($id!=0){
        $model = $model->andWhere(['pci_direktori.id' => $id])
          ->one();
        return $this->render('direktori-disnaker-detail', [
            'model' => $model,
        ]);
      }else{ //list
        if(isset($_POST['cari'])){
          $query = $model->orderBy('pci_direktori.urutan ASC')
                  ->andWhere(['like','pci_direktori.nama',$_POST['cari']]);
          $count = $query->count();
          $pageSize = 10;
          $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);
          $model = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
          return $this->render('direktori-disnaker', [
              'model' => $model,
              'pagination' => $pagination,
              'cari'=>$_POST['cari'],
          ]);        
        }else{
          $query = $model->orderBy('pci_direktori.urutan ASC');
          $count = $query->count();
          $pageSize = 10;
          $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);
          $model = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
          return $this->render('direktori-disnaker', [
              'model' => $model,
              'pagination' => $pagination,
              'cari'=>'',
          ]);        
        }
      }
    }
    public function actionDirektoriDisnaker($id=0) //detail
    {
     $model = (new \yii\db\Query())
        ->select('*')
        ->from('pci_direktori')
        ->where(['pci_direktori.kategori' => 'disnaker'])
        ->limit('10');
        // ->all();
     if($id!=0){
        $model = $model->andWhere(['pci_direktori.id' => $id])
          ->one();
        return $this->render('direktori-disnaker-detail', [
            'model' => $model,
        ]);
      }else{ //list
        if(isset($_POST['cari'])){
          $query = $model->orderBy('pci_direktori.urutan ASC')
                  ->andWhere(['like','pci_direktori.nama',$_POST['cari']]);
          $count = $query->count();
          $pageSize = 10;
          $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);
          $model = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
          return $this->render('direktori-disnaker', [
              'model' => $model,
              'pagination' => $pagination,
              'cari'=>$_POST['cari'],
          ]);        
        }else{
          $query = $model->orderBy('pci_direktori.urutan ASC');
          $count = $query->count();
          $pageSize = 10;
          $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);
          $model = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
          return $this->render('direktori-disnaker', [
              'model' => $model,
              'pagination' => $pagination,
              'cari'=>'',
          ]);        
        }
      }
    }
    public function actionDirektoriP3mi($id=0) //detail
    {
     $model = (new \yii\db\Query())
        ->select('*')
        ->from('pci_direktori')
        ->where(['pci_direktori.kategori' => 'p3mi'])
        ->limit('10');
        // ->all();
     if($id!=0){
        $model = $model->andWhere(['pci_direktori.id' => $id])
          ->one();
        return $this->render('direktori-p3mi-detail', [
            'model' => $model,
        ]);
      }else{ //list
        if(isset($_POST['cari'])){
          $query = $model->orderBy('pci_direktori.urutan ASC')
                  ->andWhere(['like','pci_direktori.nama',$_POST['cari']]);
          $count = $query->count();
          $pageSize = 10;
          $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);
          $model = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
          return $this->render('direktori-p3mi', [
              'model' => $model,
              'pagination' => $pagination,
              'cari'=>$_POST['cari'],
          ]);        
        }else{
          $query = $model->orderBy('pci_direktori.urutan ASC');
          $count = $query->count();
          $pageSize = 10;
          $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);
          $model = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
          return $this->render('direktori-p3mi', [
              'model' => $model,
              'pagination' => $pagination,
              'cari'=>'',
          ]);        
        }
      }
    }
    public function actionDirektoriBlk($id=0) //detail
    {
			$model = (new \yii\db\Query())
        ->select('*')
        ->from('pci_direktori')
        ->where(['in','pci_direktori.kategori',['blk-negeri','blk-swasta']])
        ->limit('10')
        ->orderBy('pci_direktori.kategori');
        // ->all();
			if($id!=0){
        $model = $model->andWhere(['pci_direktori.id' => $id])
          ->one();
        return $this->render('direktori-blk-detail', [
            'model' => $model,
        ]);
      }else{ //list
        if(isset($_POST['cari'])){
          $query = $model->orderBy('pci_direktori.kategori ASC')
                  ->andWhere(['like','pci_direktori.nama',$_POST['cari']]);
          $count = $query->count();
          $pageSize = 10;
          $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);
          $model = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
          return $this->render('direktori-blk', [
              'model' => $model,
              'pagination' => $pagination,
              'cari'=>$_POST['cari'],
          ]);        
        }else{
          $query = $model->orderBy('pci_direktori.kategori');
          $count = $query->count();
          $pageSize = 10;
          $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);
          $model = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
          return $this->render('direktori-blk', [
              'model' => $model,
              'pagination' => $pagination,
              'cari'=>'',
          ]);        
        }
      }
    }
    public function actionDirektoriKbri($id=0) //detail
    {
     $model = (new \yii\db\Query())
        ->select('*')
        ->from('pci_direktori')
        ->where(['pci_direktori.kategori' => 'kbri'])
        ->limit('10');
        // ->all();
     if($id!=0){
        $model = $model->andWhere(['pci_direktori.id' => $id])
          ->one();
        return $this->render('direktori-kbri-detail', [
            'model' => $model,
        ]);
      }else{ //list
        if(isset($_POST['cari'])){
          $query = $model->orderBy('pci_direktori.urutan ASC')
                  ->andWhere(['like','pci_direktori.nama',$_POST['cari']]);
          $count = $query->count();
          $pageSize = 10;
          $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);
          $model = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
          return $this->render('direktori-kbri', [
              'model' => $model,
              'pagination' => $pagination,
              'cari'=>$_POST['cari'],
          ]);
        }else{
          $query = $model->orderBy('pci_direktori.urutan ASC');
          $count = $query->count();
          $pageSize = 10;
          $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);
          $model = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
          return $this->render('direktori-kbri', [
              'model' => $model,
              'pagination' => $pagination,
              'cari'=>'',
          ]);        
        }
      }
    }
    public function actionDirektoriLsp($id=0) //detail
    {
     $model = (new \yii\db\Query())
        ->select('*')
        ->from('pci_direktori')
        ->where(['pci_direktori.kategori' => 'lsp'])
        ->limit('10');
        // ->all();
     if($id!=0){
        $model = $model->andWhere(['pci_direktori.id' => $id])
          ->one();
        return $this->render('direktori-lsp-detail', [
            'model' => $model,
        ]);
      }else{ //list
        if(isset($_POST['cari'])){
          $query = $model->orderBy('pci_direktori.urutan ASC')
                  ->andWhere(['like','pci_direktori.nama',$_POST['cari']]);
          $count = $query->count();
          $pageSize = 10;
          $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);
          $model = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
          return $this->render('direktori-lsp', [
              'model' => $model,
              'pagination' => $pagination,
              'cari'=>$_POST['cari'],
          ]);        
        }else{
          $query = $model->orderBy('pci_direktori.urutan ASC');
          $count = $query->count();
          $pageSize = 10;
          $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);
          $model = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
          return $this->render('direktori-lsp', [
              'model' => $model,
              'pagination' => $pagination,
              'cari'=>'',
          ]);        
        }
      }
    }
    public function actionSignup()
    {  
        // get setting value for 'Registration Needs Activation'
        $rna = Yii::$app->params['rna'];

        // if 'rna' value is 'true', we instantiate SignupForm in 'rna' scenario
        $model = $rna ? new SignupForm(['scenario' => 'rna']) : new SignupForm();

        // collect and validate user data
        if ($model->load(Yii::$app->request->post()) && $model->validate())
        {
            // try to save user data in database
            if ($user = $model->signup()) 
            {
                // if user is active he will be logged in automatically ( this will be first user )
                if ($user->status === User::STATUS_ACTIVE)
                {
                    if (Yii::$app->getUser()->login($user)) 
                    {
                        return $this->goHome();
                    }
                }
                // activation is needed, use signupWithActivation()
                else 
                {
                    $this->signupWithActivation($model, $user);

                    return $this->refresh();
                }            
            }
            // user could not be saved in database
            else
            {
                // display error message to user
                Yii::$app->session->setFlash('error', 
                    "We couldn't sign you up, please contact us.");

                // log this error, so we can debug possible problem easier.
                Yii::error('Signup failed! 
                    User '.Html::encode($user->username).' could not sign up.
                    Possible causes: something strange happened while saving user in database.');

                return $this->refresh();
            }
        }
                
        return $this->render('signup', [
            'model' => $model,
        ]);     
    }
}
