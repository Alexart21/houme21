<?php
//use yii\db\ActiveRecord;

//debug($data[1]);die;

header('Last-Modified:' . gmdate("D, d M Y H:i:s \G\M\T", $data[1]));
//header('Last-Modified:' . gmdate("D, d M Y H:i:s \G\M\T", $data[0]['last_mod']));
$this->title = $data[0]['title'];
$this->registerMetaTag(['name' => 'keywords', 'content' => $data[0]['keywords']]);
$this->registerMetaTag(['name' => 'description', 'content' => $data[0]['descrition']]);
?>
<!--noindex-->
<div class="site-slider">
    <div class="slider">
        <div class="flexslider">
            <ul class="slides">
                <li>
                    <div class="overlay"></div>
                    <img src="/img/index_img/slider/slide1.jpg" alt="">
                    <div class="slider-caption visible-md visible-lg">
                        <span class="h2">Дизайн экстерьера</span>
                        <p>домов, коттеджей</p>
                    </div>
                </li>
                <li>
                    <div class="overlay"></div>
                    <img src="/img/index_img/slider/slide3.jpg" alt="">
                    <div class="slider-caption visible-md visible-lg">
                        <span class="h2">Дизайн интерьера</span>
                        <p>домов, квартир, иных помещений</p>
                    </div>
                </li>
            </ul>
        </div> <!-- /.flexslider -->
    </div> <!-- /.slider -->
