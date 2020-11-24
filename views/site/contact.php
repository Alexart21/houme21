<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;
use yii\widgets\MaskedInput;

$this->title = 'Contact';

?>
<?php
Modal::begin([
    'id' => 'modal',
    'header' => '<h3>Отправка сообщения</h3>'
]);
?>

<div class="site-contact">
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

            <?= $form->field($model, 'tel')
                ->widget(MaskedInput::className(), [
                    'mask' => '+7 (999) - 999 - 99 - 99',
                    'options' => [
                        'required' => true,
                        'tabindex' => 3,
                    ],
                ]);
            ?>

            <?= $form->field($model, 'email')->input('email', ['tabindex' => '2']) ?>

            <?= $form->field($model, 'body')->textarea(['rows' => 3, 'tabindex' => '4']) ?>

    <?= $form->field($model, 'robot')->checkbox(['r' => 'Я не робот']) ?><span style="float:right;color: red">*</span>
<!--            <div class="form-group">-->
                <?= Html::submitButton('Отправить', ['class' => 'success-button', 'name' => 'contact-button']) ?>
<!--            </div>-->

            <?php ActiveForm::end(); ?>
            <?php Pjax::end(); ?>
    </div>
<?php
Modal::end();
?>
<script>
    $('#modal').modal('show');
</script>


