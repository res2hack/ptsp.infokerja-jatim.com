<?php

namespace frontend\controllers;
use Yii;
use common\models\Email;
use common\models\Perusahaan;
use common\models\PencakerSip;
use common\models\IpkPencaker;
use common\models\IpkPencakerSearch;
use common\models\IpkPendidikan;
use common\models\IpkPendidikanSearch;
use common\models\IpkKursus;
use common\models\IpkKursusSearch;
use common\models\IpkJenispddk;
use common\models\Sip;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Session;
use common\models\IpkKecamatan;
use common\models\IpkKabupaten;
use common\models\IpkJabatanKelompok;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\UploadedFile;
use yii\filters\AccessRule;

/**
 * PencakerController implements the CRUD actions for IpkPencaker model.
 */
class PencakerController extends Controller
{
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
						'actions' => ['create', 'kabupaten', 'kecamatan','jabatan_sub1','pendidikan_sub1','pendidikan_sub2','kabupaten','create-from-loker','kecamatan','view'],
						// 'roles' => ['?'],
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
     * Lists all IpkPencaker models.
     * @return mixed
     */
    public function actionIndex()
    {
        $session = Yii::$app->session;
        if ($session['level']=='pencaker') {
          return $this->redirect(['pencaker/view']);
        }else{
          return $this->redirect(['site/login_pencaker']);
        }
    }

