<?php
use yii\widgets\LinkPager;
use yii\widgets\Pjax;

if (!empty($_GET['page'])) {
    $page = ' | страница ' . $_GET['page'];
} else $page = NULL;

header('Last-Modified:' . gmdate("D, d M Y H:i:s \G\M\T", $content[1]));
//header('Last-Modified:' . gmdate("D, d M Y H:i:s \G\M\T", $content[0]['last_mod']));
$this->title = 'Дизайн экстерьера в Чебоксарах от ' . Yii::$app->params['company'] . $page;
$this->registerMetaTag(['name' => 'keywords', 'content' => $content[0]['keywords']]);
$this->registerMetaTag(['name' => 'description', 'content' => $content[0]['descrition']]);
?>
<style>
    .main-header {
        top: 0;
    }

    .wrap {
        padding-top: 10vh;
    }

    #menu-wrapper {
        opacity: 1 !important;
    }
</style>
<?php Pjax::begin([
    'clientOptions' => [
        'method' => 'get',
        'data-pjax-container' => '#ajax-img'
    ],
    'id' => 'ajax',
    'enablePushState' => false,
    'linkSelector' => '.pjax', //обрабатывать через pjax только отдельные ссылки
    'timeout' => 20000
]);
?>
<div id="ajax-img"></div>
<?php Pjax::end(); ?>

<div class="galery-small">
    <h1 class="header_shadow center-text wow bounceInDown" data-wow-delay="0.5s">Дизайн экстерьера от
        <i><?= Yii::$app->params['company'] ?></i></h1>
    <?php
    $delay = 0.1;
    ?>
    <?php foreach ($imgData as $item): ?>
        <figure class="wow bounceInUp" data-wow-delay="<?= $delay ?>s">
            <a class="pjax" href="/galery/ajax?id=<?= $item['id'] ?>"><img width="192" height="108"
                                                                           class="swing2 img_shadow"
                                                                           src="/upload/resize_img/Galeries/Galery<?= $item['itemId'] ?>/<?= $item['urlAlias'] ?>.jpg"
                                                                           alt="<?= $item['title'] ?> title="<?= $item['title'] ?>
                "></a>
            <figcaption>
                <?= $item['title'] ?>
            </figcaption>
            <?php /*if ($item['price']) : */ ?><!--
                <br>
                <span class="red digital small-price-block"><? /*= $item['price'] */ ?>&nbsp;<span
                        class="rubl">руб.</span></span>
            --><?php /*endif; */ ?>
        </figure>
        <?php
        $delay += 0.1;
        ?>
    <?php endforeach; ?>
</div>


<div style="clear: both">
    <?= LinkPager::widget([
        'pagination' => $pagination,
        'nextPageLabel' => '<i class="fa fa-forward"></i>',
        'prevPageLabel' => '<i class="fa fa-backward"></i>',
    ]) ?>
</div>
