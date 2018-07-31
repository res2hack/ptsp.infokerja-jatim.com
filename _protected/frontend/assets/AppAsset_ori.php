<?php
/**
 * -----------------------------------------------------------------------------
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 * -----------------------------------------------------------------------------
 */

namespace frontend\assets;

use yii\web\AssetBundle;
use Yii;

// set @themes alias so we do not have to update baseUrl every time we change themes
Yii::setAlias('@themes', Yii::$app->view->theme->baseUrl);

/**
 * -----------------------------------------------------------------------------
 * @author Qiang Xue <qiang.xue@gmail.com>
 *
 * @since 2.0
 * -----------------------------------------------------------------------------
 */


class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@themes';
    
    public $css = [
				// 'css/site.css',
				'app-assets/images/ico/apple-icon-120.png',
				'app-assets/images/ico/favicon.ico',
				'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700',
				'https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css',
        'app-assets/css/vendors.css',
				'app-assets/css/app.css',
				'app-assets/css/core/menu/menu-types/horizontal-menu.css',
				'app-assets/css/core/colors/palette-gradient.css',
				'app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css',
				'app-assets/vendors/css/charts/morris.css',
				'app-assets/fonts/simple-line-icons/style.css',
				'app-assets/css/core/colors/palette-gradient.css',
				'assets/css/style.css',
    ];
    public $js = [
			'app-assets/vendors/js/vendors.min.js',
			'app-assets/vendors/js/ui/jquery.sticky.js',
			'app-assets/vendors/js/charts/jquery.sparkline.min.js',
			'app-assets/vendors/js/charts/chart.min.js',
			'app-assets/vendors/js/charts/raphael-min.js',
			'app-assets/vendors/js/charts/morris.min.js',
			'app-assets/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js',
			'app-assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js',
			'app-assets/data/jvector/visitor-data.js',
			'app-assets/js/core/app-menu.js',
			'app-assets/js/core/app.js',
			'app-assets/js/scripts/customizer.js',
			'app-assets/js/scripts/ui/breadcrumbs-with-stats.js',
			'app-assets/js/scripts/pages/dashboard-sales.js',
    ];
    
    public $depends = [
        // 'yii\web\YiiAsset',
    ];
}