    /**
     * Displays a single IpkPencaker model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $session = Yii::$app->session;
        $searchModel = new IpkPendidikanSearch();
        $searchModel->pencaker_id = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        // $searchModel_sertifikasi = new IpkKursusSearch();
        // $searchModel_sertifikasi->pencaker_id = $session['user']['id'];
        // $dataProvider_sertifikasi = $searchModel_sertifikasi->search(Yii::$app->request->queryParams);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            // 'searchModel_sertifikasi' => $searchModel_sertifikasi,
            // 'dataProvider_sertifikasi' => $dataProvider_sertifikasi,
        ]);
    }

    /**
     * Creates a new IpkPencaker model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new IpkPencaker();
        $email = new Email();
        if ($model->load(Yii::$app->request->post())) {
					 $model->secret = $model->password;
           // if ($model->validate()) {
            $model->password =md5(Yii::$app->params['passKey'].$model->password);
           // }
          // try{
						$file_name = $model->no_nik;
						if (!empty(UploadedFile::getInstance($model, 'foto'))) {
							$xFile1 = UploadedFile::getInstance($model, 'foto');
							$model->foto = $file_name.'-foto'.'.'.$xFile1->extension;
						}
						if (!empty(UploadedFile::getInstance($model, 'curiculum_viteae'))) {
							$xFile2 = UploadedFile::getInstance($model, 'curiculum_viteae');
							$model->curiculum_viteae = $file_name.'-cv'.'.'.$xFile2->extension;
						}
						if (!empty(UploadedFile::getInstance($model, 'lampiran'))) {
							$xFile3 = UploadedFile::getInstance($model, 'lampiran');
							$model->lampiran = $file_name.'-lampiran'.'.'.$xFile3->extension;
						}
             $model->save();
             // if($model->save()){                  
								$pendidikan = new IpkPendidikan();
                $pendidikan->pencaker_id =  $model->id;
                $pendidikan->jenis =  $model->pddk_jenis;
                $pendidikan->tingkat =  $model->pddk_tingkat;
                $pendidikan->jurusan =  $model->pddk_jurusan;
                $pendidikan->save();
                if (!empty(UploadedFile::getInstance($model, 'foto')))
									$xFile1->saveAs(Yii::getAlias('@webroot').'/uploads/pencaker/foto/' . $file_name.'-foto'.'.'.$xFile1->extension);
                if (!empty(UploadedFile::getInstance($model, 'curiculum_viteae')))
									$xFile2->saveAs(Yii::getAlias('@webroot').'/uploads/pencaker/cv/' . $file_name.'-cv'.'.'.$xFile2->extension);
                if (!empty(UploadedFile::getInstance($model, 'lampiran')))
									$xFile3->saveAs(Yii::getAlias('@webroot').'/uploads/pencaker/lampiran/' . $file_name.'-lampiran'.'.'.$xFile3->extension);
                Yii::$app->getSession()->setFlash('success','Data saved!');
                //membuat pendidikan baru
				$enc_id = $this->encryptor('encrypt', $model->id);
				$url = Yii::$app->params['domain'].Url::to(['/site/activate_pencaker/','token'=>$enc_id]);
				$email->to = $model->email;
				$email->from = Yii::$app->params['adminEmail'];
				$email->title = 'Konfirmasi Pendaftaran infokerja-jatim.com';
				$email->content = '<p>Anda mendapatkan email ini karena anda dengan email <b>'.$model->email.'</b> mengajukan permintaan "Pendaftaran Sebagai Perusahaan Baru pada infokerja-jatim.com". </br></br> Jika anda benar-benar menyetujui untuk melakukannya silahkan klik link berikut. </p></br></br><a href="'.$url.'">'.$url.'</a></br></br> Jika tidak setuju abaikan email ini</br>Terimakasih';
				$email->save();
                // $toEmail = $model->email;
                // $enc_id = $this->encryptor('encrypt', $model->id);
                // $url = Yii::$app->params['domain'].Url::to(['/site/activate_pencaker/','token'=>$enc_id]);
                // Yii::$app->mailer->compose()
                // ->setTo($toEmail)
                // ->setFrom([Yii::$app->params['adminEmail']])
                // ->setSubject('Aktivasi infokerja-jatim.com')
                // ->setHtmlBody('<p>Anda mendapatkan email ini karena anda dengan email <b>'.$toEmail.'<b> mengajukan permintaan "Pendaftaran Sebagai Anggota Baru pada infokerja-jatim.com". </br></br> Jika anda benar-benar menyetujui untuk melakukannya silahkan klik link berikut. </p></br></br><a href="'.$url.'">'.$url.'</a></br></br> Jika tidak setuju abaikan email ini</br>Terimakasih')
                // ->send();
               return $this->redirect(['view','id'=>$model->id]);
             /*}else{
                 Yii::$app->getSession()->setFlash('error','Data not saved!');
                 return $this->render('create', [
                       'model' => $model,
                       // //'pendidikan' => $pendidikan,
                 ]);
             }*/
        // }catch(Exception $e){
            // Yii::$app->getSession()->setFlash('error',"{$e->getMessage()}");
        // }
      } else {
          return $this->render('create', [
              'model' => $model,
              // 'pendidikan' => $pendidikan,
          ]);
      }
    
    }
    public function actionCreateFromLoker($loker_id)
    {
			$model = new IpkPencaker();
			$pendidikan = new IpkPendidikan();
			if ($model->load(Yii::$app->request->post())) {
					 $model->secret = $model->password;
           if ($model->validate()) {
            $model->password =md5(Yii::$app->params['passKey'].$model->password);           }
          try{
						$file_name = $model->no_nik;
						if (!empty(UploadedFile::getInstance($model, 'foto'))) {
							$xFile1 = UploadedFile::getInstance($model, 'foto');
							$model->foto = $file_name.'-foto'.'.'.$xFile1->extension;
						}
						if (!empty(UploadedFile::getInstance($model, 'curiculum_viteae'))) {
							$xFile2 = UploadedFile::getInstance($model, 'curiculum_viteae');
							$model->curiculum_viteae = $file_name.'-cv'.'.'.$xFile2->extension;
						}
						if (!empty(UploadedFile::getInstance($model, 'lampiran'))) {
							$xFile3 = UploadedFile::getInstance($model, 'lampiran');
							$model->lampiran = $file_name.'-lampiran'.'.'.$xFile3->extension;
						}
             if($model->save()){    
							//membuat pencaker-lowongan
							$pencakersip = new PencakerSip();
							$pencakersip->pencaker_id =  $model->id;
							$pencakersip->sip_id =  $loker_id;
							$pencakersip->save();
                //membuat pendidikan baru
                // $pendidikan->pencaker_id =  $model->id;
                // $pendidikan->jenis =  $model->pddk_jenis;
                // $pendidikan->tingkat =  $model->pddk_tingkat;
                // $pendidikan->jurusan =  $model->pddk_jurusan;
                // $pendidikan->save();
                if (!empty(UploadedFile::getInstance($model, 'foto')))
									$xFile1->saveAs(Yii::getAlias('@webroot').'/web/files/foto/' . $file_name.'-foto'.'.'.$xFile1->extension);
                if (!empty(UploadedFile::getInstance($model, 'curiculum_viteae')))
									$xFile2->saveAs(Yii::getAlias('@webroot').'/web/files/foto/' . $file_name.'-cv'.'.'.$xFile2->extension);
                if (!empty(UploadedFile::getInstance($model, 'lampiran')))
									$xFile3->saveAs(Yii::getAlias('@webroot').'/web/files/lampiran/' . $file_name.'-lampiran'.'.'.$xFile3->extension);
                Yii::$app->getSession()->setFlash('success','Data saved!');
				$enc_id = $this->encryptor('encrypt', $model->id);
				$url = Yii::$app->params['domain'].Url::to(['/site/activate_pencaker/','token'=>$enc_id]);
				$pencaker_id = $model->id;
				$lowongan_id = $loker_id;
				$email = new Email();
				$email->to = $model->email;
				$email->from = Yii::$app->params['adminEmail'];
				$email->title = 'Konfirmasi Pendaftaran PMI Pekerja Migran Indonesia';
				$email->kat_email = 0;
$email->content = <<<EOT
<!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Simple Transactional Email</title>
    <style>
      /* -------------------------------------
          GLOBAL RESETS
      ------------------------------------- */
      img {
        border: none;
        -ms-interpolation-mode: bicubic;
        max-width: 100%; }

      body {
        background-color: #f6f6f6;
        font-family: sans-serif;
        -webkit-font-smoothing: antialiased;
        font-size: 14px;
        line-height: 1.4;
        margin: 0;
        padding: 0;
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%; }

      table {
        border-collapse: separate;
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
        width: 100%; }
        table td {
          font-family: sans-serif;
          font-size: 14px;
          vertical-align: top; }

      /* -------------------------------------
          BODY & CONTAINER
      ------------------------------------- */

      .body {
        background-color: #f6f6f6;
        width: 100%; }

      /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
      .container {
        display: block;
        Margin: 0 auto !important;
        /* makes it centered */
        max-width: 580px;
        padding: 10px;
        width: 580px; }

      /* This should also be a block element, so that it will fill 100% of the .container */
      .content {
        box-sizing: border-box;
        display: block;
        Margin: 0 auto;
        max-width: 580px;
        padding: 10px; }

      /* -------------------------------------
          HEADER, FOOTER, MAIN
      ------------------------------------- */
      .main {
        background: #ffffff;
        border-radius: 3px;
        width: 100%; }

      .wrapper {
        box-sizing: border-box;
        padding: 20px; }

      .content-block {
        padding-bottom: 10px;
        padding-top: 10px;
      }

      .footer {
        clear: both;
        Margin-top: 10px;
        text-align: center;
        width: 100%; }
        .footer td,
        .footer p,
        .footer span,
        .footer a {
          color: #999999;
          font-size: 12px;
          text-align: center; }

      /* -------------------------------------
          TYPOGRAPHY
      ------------------------------------- */
      h1,
      h2,
      h3,
      h4 {
        color: #000000;
        font-family: sans-serif;
        font-weight: 400;
        line-height: 1.4;
        margin: 0;
        Margin-bottom: 30px; }

      h1 {
        font-size: 35px;
        font-weight: 300;
        text-align: center;
        text-transform: capitalize; }

      p,
      ul,
      ol {
        font-family: sans-serif;
        font-size: 14px;
        font-weight: normal;
        margin: 0;
        Margin-bottom: 15px; }
        p li,
        ul li,
        ol li {
          list-style-position: inside;
          margin-left: 5px; }

      a {
        color: #3498db;
        text-decoration: underline; }

      /* -------------------------------------
          BUTTONS
      ------------------------------------- */
      .btn {
        box-sizing: border-box;
        width: 100%; }
        .btn > tbody > tr > td {
          padding-bottom: 15px; }
        .btn table {
          width: auto; }
        .btn table td {
          background-color: #ffffff;
          border-radius: 5px;
          text-align: center; }
        .btn a {
          background-color: #ffffff;
          border: solid 1px #3498db;
          border-radius: 5px;
          box-sizing: border-box;
          color: #3498db;
          cursor: pointer;
          display: inline-block;
          font-size: 14px;
          font-weight: bold;
          margin: 0;
          padding: 12px 25px;
          text-decoration: none;
          text-transform: capitalize; }

      .btn-primary table td {
        background-color: #3498db; }

      .btn-primary a {
        background-color: #3498db;
        border-color: #3498db;
        color: #ffffff; }

      /* -------------------------------------
          OTHER STYLES THAT MIGHT BE USEFUL
      ------------------------------------- */
      .last {
        margin-bottom: 0; }

      .first {
        margin-top: 0; }

      .align-center {
        text-align: center; }

      .align-right {
        text-align: right; }

      .align-left {
        text-align: left; }

      .clear {
        clear: both; }

      .mt0 {
        margin-top: 0; }

      .mb0 {
        margin-bottom: 0; }

      .preheader {
        color: transparent;
        display: none;
        height: 0;
        max-height: 0;
        max-width: 0;
        opacity: 0;
        overflow: hidden;
        mso-hide: all;
        visibility: hidden;
        width: 0; }

      .powered-by a {
        text-decoration: none; }

      hr {
        border: 0;
        border-bottom: 1px solid #f6f6f6;
        Margin: 20px 0; }

      /* -------------------------------------
          RESPONSIVE AND MOBILE FRIENDLY STYLES
      ------------------------------------- */
      @media only screen and (max-width: 620px) {
        table[class=body] h1 {
          font-size: 28px !important;
          margin-bottom: 10px !important; }
        table[class=body] p,
        table[class=body] ul,
        table[class=body] ol,
        table[class=body] td,
        table[class=body] span,
        table[class=body] a {
          font-size: 16px !important; }
        table[class=body] .wrapper,
        table[class=body] .article {
          padding: 10px !important; }
        table[class=body] .content {
          padding: 0 !important; }
        table[class=body] .container {
          padding: 0 !important;
          width: 100% !important; }
        table[class=body] .main {
          border-left-width: 0 !important;
          border-radius: 0 !important;
          border-right-width: 0 !important; }
        table[class=body] .btn table {
          width: 100% !important; }
        table[class=body] .btn a {
          width: 100% !important; }
        table[class=body] .img-responsive {
          height: auto !important;
          max-width: 100% !important;
          width: auto !important; }}

      /* -------------------------------------
          PRESERVE THESE STYLES IN THE HEAD
      ------------------------------------- */
      @media all {
        .ExternalClass {
          width: 100%; }
        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
          line-height: 100%; }
        .apple-link a {
          color: inherit !important;
          font-family: inherit !important;
          font-size: inherit !important;
          font-weight: inherit !important;
          line-height: inherit !important;
          text-decoration: none !important; }
        .btn-primary table td:hover {
          background-color: #34495e !important; }
        .btn-primary a:hover {
          background-color: #34495e !important;
          border-color: #34495e !important; } }

    </style>
  </head>
  <body class="">
    <table border="0" cellpadding="0" cellspacing="0" class="body">
      <tr>
        <td>&nbsp;</td>
        <td class="container">
          <div class="content">

            <!-- START CENTERED WHITE CONTAINER -->
            <span class="preheader">Dinas Tenaga Kerja Provinsi Jawa Timur</span>
            <table class="main">

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper">
                  <table border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>
                        <p>Terimakasih,</p>
                        <p>Para pencari kerja kami ucapkan terimakasih atas kertersediaan anda mendaftar menjadi PMI (pekerja migran indonesia) melalui PTSP dinas Tenaga Kerja Provinsi Jawa Timur.</p>
                        <p>Lamaran Anda telah kami kirim pada P3MI yang bersangkutan, harap tunggu info atau anda dapat menghubungi P3MI terkait.</p>
                        <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                          <tbody>
                            <tr>
                              <td align="left">
                                <table border="0" cellpadding="0" cellspacing="0">
                                  <tbody>
                                    <tr>
                                      <td> <a href="http://ptsp.infokerja-jatim.com/pencaker/view?id={$pencaker_id}" target="_blank">Identitas Anda</a> </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                          <tbody>
                            <tr>
                              <td align="left">
                                <table border="0" cellpadding="0" cellspacing="0">
                                  <tbody>
                                    <tr>
                                      <td> <a href="http://ptsp.infokerja-jatim.com/site/lowongan-luar-negeri-detail?id={$lowongan_id}" target="_blank">Lowongan Pilihan Anda</a> </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <p>Pastikan anda menjadi PMI "RESMI" untuk menjaga keselamatan Anda.</p>
                        <p>Terimakasih.</p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>

            <!-- START FOOTER -->
            <div class="footer">
              <table border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td class="content-block powered-by">
                    Dikirim Oleh <a href="http://ptsp.infokerja-jatim.com">PTSP Dinas Tenaga Kerja Provinsi Jawa Timur</a>.
                  </td>
                </tr>
                <tr>
                  <td class="content-block powered-by">
                    Powered by <a href="http://pelitacipta.com">Pelita Cipta Informatika</a>.
                  </td>
                </tr>
              </table>
            </div>
            <!-- END FOOTER -->

          <!-- END CENTERED WHITE CONTAINER -->
          </div>
        </td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </body>
</html>
EOT;
				$email->save();
				if(!empty($email->to)){
					$toEmail = $model->email;
					// $enc_id = $this->encryptor('encrypt', $model->id);
					// $url = Yii::$app->params['domain'].Url::to(['/site/activate_pencaker/','token'=>$enc_id]);
					Yii::$app->mailer->compose()
					->setTo($toEmail)
					->setFrom([Yii::$app->params['adminEmail']])
					->setSubject($email->title)
					->setHtmlBody($email->content);
					// ->send();
				}
				//email ke perusahaan
				$email = new Email();
				$perusahaan_id = Sip::findOne($lowongan_id)->perusahaan_id;
				$email->to = Perusahaan::findOne($perusahaan_id)->email;
				$email->from = Yii::$app->params['adminEmail'];
				$email->title = 'Identitas Pendaftar Calon PMI Pekerja Migran Indonesia';
				$email->kat_email = 1;

$email->content = <<<EOT
<!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Simple Transactional Email</title>
    <style>
      /* -------------------------------------
          GLOBAL RESETS
      ------------------------------------- */
      img {
        border: none;
        -ms-interpolation-mode: bicubic;
        max-width: 100%; }

      body {
        background-color: #f6f6f6;
        font-family: sans-serif;
        -webkit-font-smoothing: antialiased;
        font-size: 14px;
        line-height: 1.4;
        margin: 0;
        padding: 0;
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%; }

      table {
        border-collapse: separate;
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
        width: 100%; }
        table td {
          font-family: sans-serif;
          font-size: 14px;
          vertical-align: top; }

      /* -------------------------------------
          BODY & CONTAINER
      ------------------------------------- */

      .body {
        background-color: #f6f6f6;
        width: 100%; }

      /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
      .container {
        display: block;
        Margin: 0 auto !important;
        /* makes it centered */
        max-width: 580px;
        padding: 10px;
        width: 580px; }

      /* This should also be a block element, so that it will fill 100% of the .container */
      .content {
        box-sizing: border-box;
        display: block;
        Margin: 0 auto;
        max-width: 580px;
        padding: 10px; }

      /* -------------------------------------
          HEADER, FOOTER, MAIN
      ------------------------------------- */
      .main {
        background: #ffffff;
        border-radius: 3px;
        width: 100%; }

      .wrapper {
        box-sizing: border-box;
        padding: 20px; }

      .content-block {
        padding-bottom: 10px;
        padding-top: 10px;
      }

      .footer {
        clear: both;
        Margin-top: 10px;
        text-align: center;
        width: 100%; }
        .footer td,
        .footer p,
        .footer span,
        .footer a {
          color: #999999;
          font-size: 12px;
          text-align: center; }

      /* -------------------------------------
          TYPOGRAPHY
      ------------------------------------- */
      h1,
      h2,
      h3,
      h4 {
        color: #000000;
        font-family: sans-serif;
        font-weight: 400;
        line-height: 1.4;
        margin: 0;
        Margin-bottom: 30px; }

      h1 {
        font-size: 35px;
        font-weight: 300;
        text-align: center;
        text-transform: capitalize; }

      p,
      ul,
      ol {
        font-family: sans-serif;
        font-size: 14px;
        font-weight: normal;
        margin: 0;
        Margin-bottom: 15px; }
        p li,
        ul li,
        ol li {
          list-style-position: inside;
          margin-left: 5px; }

      a {
        color: #3498db;
        text-decoration: underline; }

      /* -------------------------------------
          BUTTONS
      ------------------------------------- */
      .btn {
        box-sizing: border-box;
        width: 100%; }
        .btn > tbody > tr > td {
          padding-bottom: 15px; }
        .btn table {
          width: auto; }
        .btn table td {
          background-color: #ffffff;
          border-radius: 5px;
          text-align: center; }
        .btn a {
          background-color: #ffffff;
          border: solid 1px #3498db;
          border-radius: 5px;
          box-sizing: border-box;
          color: #3498db;
          cursor: pointer;
          display: inline-block;
          font-size: 14px;
          font-weight: bold;
          margin: 0;
          padding: 12px 25px;
          text-decoration: none;
          text-transform: capitalize; }

      .btn-primary table td {
        background-color: #3498db; }

      .btn-primary a {
        background-color: #3498db;
        border-color: #3498db;
        color: #ffffff; }

      /* -------------------------------------
          OTHER STYLES THAT MIGHT BE USEFUL
      ------------------------------------- */
      .last {
        margin-bottom: 0; }

      .first {
        margin-top: 0; }

      .align-center {
        text-align: center; }

      .align-right {
        text-align: right; }

      .align-left {
        text-align: left; }

      .clear {
        clear: both; }

      .mt0 {
        margin-top: 0; }

      .mb0 {
        margin-bottom: 0; }

      .preheader {
        color: transparent;
        display: none;
        height: 0;
        max-height: 0;
        max-width: 0;
        opacity: 0;
        overflow: hidden;
        mso-hide: all;
        visibility: hidden;
        width: 0; }

      .powered-by a {
        text-decoration: none; }

      hr {
        border: 0;
        border-bottom: 1px solid #f6f6f6;
        Margin: 20px 0; }

      /* -------------------------------------
          RESPONSIVE AND MOBILE FRIENDLY STYLES
      ------------------------------------- */
      @media only screen and (max-width: 620px) {
        table[class=body] h1 {
          font-size: 28px !important;
          margin-bottom: 10px !important; }
        table[class=body] p,
        table[class=body] ul,
        table[class=body] ol,
        table[class=body] td,
        table[class=body] span,
        table[class=body] a {
          font-size: 16px !important; }
        table[class=body] .wrapper,
        table[class=body] .article {
          padding: 10px !important; }
        table[class=body] .content {
          padding: 0 !important; }
        table[class=body] .container {
          padding: 0 !important;
          width: 100% !important; }
        table[class=body] .main {
          border-left-width: 0 !important;
          border-radius: 0 !important;
          border-right-width: 0 !important; }
        table[class=body] .btn table {
          width: 100% !important; }
        table[class=body] .btn a {
          width: 100% !important; }
        table[class=body] .img-responsive {
          height: auto !important;
          max-width: 100% !important;
          width: auto !important; }}

      /* -------------------------------------
          PRESERVE THESE STYLES IN THE HEAD
      ------------------------------------- */
      @media all {
        .ExternalClass {
          width: 100%; }
        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
          line-height: 100%; }
        .apple-link a {
          color: inherit !important;
          font-family: inherit !important;
          font-size: inherit !important;
          font-weight: inherit !important;
          line-height: inherit !important;
          text-decoration: none !important; }
        .btn-primary table td:hover {
          background-color: #34495e !important; }
        .btn-primary a:hover {
          background-color: #34495e !important;
          border-color: #34495e !important; } }

    </style>
  </head>
  <body class="">
    <table border="0" cellpadding="0" cellspacing="0" class="body">
      <tr>
        <td>&nbsp;</td>
        <td class="container">
          <div class="content">

            <!-- START CENTERED WHITE CONTAINER -->
            <span class="preheader">Dinas Tenaga Kerja Provinsi Jawa Timur</span>
            <table class="main">

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper">
                  <table border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>
                        <p>Pendaftaran PMI,</p>
                        <p>P3MI Yang Terhormat.</p>
                        <p>Berikut ini kami kirimkan identitas Calon PMI (Pekerja Migran Indonesia), yang berminat dengan lowongan Berikut : .</p>
                        <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                          <tbody>
                            <tr>                                      <td> <a href="http://ptsp.infokerja-jatim.com/site/lowongan-luar-negeri-detail?id={$lowongan_id}" target="_blank">Lowongan yang Diminati PMI</a> </td>

                              <td align="left">
                                <table border="0" cellpadding="0" cellspacing="0">
                                  <tbody>
                                    <tr>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
												<p>Berikut ini adalah identitas Calon PMI (Pekerja Migran Indonesia), yang berminat dengan lowongan anda.</p>
                        <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                          <tbody>
                            <tr>
                              <td align="left">
                                <table border="0" cellpadding="0" cellspacing="0">
                                  <tbody>
                                    <tr>
                                      <td> <a href="http://ptsp.infokerja-jatim.com/pencaker/view?id={$pencaker_id}" target="_blank">Identitas PMI</a> </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <p>Pastikan PMI dikirim melalui jalur "RESMI" untuk menjaga keselamatan PMI.</p>
                        <p>Terimakasih.</p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>

            <!-- START FOOTER -->
            <div class="footer">
              <table border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td class="content-block powered-by">
                    Dikirim Oleh <a href="http://ptsp.infokerja-jatim.com">PTSP Dinas Tenaga Kerja Provinsi Jawa Timur</a>.
                  </td>
                </tr>
                <tr>
                  <td class="content-block powered-by">
                    Powered by <a href="http://pelitacipta.com">Pelita Cipta Informatika</a>.
                  </td>
                </tr>
              </table>
            </div>
            <!-- END FOOTER -->

          <!-- END CENTERED WHITE CONTAINER -->
          </div>
        </td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </body>
</html>
EOT;
				
				$email->save();
				if(!empty($email->to)){
					$toEmail = $model->email;
					// $enc_id = $this->encryptor('encrypt', $model->id);
					// $url = Yii::$app->params['domain'].Url::to(['/site/activate_pencaker/','token'=>$enc_id]);
					Yii::$app->mailer->compose()
					->setTo($toEmail)
					->setFrom([Yii::$app->params['adminEmail']])
					->setSubject($email->title)
					->setHtmlBody($email->content)
					->send();
				}
			 return $this->redirect(['view','id'=>$model->id]);
             }else{
                 Yii::$app->getSession()->setFlash('error','Data not saved!');
                 return $this->render('create', [
                       'model' => $model,
                       // 'pendidikan' => $pendidikan,
                 ]);
             }
        }catch(Exception $e){
            Yii::$app->getSession()->setFlash('error',"{$e->getMessage()}");
        }
      } else {
          return $this->render('create', [
              'model' => $model,
              // 'pendidikan' => $pendidikan,
						]);
      }
    
    }

    /**
     * Updates an existing IpkPencaker model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $session = Yii::$app->session;
        $id = $session['user']['id'];
        $model = $this->findModel($id);
        $model_old = $this->findModel($id);
        $model_pendidikan = new IpkPendidikan;
        $model_pendidikan->pencaker_id = $session['user']['id'];
        $searchModel = new IpkPendidikanSearch();
        $searchModel->pencaker_id = $session['user']['id'];
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //untuk menyimpan sertifiksi pada tabel kursus
        $model_sertifikasi = new IpkKursus;
        $model_sertifikasi->pencaker_id = $session['user']['id'];
        $searchModel_sertifikasi = new IpkKursusSearch();
        $searchModel_sertifikasi->pencaker_id = $session['user']['id'];
        $dataProvider_sertifikasi = $searchModel_sertifikasi->search(Yii::$app->request->queryParams);

        $user = IpkPencaker::findOne(['id'=>$session['user']['id']]);
        $user->tgl_update = date("Y-m-d H:i:s");
        $user->save();

        // $pendidikan = new IpkPendidikan();
        if ($model_pendidikan->load(Yii::$app->request->post())&& $model_pendidikan->save()){
          // print_r($model_pendidikan);
          // ;
          return $this->redirect(['update','id'=>$session['user']['id'],'#'=>'tab2']);
        }
        if ($model_sertifikasi->load(Yii::$app->request->post())&& $model_sertifikasi->save()){
          // print_r($model_pendidikan);
          // ;
          return $this->redirect(['update','id'=>$session['user']['id'],'#'=>'tab3']);
        }
        if ($model->load(Yii::$app->request->post())) {
          try{
						$file_name = $id;
						if (!empty(UploadedFile::getInstance($model, 'foto'))) {
							$xFile1 = UploadedFile::getInstance($model, 'foto');
							$model->foto = $file_name.'-foto'.'.'.$xFile1->extension;
						}else{
							$model->foto = $model_old->foto;
						}
						if (!empty(UploadedFile::getInstance($model, 'curiculum_viteae'))) {
							$xFile2 = UploadedFile::getInstance($model, 'curiculum_viteae');
							$model->curiculum_viteae = $file_name.'-cv'.'.'.$xFile2->extension;
						}else{
							$model->curiculum_viteae = $model_old->curiculum_viteae;
						}
						if (!empty(UploadedFile::getInstance($model, 'lampiran'))) {
							$xFile3 = UploadedFile::getInstance($model, 'lampiran');
							$model->lampiran = $file_name.'-lampiran'.'.'.$xFile3->extension;
						}else{
							$model->lampiran = $model_old->lampiran;
						}
             if($model->save()){
                if (!empty(UploadedFile::getInstance($model, 'foto')))
									$xFile1->saveAs(Yii::getAlias('@webroot').'/web/files/foto/' . $file_name.'-foto'.'.'.$xFile1->extension);
                if (!empty(UploadedFile::getInstance($model, 'curiculum_viteae')))
									$xFile2->saveAs(Yii::getAlias('@webroot').'/web/files/foto/' . $file_name.'-cv'.'.'.$xFile2->extension);
                if (!empty(UploadedFile::getInstance($model, 'lampiran')))
									$xFile3->saveAs(Yii::getAlias('@webroot').'/web/files/foto/' . $file_name.'-lampiran'.'.'.$xFile3->extension);
                 Yii::$app->getSession()->setFlash('success','Data saved!');
                 return $this->redirect(['view','id'=>$model->id]);
             }else{
                 Yii::$app->getSession()->setFlash('error','Data not saved!');
                 return $this->render('create', [
                    'model' => $model,
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'model_pendidikan' => $model_pendidikan,
                    // 'pendidikan' => $pendidikan,
                ]);
             }
          }catch(Exception $e){
              Yii::$app->getSession()->setFlash('error',"{$e->getMessage()}");
							print_r($e->getMessage());
          }
        } else {
            return $this->render('update', [
                'model' => $model,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'model_pendidikan' => $model_pendidikan,
                'searchModel_sertifikasi' => $searchModel_sertifikasi,
                'dataProvider_sertifikasi' => $dataProvider_sertifikasi,
                'model_sertifikasi' => $model_sertifikasi,
                // 'pendidikan' => $pendidikan,
            ]);
        }
    }

    /**
     * Deletes an existing IpkPencaker model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     delete pendidikan
     */
    public function actionDelete($id)
    {
        $session = Yii::$app->session;
        $id = $session['user']['id'];
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    public function actionDelete_pendidikan($id)
    {
        $model = IpkPendidikan::findOne($id)->delete();
        $session = Yii::$app->session;
        $pencaker_id = $session['user']['id'];
        return $this->redirect(['update','id'=>$pencaker_id,'#'=>'tab2']);
    }
    public function actionDelete_sertifikasi($id)
    {
        $model = IpkKursus::findOne($id)->delete();
        $session = Yii::$app->session;
        $pencaker_id = $session['user']['id'];
        return $this->redirect(['update','id'=>$pencaker_id,'#'=>'tab3']);
    }

    /**
     * Finds the IpkPencaker model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return IpkPencaker the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = IpkPencaker::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionPendidikan_sub1($id=0) //ajax sub pendidikan
    {
      $pendidikan= IpkJenispddk::find()->where(['kode_parent' => $id])->all();
      $listPendidikan=ArrayHelper::map($pendidikan,'kode','nama');
      echo Html::dropDownList('IpkPencaker[pddk_jenis]','',$listPendidikan,['id'=>'cb_pendidikan_sub1','prompt'=>'Pilih', 'class'=>'form-control', 'onChange'=>'
              $.get("'.Url::to(['pendidikan_sub2']).'?id="+$(this).val(), function(data, status){
                if(status == "success"){
                  $("#ajx_subpendidikan").html(data);
                }
              });
            ']);
      // echo $id;
    }    
    public function actionPendidikan_sub2($id=0) //ajax sub pendidikan
    {
      $pendidikan= IpkJenispddk::find()->where(['kode_parent' => $id])->all();
      $listPendidikan=ArrayHelper::map($pendidikan,'kode','nama');
      echo Html::dropDownList('IpkPencaker[pddk_jurusan]','',$listPendidikan,['id'=>'cb_pendidikan_sub1','prompt'=>'Pilih', 'class'=>'form-control']);
      // echo $id;
    }    
    public function actionKabupaten($id=0) //ajax sub pendidikan
    {
      $usaha= IpkKabupaten::find()->where(['provinsi_id' => $id])->all();
      $listUsaha=ArrayHelper::map($usaha,'id','nama');
      echo Html::dropDownList('IpkPencaker[kabupaten_id]','',$listUsaha,['prompt'=>'Kabupaten', 'class'=>'form-control', 'onChange'=>'
              $.get("'.Url::to(['pencaker/kecamatan','id'=>'']).'"+$(this).val(), function(data, status){
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
      echo Html::dropDownList('IpkPencaker[kecamatan_id]','',$listUsaha,['prompt'=>'Kecamatan', 'class'=>'form-control']);
      // echo $id;
    }
    public function actionJabatan_sub1($id=0) //ajax sub pendidikan
    {
      $jabatan= IpkJabatanKelompok::find()->where(['ipk_jabatan_pokok_id' => $id])->all();
      $listJabatan=ArrayHelper::map($jabatan,'kode','nama');
      echo Html::dropDownList('IpkPencaker[jabatan_kelompok]','',$listJabatan,['id'=>'cb_jabatan_sub1','prompt'=>'Pilih', 'class'=>'form-control']);
      // echo $id;
    }    
    protected function encryptor($action, $string) {
        $output = false;

        $encrypt_method = "AES-256-CBC";
        //pls set your unique hashing key
        $secret_key = 'R352_^&*H4cK';
        $secret_iv = 'R352_^&*H4cK4=3v#r';

        // hash
        $key = hash('sha256', $secret_key);
        
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        //do the encyption given text/string/number
        if( $action == 'encrypt' ) {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        }
        else if( $action == 'decrypt' ){
          //decrypt the given text/string/number
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }

        return $output;
    }    
    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
}
