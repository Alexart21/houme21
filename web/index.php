<?php
/*header('HTTP/1.1 503 Service Temporarily Unavailable');
header('Retry-After: 3600');
$content = '<h1>К сожалению сайт временно недоступен</h1>
            <h2>Попробуйте зайти позднее</h2>?';
require __DIR__.'/../views/layouts/closed.php';
die;*/

// comment out the following two lines when deployed to production
 defined('YII_DEBUG') or define('YII_DEBUG', true);
 defined('YIIV') or define('YII_ENV', 'dev');

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/../config/web.php');

/* Минификатор для админки выключаем (дает баги) */
/*if ( strpos($_SERVER['REQUEST_URI'], 'admin') ) {
    $config['components']['view']['enableMinify'] = false;
}*/

require __DIR__ . '/../functions.php'; // отсебятина
(new yii\web\Application($config))->run();
