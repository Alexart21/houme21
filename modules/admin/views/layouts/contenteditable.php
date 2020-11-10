<?php

use yii\helpers\Html;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use yii\widgets\Breadcrumbs;

?>
<?php $this->beginPage() ?>
    <!doctype html>
    <html lang="Ru-ru">
    <head>
        <meta charset="UTF-8">
        <link href="/css/site.css" rel="stylesheet">
        <link href="/css/admin_style.css" rel="stylesheet">
        <script src="/js/jquery-1.11.2.min.js"></script>
        <script src="/js/admin_script.js"></script>
        <style>
            .navbar-inverse{
                height: 50px !important;
            }

        </style>
        <title></title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <?php
    NavBar::begin([
        'brandLabel' => 'Powered By Alexart21',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    ?>
    <?php if (strtolower(Yii::$app->user->identity->username) === Yii::$app->params['admin']){
        $_user = 'mihalych21<span style="text-shadow: none;text-transform: lowercase"> (администратор)</span>';
    }else{
        $_user = Yii::$app->user->identity->username . '<span style="text-shadow: none;text-transform: lowercase"> (модератор)</span>';
    }
    ?>
    <span class="user" style="color: #000;background: #fff;line-height: 50px;text-transform: uppercase;float: right;margin-left: 1em;padding: 0 1em"><?= $_user ?></span>
    <?php
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'на сайт', 'url' => ['/']],
            ['label' => 'главная', 'url' => ['/admin']],
            ['label' => 'выйти', 'url' => ['/site/logout']], // разлогиниваем админа
        ],
    ]);
    NavBar::end();
    ?>
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <br>
    <br>
    <br>
    <br>
    <br>
    <?= $content ?>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>