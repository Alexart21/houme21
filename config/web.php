<?php
/* Критичные данные не сливаем на GitHub храним отдельно !!! */
$my_config = parse_ini_file(__DIR__ . '/../../secret_houme21/config.ini');
if(!$my_config){
    die('Не найден файл ' . __DIR__ . '/../../secret_houme21/config.ini');
}
$params = require(__DIR__ . '/params.php');

/* Сливаем секреты с обычными данными */
/* В этом файле доступ к секретам через $my_config[]
    в других частях приложения через Yii::$app->params
 */
$params = array_merge($params, $my_config);
//var_dump($my_config);die;
$config = [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    /* Сайт на техобслуживании */
    /*'catchAll' => [
        'test/closed'
    ],*/
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
//    'bootstrap' => ['log'],
    'language' => 'ru',
    'modules' => [
        'admin' => [ // подключаем модуль админки
            'class' => 'app\modules\admin\Module',
            'layout' => 'admin'
        ],
        'debug' => [
            'class' => 'yii\debug\Module',
            'allowedIPs' => ['127.0.0.1', '::1']
        ],
        'yii2images' => [
            'class' => 'rico\yii2images\Module',
            //be sure, that permissions ok
            //if you cant avoid permission errors you have to create "images" folder in web root manually and set 777 permissions
            'imagesStorePath' => 'upload/original_img', //path to origin images
            'imagesCachePath' => 'upload/resize_img', //path to resized copies
            'graphicsLibrary' => 'GD', //but really its better to use 'Imagick'
            'placeHolderPath' => '@webroot/upload/store/no-image.png', // if you want to get placeholder when image not exists, string will be processed by Yii::getAlias
        ],
    ],
    'components' => [
        'view' => [
            'class' => '\rmrevin\yii\minify\View',
            'enableMinify' => !YII_DEBUG,
            'concatCss' => true, // concatenate css
            'minifyCss' => true, // minificate css
            'concatJs' => true, // concatenate js
            'minifyJs' => true, // minificate js
            'minifyOutput' => true, // minificate result html page
            'webPath' => '@web', // path alias to web base
            'basePath' => '@webroot', // path alias to web base
            'minifyPath' => '@webroot/minify', // path alias to save minify result
            'jsPosition' => [\yii\web\View::POS_END], // positions of js files to be minified
            'forceCharset' => 'UTF-8', // charset forcibly assign, otherwise will use all of the files found charset
            'expandImports' => true, // whether to change @import on content
            'compressOptions' => ['extra' => true], // options for compress
            'excludeFiles' => [
                'jquery.js', // exclude this file from minification
                'bootstrap.css', // exclude this file from minification
            ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'dfghdhdh2353w46tvw354645',
            'baseUrl' => '', // для чпу надо
        ],
        /* Redis кэш */
        /*'cache' => [
            'class' => 'yii\redis\Cache',
            'redis' => [
                'hostname' => 'localhost',
                'port' => 6379,
                'database' => 0,
            ]
        ],
        'session' => [
            'class' => 'yii\redis\Session',
            'redis' => [
                'hostname' => 'localhost',
                'port' => 6379,
                'database' => 0,
            ]
        ],*/
        /* Файловый кэш */
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
//            'loginUrl' => '/'
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true, // локалка
//            'useFileTransport' => false, // на боевом поставить false
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'mail.houme21.ru',
                'username' => 'mail@houme21.ru',
                'password' => '',
//                'port' => '587',
                'port' => '465',
                'encryption' => 'ssl',
            ],
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
        'db' => require(__DIR__ . '/db.php'),

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
//                '<action:(contact|login|logout|portfolio|designer)>' => 'site/<action>',
                '<action:(index|contact|login|logout|call)>' => 'site/<action>',
//                '<controller:(site|galery|test)>/<action:\w+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
        ],

        'reCaptcha' => [
            'class' => 'himiklab\yii2\recaptcha\ReCaptchaConfig',
            'siteKeyV2' => $my_config['siteKeyV2'],
            'secretV2' => $my_config['secretV2'],
            /*'siteKeyV3' => 'xxxxxx',
            'secretV3' => 'xxxxxx',*/
        ],

    ],
    'controllerMap' => [
        'elfinder' => [
            'class' => 'mihaildev\elfinder\PathController',
            'access' => ['@'],
            'root' => [
                'baseUrl'=>'/web',
                'basePath'=>'@webroot',
                'path' => 'upload/global',
                'name' => 'Global'
            ],
        ]
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
//        'allowedIPs' => ['127.0.0.1'] // adjust this to your needs
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
//        'allowedIPs' => ['127.0.0.1'] // adjust this to your needs
    ];
}

return $config;
