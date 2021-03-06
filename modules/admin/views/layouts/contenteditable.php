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
    <!--LOADER-->
    <div id="loader">
        <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             x="0px" y="0px"
             width="70px" height="70px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;"
             xml:space="preserve">
  <path fill="#e61b05"
        d="M43.935,25.145c0-10.318-8.364-18.683-18.683-18.683c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615c8.072,0,14.615,6.543,14.615,14.615H43.935z">
      <animateTransform attributeType="xml"
                        attributeName="transform"
                        type="rotate"
                        from="0 25 25"
                        to="360 25 25"
                        dur="0.6s"
                        repeatCount="indefinite"/>
  </path>
  </svg>
    </div>
    <!---->
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
    <script src="/js/admin_script.js"></script>
    </body>
    </html>
<?php $this->endPage() ?>