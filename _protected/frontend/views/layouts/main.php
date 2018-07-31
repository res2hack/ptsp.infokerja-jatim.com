<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\assets\AppAsset_home;
use frontend\widgets\Alert;
use yii\helpers\Url;
use yii\web\Session;

/* @var $this \yii\web\View */
/* @var $content string */

if(Yii::$app->controller->id.'/'.Yii::$app->controller->action->id=='site/index'){
  AppAsset_home::register($this);
}else{
  AppAsset::register($this);
}
?>
<?php  
  $baseUrl = Yii::getAlias('@web'); 
  
  $text_slider = (new \yii\db\Query())
    ->select('*')
    ->from('web_info')
    ->where(['sts_tampil'=>1])
		->orderBy('urutan ASC')
    ->all();
  $header = (new \yii\db\Query())
    ->select('*')
    ->from('header')
    ->orderBy('urutan ASC')
    ->where('sts_tampil=1')
    ->all();
  // $bursa = (new \yii\db\Query())
    // ->select('*')
    // ->from('mitra')
    // ->where('tampil=1 and kategori = "bursa"')
    // ->all();
  // $mitra = (new \yii\db\Query())
    // ->select('*')
    // ->from('mitra')
    // ->where('tampil=1 and kategori = "mitra"')
    // ->all();
    ?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
		<!--[if lte IE 8]>
		<link type="text/css" rel="stylesheet" href="css/ie-ancient.css" />
		<![endif]-->
</head>
<body>
    <?php $this->beginBody() ?>

		<!-- BEGIN .boxed -->
		<?php if (Yii::$app->session->hasFlash('success')): ?>
			<div style="position:fixed; z-index:99999; width:100%" class="alert alert-info alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<?= Yii::$app->session->getFlash('success') ?>
			</div>
		<?php endif; ?>
		<div class="boxed active">
    <div class="container-fluid">			
			<div class="row no-gutter">
      <div  class="col-xs-12">
			<!-- BEGIN .header -->
				<div class="header hidden-xs hidden-sm">
				<!-- BEGIN .wrapper -->
      <div id="jssor_header" style="position:relative;margin:0 auto;top:0px;left:0px;width:1220px;height:470px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssor-header-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1220px;height:470px;overflow:hidden;">
<?php
              foreach ($header as $list){
                echo "<div>";
                echo '<img data-u="image" src="/uploads/image/'.$list['gambar'].'" />';
                echo "</div>";
              }
?>
        </div>
    </div>
<div class="main-menu">
					
					<!-- BEGIN .wrapper -->
					<div class="wrapper">
					
						<ul class="the-menu right">

              
						</ul>
						<ul class="the-menu">
							<li><a href="<?php echo Url::to(['site/index']); ?>">BERANDA</a></li>
							<li><a href="<?php echo Url::to(['site/tentang-kami']); ?>">Tentang Kami</a></li>
							<li><a target="_blank" href="<?php echo Url::to('http://www.p3tki-jatim.go.id/portal'); ?>">Berita / Portal PTSP</a></li>
							<li style="float: right;margin-top: 15px;margin-right: 5px;"><b>*PMI</b> = Pekerja Migran Indonesia (TKI)</li>

            </ul>

					<!-- END .wrapper -->
					</div>
					<!--
					<div class="header-addons">
						<div class="header-search">
							<form action="#" method="get">
								<input type="text" placeholder="Cari Berita" value="" class="search-input" />
								<input type="submit" value="Search" class="search-button" />
							</form>
						</div>
					</div>
					 -->
				</div>				
			<!-- END .header -->
			</div>
			
			<!-- BEGIN .content -->
			<div class="content">
				
				<!-- BEGIN .wrapper -->
				<div class="wrapper">
					<div class="breaking-news">
						<span class="the-title">Info</span>
              <?php
              $text = '';
              foreach ($text_slider as $list){
                $text .= ' '.$list['isi'];
              }
              ?>
              <marquee style="font-weight: bold; font-size: large; font-family: sans-serif;width: 94%;padding-top: 5px;"><?php echo $text; ?></marquee>
					</div>

					<div class="main-content">
<!-- BEGIN .main-page -->
						<div class="main-page left" style="width:100%">

  <!-- BEGIN .double-block -->
  <div class="block">
    
    <!-- BEGIN .content-block -->
    <div class="content-block main right" style="width:100%">
        <?= Alert::widget() ?>
        <?= $content ?>

    </div>

        <!-- END .double-block -->
        </div>

						<!-- END .main-page -->
						</div>
						
						<!-- BEGIN .main-sidebar -->
						<div class="clear-float"></div>

					</div>
					
				<!-- END .wrapper -->
				</div>
				
			<!-- BEGIN .content -->
			</div>
			
			<!-- BEGIN .footer -->
			<div class="footer">
				
				<!-- BEGIN .wrapper -->
				<div class="">

					<ul style="margin-right:10px" class="right">
					<!-- Histats.com  (div with counter) --><div id="histats_counter"></div>
<!-- Histats.com  START  (aync)-->
<script type="text/javascript">var _Hasync= _Hasync|| [];
_Hasync.push(['Histats.start', '1,4046192,4,255,112,35,00010100']);
_Hasync.push(['Histats.fasi', '1']);
_Hasync.push(['Histats.track_hits', '']);
(function() {
var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
hs.src = ('//s10.histats.com/js15_as.js');
(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
})();</script>
<noscript><a href="/" target="_blank"><img  src="//sstatic1.histats.com/0.gif?4046192&101" alt="free hit counter script" border="0"></a></noscript>
<!-- Histats.com  END  -->
						<li><a href="<?php //echo Url::to(['/admin','id'=>$list['id']]); ?>">Admin</a></li>
					</ul>					
					<p style="margin-left:10px">&copy; 2018 Copyright <b>DISNAKERTRANS PROVINSI JAWA TIMUR</b>. All Rights reserved.<br/>Designed by <a href="http://pelitacipta.com/" target="_blank" class="">Pelita Cipta Informatika</a></p>
					
				<!-- END .wrapper -->
				</div>
				
			<!-- END .footer -->
			</div>
			
		<!-- END .boxed -->
		</div>    
		</div>    
		</div>    
		</div>    

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
