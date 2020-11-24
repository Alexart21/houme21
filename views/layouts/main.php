<?php

use app\assets\AppAsset;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

//use yii\widgets\Spaceless;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<?php //Spaceless::begin(); // удаляет пробелы между HTML тегами?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
        <?php $this->head() ?>
        <!-- Yandex.Metrika counter -->
        <!--<script type="text/javascript">
            !function (e, t, a) {
                (t[a] = t[a] || []).push(function () {
                    try {
                        t.yaCounter48601655 = new Ya.Metrika({
                            id: 48601655,
                            clickmap: !0,
                            trackLinks: !0,
                            accurateTrackBounce: !0
                        })
                    } catch (e) {
                    }
                });
                var c = e.getElementsByTagName("script")[0], n = e.createElement("script"), r = function () {
                    c.parentNode.insertBefore(n, c)
                };
                n.type = "text/javascript", n.async = !0, n.src = "https://mc.yandex.ru/metrika/watch.js", "[object Opera]" == t.opera ? e.addEventListener("DOMContentLoaded", r, !1) : r()
            }(document, window, "yandex_metrika_callbacks");
        </script>
        <noscript>
            <div><img src="https://mc.yandex.ru/watch/48601655" style="position:absolute; left:-9999px;" alt=""/></div>
        </noscript>-->
        <!-- /Yandex.Metrika counter -->
    </head>
    <body>
    <!--кнопка вверх-->
    <div id="scroller" class="fa fa-chevron-circle-up" title="вверх"></div>
    <!--/-->
    <!-- loader -->
    <div id="container_loading">
        <i class="fas fa-spinner fa-spin"></i>
    </div>
    <!-- end loader -->
    <?php $this->beginBody() ?>
    <!--    -->
    <!--<div class="pjax">
        <a href="/call" data-tooltip="Оставьте свой номер телефона и мы перезвоним Вам" data-placement="left"
           class="pjax"
           rel="nofollow" id="popup__toggle">
            <div class="circlephone" style="transform-origin: center;"></div>
            <div class="circle-fill" style="transform-origin: center;">
            </div>
            <div class="img-circle" style="transform-origin: center;">
                <div class="img-circleblock" style="transform-origin: center;"></div>
            </div>
        </a>
    </div>-->
    <!--    -->
    <div class="wrap container">
        <div class="site-main" id="sTop">
            <div class="site-header">
                <div class="main-header">
                    <div class="container">
                        <div id="menu-wrapper">
                            <div class="row">
                                <div class="info">
                                    <a class="tel-info" title="позвонить на номер" href="tel:+79603112322"
                                       rel="nofollow">
                                        <i class="fa fa-phone"></i>
                                        <span class="tel-number"> +7(960) 311-23-22</span>
                                    </a>&nbsp;&nbsp;
                                    <span class="pjax"><a class="mail-info" rel="nofollow" href="/contact"
                                                          title="написать письмо" rel="nofollow">
                                <i class="fa fa-envelope"></i>&nbsp;<b>
                                    <span class="mail-namber">mail@<?= Yii::$app->params['siteUrl'] ?></span></b>
                            </a>
                            </span>
                                </div>
                                <div class="studio">
                                    дизайн студия
                                </div>
                                <a href="/">
                                    <div class="logo-wrapper col-md-2 col-sm-2">
                                        <div>
                                            <?= Yii::$app->params['company'] ?>
                                        </div>
                                    </div> <!-- /.logo-wrapper -->
                                </a>
                                <div class="col-md-10 col-sm-10 main-menu text-right">
                                    <div class="toggle-menu visible-sm visible-xs drop-menu"><i class="fa fa-bars"></i>
                                    </div>
                                    <ul class="menu-first">
                                        <li><a class="link" href="/">Главная</a></li>
                                        <li class="dropdown">
                                            <a href="#portfolio" class="dropdown-toggle" data-toggle="dropdown">портфолио
                                                <b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li><a class="link2" href="/galery/exterieur">экстерьер</a></li>
                                                <li><a class="link2" href="/galery/interieur">интерьер</a></li>
                                                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"
                                                                        href="#">мебель <b class="caret"></b></a>
                                                    <ul class="dropdown-menu drop2">
                                                        <li><a class="link2" href="/galery/racks">гардеробные</a></li>
                                                        <li><a class="link2" href="/galery/kupe">шкафы купе</a></li>
                                                        <li><a class="link2" href="/galery/kitchen">кухни</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><span class="pjax"><a rel="nofollow" class="link"
                                                                  href="/contact">контакты</a></span></li>
                                    </ul>
                                </div> <!-- /.main-menu -->
                            </div> <!-- /.row -->
                        </div> <!-- /#menu-wrapper -->
                    </div> <!-- /.container -->
                </div> <!-- /.main-header -->
            </div> <!-- /.site-header -->
            <!-- content -->
        </div> <!-- /.site-main -->
        <?php Pjax::begin(
            [
                'clientOptions' => [
                    'method' => 'GET',
                    'data-pjax-container' => '#mail_box',
                ],
                'enablePushState' => false, // не обновлять url
                'linkSelector' => '.pjax a', //обрабатывать через pjax только отдельные ссылки
                'timeout' => '20000',
            ]);
        ?>
        <output id="mail_box"></output>
        <?php Pjax::end(); ?>
        <main class="container">
            <?= $content ?>
        </main>
        <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-xs-12 text-left">
                    <span class="copy">Copyright &copy; 2014&mdash;<?= date('Y') ?> <i>дизайн студия</i> <span
                                class="footer-logo"><?= Yii::$app->params['company'] ?></span>
                        <span style="margin-left: 4em;font-size: 90%;font-style: italic;">сайт разработан группой <a
                                    href="https://alexart21.ru" style="color: #000;font-weight:bolder;font-style:normal;letter-spacing: 1px">ALEXART21.RU</a></span></span>

                    </div> <!-- /.text-center -->
