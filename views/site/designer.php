<?php
//die('view');
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */
//if ($success) die('OK');
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\widgets\MaskedInput;
use yii\widgets\Pjax;

$this->title = 'Contact';
?>
<?php
Modal::begin([
    'id' => 'modal',
    'header' => '<h3>Заявка на выезд дизайнера</h3>'
]);
?>
<div class="site-contact">

    <div class="row">
        <div class="col-lg-5">
            <?php Pjax::begin([
                'clientOptions' => [
                    'method' => 'POST'
                ],
                'id' => 'designer',
                'enablePushState' => false,
                'timeout' => 20000
            ]);
            ?>

            <?php $form = ActiveForm::begin(['options' => ['data-pjax' => true]], ['id' => 'contact-form']); ?>

            <?= $form->field($model, 'name')->textInput(['required' => true, 'tabindex' => '1']) ?>

            <?= $form->field($model, 'tel')->textInput(['class' => 'phone', 'required' => true, 'tabindex' => '2'])
                ->widget(MaskedInput::className(), [
                    'mask' => '+7 (999) - 999 - 99 - 99',
                ]);
            ?>

            <?= $form->field($model, 'adress')->textInput(['required' => true, 'tabindex' => '3']) ?>

            <?= $form->field($model, 'dop')->textarea(['rows' => 6, 'tabindex' => '4', 'placeholder' => 'Например, удобное для Вас время']) ?>

            <?= $form->field($model, 'robot')->checkboxList(['r' => '&nbsp;&nbsp;Я не робот']); ?>

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
