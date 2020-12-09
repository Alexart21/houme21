<?php
header("Cache-Control: no-store, no-cache");
header('Last-Modified:' . gmdate("D, d M Y H:i:s \G\M\T", $imgData['timestamp']));

use yii\bootstrap\Modal;

$title = !empty($imgData['title']) ? $imgData['title'] : 'Дизайн домов,котеджей,квартир и офисов в Чебоксарах от Houme21. Фото ' . $imgData['id'];
$this->title = $title;

$keywords = !empty($imgData['keywords']) ? $imgData['keywords'] : '';
$this->registerMetaTag(['name' => 'keywords', 'content' => $keywords]);

$desc = !empty($imgData['description']) ? $imgData['description'] : '';
$this->registerMetaTag(['name' => 'description', 'content' => $desc]);

$largeImgPath = __DIR__ . '/../../web/upload/original_img/' . $imgData['filePath'];  // путь к фото
$img_arr = getimagesize($largeImgPath);
$width = $img_arr[0]; // ширина
$height = $img_arr[1]; // высота
$w_h = $img_arr[3]; // ширина и высота для тега img
?>

<?php
Modal::begin([
    'id' => 'modal-img'
]);
?>
<style>
    .modal-backdrop{
        background-color: #fff;
        opacity: .8 !important;
    }
</style>
<div class="ajax-img-wrap" style="width: <?= $width ?>px;height: <?= $height ?>px">
    <button class="close" data-dismiss="modal">&times;</button>
    <figure>
        <img title="<?= $title ?>" alt="<?= $title ?>" <?php echo $w_h ?>
             src="/upload/original_img/<?= $imgData['filePath'] ?>" alt="">
        <?php if (!empty($imgData['title'])) : ?>
            <figcaption><?= $imgData['title'] ?></figcaption>
        <?php else: ?>
            <figcaption class="no-border"></figcaption>
        <?php endif; ?>
    </figure>
</div>
<?php
Modal::end();
?>
<script>
    $('#modal-img').modal('show');
    $('.modal-content').velocity('transition.flipBounceYIn');
</script>
