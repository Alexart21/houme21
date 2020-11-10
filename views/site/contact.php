<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;
use yii\helpers\HtmlPurifier;

$this->title = 'Contact';

?>
<?php
Modal::begin([
    'id' => 'modal',
    'header' => '<h3>Отправка сообщения</h3>'
]);
?>

<div class="site-contact">

    <div class="row">
        <div class="col-lg-5">
            <?php Pjax::begin([
                'clientOptions' => [
                    'method' => 'POST'
                ],
                'id' => 'contact',
                'enablePushState' => false,
                'timeout' => 20000
            ]);
            ?>

            <?php $form = ActiveForm::begin([
                'id' => 'contact-form',
                'options' => ['data-pjax' => true],
            ]);
            ?>

            <?= $form->field($model, 'name')->textInput(['required' => true, 'tabindex' => '1']) ?>

            <?= $form->field($model, 'email')->input('email', ['tabindex' => '2']) ?>

            <?= $form->field($model, 'subject')->textInput(['tabindex' => '3']) ?>

            <?= $form->field($model, 'body')->textarea(['rows' => 6, 'tabindex' => '4']) ?>

            <?= $form->field($model, 'robot')->checkboxList(['r' => ' Я не робот']); ?>

            <div class="form-group">
                <?= Html::submitButton('Отправить', ['class' => 'tel_but but_gr', 'name' => 'contact-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
            <?php Pjax::end(); ?>
        </div>
    </div>
</div>
<?php
Modal::end();
?>
<script>
    $('#modal').modal('show');

    $(document).on('pjax:beforeSend', function () {
        document.body.style.cursor = 'progress';
    });
    $(document).on('pjax:complete', function () {
        document.body.style.cursor = 'default';
    });
</script>


