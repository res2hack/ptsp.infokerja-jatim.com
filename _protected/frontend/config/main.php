<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
						'rules' => [
              'article' => 'article/index',
              'article/index' => 'article/index',
              'article/create' => 'article/create',
              'article/view/<id:\d+>' => 'article/view',  
              'article/update/<id:\d+>' => 'article/update',  
              'article/delete/<id:\d+>' => 'article/delete',  
              'article/<slug>' => 'article/slug',
              'lowongan/<slug>' => 'article/slug',
							'defaultRoute' => '/site/index',
							// 'lowongan/'=> 'article/',
							// 'article/<slug>' => 'article/slug',
            ],
        ],
        // here you can set theme used for your frontend application 
        // - template comes with: 'default', 'slate', 'spacelab' and 'cerulean'
        'view' => [
            'theme' => [
                'pathMap' => ['@app/views' => '@webroot/themes/ptsp/views'],
                'baseUrl' => '@web/themes/ptsp',
            ],
        ],
        'user' => [
            'identityClass' => 'common\models\UserIdentity',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'params' => $params,
];