<!--                        <a href="#top" id="go-top"><i class="fa fa-angle-up"></i></a>-->
                </div> <!-- /.row -->

            </div> <!-- /.container -->
        </footer>
        <!-- /#footer -->
        <audio preload="auto">
                <source src="/audio/buben.mp3" type="audio/mpeg">
                <source src="/audio/buben.ogg" type="audio/ogg">
        </audio>
        <!--Окно чата-->
        <div id="msg-block" data-closed data-toggle="tooltip" data-trigger="manual" title="<?= hello() ?>, я Михаил.Чем могу помочь ?">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
            <div id="msg-content">
                <div class="msg-closed button-anim">
                    &nbsp;&nbsp;&nbsp;<i class="fab fa-viber viber"></i> <i class="fab fa-whatsapp wats"></i> <i
                            class="fab fa-telegram-plane tg"></i>
                    <b style="position: absolute;left: 120px">Начните чат</b>
                </div>
                <img class="msg-img img-circle img-thumbnail" src="/img/msg.png" alt="">
                <div class="msg-text">
                    <div class="text-center"><?= hello() ?>, я Михаил.</div>
                    <div class="text-center text-info">выберите мессенджер и начните чат</div>
                    <i style="display:block;text-align: right"><span
                                class="fa fa-check text-success"></span><?= date('H:i') ?>&nbsp;&nbsp;</i>
                </div>
                <hr>
                <a class="msg-btn viber-bg" href="viber://chat?number=<?= Yii::$app->params['tel1_i'] ?>"
                   target="_blank"><i class="fab fa-viber""></i> Viber</a>
                <a class="msg-btn watsap-bg" href="whatsapp://send?phone=<?= Yii::$app->params['tel1_i'] ?>"
                   target="_blank"><i class="fab fa-whatsapp"></i> Watsapp</a>
                <!--<a class="msg-btn tg-bg" href="https://telegram.me/iskander_m21" target="_blank"><i
                            class="fab fa-telegram-plane"></i> Telegram</a>-->
            </div>
        </div>
        <!--/-->
    </div>
    <?php $this->endBody() ?>
    <script type='text/javascript'>
        (function ($) {
            new WOW().init();
        })(jQuery);
    </script>
    </body>
    </html>
<?php //Spaceless::end()?>
<?php $this->endPage() ?>