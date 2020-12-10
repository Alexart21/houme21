<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $tel;
    public $body;
//    public $reCaptcha;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['name', 'tel', 'body'], 'required', 'message' => 'заполните это поле !'],
            ['name', 'string', 'length' => [3, 100]],
            ['tel', 'string', 'length' => [11, 30]],
            ['email', 'email', 'message' => 'Некорректный e-mail адрес !'],
            /*[['reCaptcha'], \himiklab\yii2\recaptcha\ReCaptchaValidator2::className(),
                'secret' => '6LfRBQEaAAAAAMVJTPl6A3vWbpjzSuXdRUnQLm39', // unnecessary if reСaptcha is already configured
                'uncheckedMessage' => 'Подтвердите, что вы не робот'],*/
        ];
    }


    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
        'name' => 'Ваше Имя',
        'email' => 'Email',
        'tel' => 'Тел.',
        'body' => 'Сообщение',
//            'reCaptcha' => '',
        ];
    }


    public function contactSend()
    {

        if ($this->validate()) {
//            var_dump($this->robot);die;
            $subject = 'Письмо с сайта HOUME21.RU';
            $name = mb_ucfirst(clr_get($this->name));
            $tel = clr_get($this->tel);
            $email = $this->email ? $this->email : null;
            $body = 'Вам пишет <b style="font-size: 120%;text-shadow: 0 1px 0 #e61b05">' . $name . '</b><br>Тел: ' . $tel . '<br><br><div style="font-style: italic">' . nl2br(clr_get($this->body)) . '</div>';
            if($email){
                $body .= '<br>email: ' . clr_get($this->email);
            }
            $success = Yii::$app->mailer->compose()// Yii::$app->params['adminEmail'] [clr_get($this->email) => $name]
            ->setTo('mail@houme21.ru')
                ->setFrom(['mail@houme21.ru' => 'houme21.ru'])
                ->setSubject($subject)
                ->setHtmlBody($body);
            /* Если клиент указал необязательный email то добавляем заголовок ReplyTo */
            if($email){
               $success = $success->setReplyTo([$email => $name])
                    ->send();
            }else{
               $success = $success->send();
            }

            If ($success) {
                die('<h3 style="color:green">Спасибо, ' . $name . ', Ваше сообщение отправлено</h3>
            <script>
            const timerId = setInterval(function(){
                $(\'#modal\').modal(\'hide\');
            }, 4000);
            setTimeout(function() {
               clearInterval(timerId);
            }, 4000);
            </script>
            ');
            } else {
                die('<h3 style="color:red">Ошибка !</h3>');
            }
        }/* else {
            die('<h3 style="color:red">Некорректные данные !</h3>');
        }*/
    }

}
