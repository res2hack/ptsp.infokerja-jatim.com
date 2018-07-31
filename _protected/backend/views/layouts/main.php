<?php
use backend\assets\AppAsset;
use frontend\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use kartik\dropdown\DropdownX;
/* @var $this \yii\web\View */
/* @var $content string */

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
<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => Yii::t('app', Yii::$app->name),
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-default navbar-fixed-top',
                ],
            ]);

            // display Account and Users to admin+ roles
            if (Yii::$app->user->can('admin'))
            {
                $menuItems[] = ['label' => Yii::t('app', 'Home'), 'url' => ['/site/index']];
                $menuItems[] = ['label' => Yii::t('app', 'MENU LTSA'), 'items' => [
										['label' => 'SPR', 'icon' => 'file-code-o', 'url' => ['/sip'],],
										['label' => 'Perusahaan', 'icon' => 'dashboard', 'url' => ['/perusahaan'],],
										['label' => 'Direktori Disnaker', 'icon' => 'dashboard', 'url' => ['/direktori-disnaker'],],
										['label' => 'Direktori P3MI', 'icon' => 'dashboard', 'url' => ['/direktori-p3mi'],],
										['label' => 'Direktori BLK', 'icon' => 'dashboard', 'url' => ['/direktori-blk'],],
										['label' => 'Ayo ke PTSP', 'icon' => 'dashboard', 'url' => ['/ayo-ke-ptsp/update'],],
										['label' => 'Pro Empowerment', 'icon' => 'dashboard', 'url' => ['/prodesmigratif/update'],],
										['label' => 'Pengumuman', 'icon' => 'dashboard', 'url' => ['/berita'],],
										['label' => 'Daftar Jadi PMI', 'icon' => 'dashboard', 'url' => ['/daftar-jadi-pmi/update'],],
										['label' => 'Info KBRI', 'icon' => 'dashboard', 'url' => ['/direktori-kbri'],],
										['label' => 'Syarat Jadi PMI', 'icon' => 'dashboard', 'url' => ['/syarat-jadi-pmi/update'],],
										['label' => 'Konsultasi', 'icon' => 'dashboard', 'url' => ['/konsultasi'],],
										['label' => 'Info LSP', 'icon' => 'dashboard', 'url' => ['/direktori-lsp'],],
										['label' => 'Skema Kerja PMI', 'icon' => 'dashboard', 'url' => ['/skema-kerja-pmi/update'],],
										['label' => 'Asuransi', 'icon' => 'dashboard', 'url' => ['/asuransi/update'],],
										['label' => 'Game & Video', 'icon' => 'dashboard', 'url' => ['/game/update'],],
										['label' => 'Info Text', 'icon' => 'dashboard', 'url' => ['/textinfo'],],
										['label' => 'Negara Tujuan', 'icon' => 'dashboard', 'url' => ['/negara_tujuan'],],
                    // ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Logout', 'url' => ['/site/logout'], 'data-method'=>'post'],								]];
                $menuItems[] = ['label' => Yii::t('app', 'Users'), 'url' => ['/user/index']];
            }
            
            // display Login page to guests of the site
            if (Yii::$app->user->isGuest) 
            {
                $menuItems[] = ['label' => Yii::t('app', 'Login'), 'url' => ['/site/login']];
            }
            // display Logout to all logged in users
            else 
            {
                $menuItems[] = [
                    'label' => Yii::t('app', 'Logout'). ' (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
            }

            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            
            NavBar::end();
        ?>

        <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
        <p class="pull-left">&copy; <?= Yii::t('app', Yii::$app->name) ?> <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
