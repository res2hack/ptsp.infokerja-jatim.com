<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;
use Yii;

Yii::setAlias('@themes', Yii::$app->view->theme->baseUrl);

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@themes';
    public $css = [
				"css/bootstrap.css",
        "css/reset.css",
        "css/main-stylesheet.css",
        "css/shortcode.css",
        "css/fonts.css",
        // "css/jsCarousel-2.0.0.css",
        "css/colors.css",
        "css/restu.css",
        'css/site.css',
        // 'css/zebra_dialog.css',
    ];
    public $js = [
        // "js/header_slider.js",
        // "js/zebra_dialog.js",
        // "js/main_slider.js",
        // "js/jssor.js",
        // "js/jsCarousel-2.0.0.js",
        // "js/jssor.slider.js",
        "js/jssor.slider-26.5.2.min.js",
        "js/new_home_slider.js",
        "js/theme-scripts.js",
				'js/bootstrap.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