</div> <!-- /.site-slider -->
<!--/noindex-->
<section>
    <section class="content-section" style="margin-top: 104vh">
        <h1 class="text-center header_shadow">Дизайн экстерьера и интерьера, мебели от
            студии <?= Yii::$app->params['company'] ?></h1>
        <p>
            Дизайн студия <span class="houme"><?= Yii::$app->params['company'] ?></span> предлагает Вам услуги по
            разработке
            дизайна
            помещений, экстерьера строений, мебели.<br>

        </p>
        <p>
            Выполним работы любого объема и сложности с учетом Ваших идей и специфики объекта.
        </p>
        <p>
            При необходимости можем и будем консультировать в процессе работ(авторский надзор).
        </p>
    </section>
    <?php
    require_once __DIR__ . '/inc/indexPageArr.php'; // массив $indexData
    ?>
    <div id="portfolio">
        <?php foreach ($indexData as $data) : ?>
            <section class="content-section">
                <div class="container">
                    <div class="row">
                        <div class="heading-section col-md-12 text-center wow bounceInDown" data-wow-delay="0.4s">
                            <h2><?= $data['h2'] ?></h2>
                            <p><?= $data['p'] ?></p>
                        </div> <!-- /.heading-section -->
                    </div> <!-- /.row -->
                    <div class="row">
                        <?php
                        $i = 1;
                        $delay = 0.2;
                        ?>
                        <?php foreach ($data['span_over'] as $imgData) : ?>
                            <a href="/galery/<?= $data['name'] ?>">
                                <div class="team-member col-md-3 col-sm-6 wow bounceInUp"
                                     data-wow-delay="<?= $delay ?>s">
                                    <div class="member-thumb swing2">
                                        <img class="slide-in" src="/img/index_img/<?= $data['name'] ?>/_<?= $i ?>.jpg"
                                             alt="">
                                        <div class="team-overlay">
                                            <span class="over-head"><?= $data['over_head'] ?></span>
                                            <span><?= $imgData ?></span>
                                        </div> <!-- /.team-overlay -->
                                        <?php
                                        $i++;
                                        $delay += 0.2;
                                        ?>
                                    </div> <!-- /.member-thumb -->
                                </div> <!-- /.team-member -->
                            </a>
                        <?php endforeach; ?>
                    </div> <!-- /.row -->
                    <?php if (file_exists(__DIR__ . '/inc/' . $data['name'] . 'Text.php')) : ?>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="skills-heading">
                                    <div class="small-text">
                                        <?php
                                        include __DIR__ . '/inc/' . $data['name'] . 'Text.php';
                                        ?>
                                    </div>
                                </div>
                            </div> <!-- /.col-md-12 -->
                        </div> <!-- /.row -->
                    <?php endif; ?>
                </div> <!-- /.container -->
            </section> <!-- /#our-team -->
        <?php endforeach; ?>
        <section class="content-section">
            <div class="container">
                <div class="row">
                    <div class="heading-section col-md-12 text-center wow bounceInDown animated" data-wow-delay="0.4s">
                        <h2>Дизайн мебели</h2>
                        <p>кухни, гардеробные, шкафы купе и раздвижные системы</p>
                    </div>
                </div>
                <div class="row">
                    <a href="/galery/racks">
                        <div class="team-member col-md-3 col-sm-6 wow bounceInUp" data-wow-delay="0.2s">
                            <div class="member-thumb swing2">
                                <img class="slide-in" src="/img/index_img/mebel/_1.jpg" alt="">
                                <div class="team-overlay">
                                    <span class="over-head">гардеробные</span>
                                    <span>Фасады МДФ рамка.Вставка-стекло</span>
                                </div> <!-- /.team-overlay -->
                            </div> <!-- /.member-thumb -->
                        </div> <!-- /.team-member -->
                    </a>
                    <a href="/galery/kupe">
                        <div class="team-member col-md-3 col-sm-6 wow bounceInUp" data-wow-delay="0.4s">
                            <div class="member-thumb swing2">
                                <img class="slide-in" src="/img/index_img/mebel/_2.jpg" alt="">
                                <div class="team-overlay">
                                    <span class="over-head">раздвижные системы</span>
                                    <span>Профиль ARISTO. Вставка стекло LAKOBEL</span>
                                </div> <!-- /.team-overlay -->
                            </div> <!-- /.member-thumb -->
                        </div> <!-- /.team-member -->
                    </a>
                    <a href="/galery/kitchen">
                        <div class="team-member col-md-3 col-sm-6 wow bounceInUp" data-wow-delay="0.6s">
                            <div class="member-thumb swing2">
                                <img class="slide-in" src="/img/index_img/mebel/_3.jpg" alt="">
                                <div class="team-overlay">
                                    <span class="over-head">кухни</span>
                                    <span>Фасады МДФ эмаль – краска</span>
                                </div> <!-- /.team-overlay -->
                            </div> <!-- /.member-thumb -->
                        </div> <!-- /.team-member -->
                    </a>
                    <a href="/galery/kitchen">
                        <div class="team-member col-md-3 col-sm-6 wow bounceInUp" data-wow-delay="0.8s">
                            <div class="member-thumb swing2">
                                <img class="slide-in" src="/img/index_img/mebel/_4.jpg" alt="">
                                <div class="team-overlay">
                                    <span class="over-head">кухни</span>
                                    <span>Фасады пластик ARPA в ПВХ кромке
                                    .</span>
                                </div> <!-- /.team-overlay -->
                            </div> <!-- /.member-thumb -->
                        </div> <!-- /.team-member -->
                    </a>
                </div> <!-- /.row -->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="skills-heading">
                            <div class="small-text">
                                <h2 class="header_shadow text-center">Дизайн мебели от HOUME21</h2>
                                <article>
                                    <p>
                                        Для большого количества владельцев небольших жилых помещений и не только,
                                        где проблемой остается малая площадь комнат,
                                        все острее стоит вопрос максимально эргономичного и оптимального использования
                                        каждого жилого метра квартиры.<br>
                                        Знание нашими дизайнерами разнообразных материалов разных производителей и
                                        фурнитуры
                                        не помешает смонтировать любую мебель
                                        хоть в совсем небольшую прихожую хоть и в вполне просторную гостиную или же
                                        спальню.
                                    </p>
                                    <p>
                                        Заказав у нас дизайн мебели Вы гарантированно получите грамотно и со вкусом
                                        выполненный проект.
                                    </p>
                                </article>
                            </div>
                        </div>
                    </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->
            </div>
        </section>
        <div class="row col-md-12">
            <p>
                <span class="header_shadow premium center-text">Плюсы сотрудничества с <i><?= Yii::$app->params['company'] ?></i></span>
            </p>
            <ul class="ok-list">
                <li><span class="fa fa-check wow bounceInDown" data-wow-delay="0.7s"></span>Опыт на рынке дизайнерских
                    услуг
                </li>
                <li><span class="fa fa-check wow bounceInDown" data-wow-delay="0.6s"></span>Хорошее знание строительных
                    и мебельных технологий.
                </li>
                <li><span class="fa fa-check wow bounceInDown" data-wow-delay="0.5s"></span>Накопленные собственные
                    дизайнерские решения.
                </li>
                <li><span class="fa fa-check wow bounceInDown" data-wow-delay="0.4s"></span>Постоянно находимся в тренде
                    дизайнерских идей.
                </li>
                <li><span class="fa fa-check wow bounceInDown" data-wow-delay="0.3s"></span>Возможен авторский надзор.
                </li>
                <li><span class="fa fa-check wow bounceInDown" data-wow-delay="0.2s"></span>Профессиональный коллектив.
                </li>
                <li><span class="fa fa-check wow bounceInDown" data-wow-delay="0.1s"></span>Приемлемые сроки &quot;от
                    идеи до эскиза&quot;.
                </li>
            </ul>
        </div>
    </div>
</section>