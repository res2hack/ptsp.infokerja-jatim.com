<?php
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */
// Yii::setAlias('@themes', Yii::$app->view->theme->baseUrl);
$themes = Yii::$app->view->theme->baseUrl;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="horizontal-layout horizontal-menu 2-columns   menu-expanded" data-open="hover"
data-menu="horizontal-menu" data-col="2-columns">
    <?php $this->beginBody() ?>
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow navbar-static-top navbar-light navbar-brand-center">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item">
            <a class="navbar-brand" href="<?=Yii::$app->homeUrl;?>">
              <img class="brand-logo" alt="modern admin logo" src="<?=$themes;?>/app-assets/images/logo/prokerja_logo.png">
              <h3 class="brand-text">prokerja.com</h3>
            </a>
          </li>
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
          </li>
        </ul>
      </div>
      <div class="navbar-container content">
        <div class="collapse navbar-collapse" id="navbar-mobile">
          <ul class="nav navbar-nav mr-auto float-left">
            <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
            <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
            
          
          </ul>
          <ul class="nav navbar-nav float-right">
                  <span class="user-name text-bold-700" style="">21 JUNI 2018</span>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-dark navbar-without-dd-arrow navbar-shadow"
  role="navigation" data-menu="menu-wrapper">
    <div class="navbar-container main-menu-content" data-menu="menu-container">
      <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
        <li class="nav-item">
          <a class="dropdown-toggle nav-link" href="index.html" data-toggle="dropdown"><i class="la la-home"></i>
            <span>Home</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="dropdown-toggle nav-link" href="index.html" data-toggle="dropdown"><i class="la la-home"></i>
            <span>Home</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
	<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <!-- content -->
          <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
							<?= Breadcrumbs::widget([
									'itemTemplate' => "<li class=\"breadcrumb-item\">{link}</li>\n",
									'activeItemTemplate' => "<li class=\"breadcrumb-item\" \"active\">{link}</li>\n",
									'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
							]) ?>
            </div>
          </div>
					<?= Alert::widget() ?>
				 <?= $content ?>
        <!-- content -->
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
	<div class="wrap">
        <?php
				
            // NavBar::begin([
                // 'brandLabel' => Yii::t('app', Yii::$app->name),
                // 'brandUrl' => Yii::$app->homeUrl,
                // 'options' => [
                    // 'class' => 'navbar-default navbar-fixed-top',
                // ],
            // ]);

            // everyone can see Home page
            // $menuItems[] = ['label' => Yii::t('app', 'Home'), 'url' => ['/site/index']];

            // we do not need to display Article/index, About and Contact pages to editor+ roles
            // if (!Yii::$app->user->can('editor')) 
            // {
                // $menuItems[] = ['label' => Yii::t('app', 'Articles'), 'url' => ['/article/index']];
                // $menuItems[] = ['label' => Yii::t('app', 'About'), 'url' => ['/site/about']];
                // $menuItems[] = ['label' => Yii::t('app', 'Contact'), 'url' => ['/site/contact']];
            // }

            // display Article admin page to editor+ roles
            // if (Yii::$app->user->can('editor'))
            // {
                // $menuItems[] = ['label' => Yii::t('app', 'Articles'), 'url' => ['/article/admin']];
            // }            
            
            // display Signup and Login pages to guests of the site
            // if (Yii::$app->user->isGuest) 
            // {
                // $menuItems[] = ['label' => Yii::t('app', 'Signup'), 'url' => ['/site/signup']];
                // $menuItems[] = ['label' => Yii::t('app', 'Login'), 'url' => ['/site/login']];
            // }
            // display Logout to all logged in users
            // else 
            // {
                // $menuItems[] = [
                    // 'label' => Yii::t('app', 'Logout'). ' (' . Yii::$app->user->identity->username . ')',
                    // 'url' => ['/site/logout'],
                    // 'linkOptions' => ['data-method' => 'post']
                // ];
            // }
           
            // echo Nav::widget([
                // 'options' => ['class' => 'navbar-nav navbar-right'],
                // 'items' => $menuItems,
            // ]);
            // NavBar::end();
        ?>

        <div class="container">
        
        
        </div>
    </div>
  <footer class="footer footer-static footer-light navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; <?= Yii::t('app', Yii::$app->name) ?><?= date('Y') ?> <a class="text-bold-800 grey darken-2" href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent"
        target="_blank">PIXINVENT </a>, All rights reserved. </span>
      <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span>
    </p>
  </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
