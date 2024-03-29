<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\captcha\Captcha;

$this->title = 'Вход в админку';
//$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .pass-viz {
        cursor: pointer;
    }
</style>
<div class="site-login container">
    <br>
        <?php  echo Yii::$app->getSecurity()->generatePasswordHash('password')?>
    <br>
    <br>
    <br>
    <h3>Введите данные для входа:</h3>
    <br>
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput()->label('<span class="pass-viz">Пароль</span>'); ?>

    <?/*= $form->field($model, 'reCaptcha')->widget(
        \himiklab\yii2\recaptcha\ReCaptcha2::className(),
        [
            'siteKey' => '6LfRBQEaAAAAAEqEbZSrlYH0sQz5Q-bX58GHPNjL', // unnecessary is reCaptcha component was set up
        ]
    ) */?>

    <?= $form->field($model, 'rememberMe')->checkbox([
        'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
    ]) ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

    <!--<div class="col-lg-offset-1" style="color:#999;">
        You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>
        To modify the username/password, please check out the code <code>app\models\User::$users</code>.
    </div>-->
</div>
<script>
    document.querySelector('.pass-viz').addEventListener('click', function () {
        var passInput = document.getElementById('loginform-password');
        if (passInput.getAttribute('type') == 'password') {
            passInput.setAttribute('type', 'text');
        } else {
            passInput.setAttribute('type', 'password');
        }
    });
</script>
