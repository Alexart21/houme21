<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 19.08.2018
 * Time: 13:41
 */

namespace app\models;

use Yii;
use yii\base\Model;


class callForm extends Model
{
    public $name;
    public $tel;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'tel'], 'required', 'message' => 'заполните это поле !'],
            ['name', 'string', 'length' => [3, 30]],
            ['tel', 'string', 'length' => [11, 30]],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Ваше Имя',
            'tel' => 'Номер телефона',
        ];
    }


    public function callSend()
    {
//        debug($this->tel);die;
        $subject = 'Просьба перезвонить';
        $name = clr_get(mb_ucfirst($this->name));
        $tel = clr_get($this->tel);

        $body = 'Клиент &nbsp;<b style="font-size: 120%;text-shadow: 0 1px 0 #e61b05">' . $name . '</b>&nbsp; просит перезвонить.<br>' .
            'Тел. :&nbsp;&nbsp;<b style="font-size: 110%;>' . $tel . '</b>' .
            '<br>Сообщение отправлено с сайта <b>https://houme21.ru</b>';

        $success = Yii::$app->mailer->compose()
            ->setTo('mail@houme21.ru')
            ->setFrom(['mail@houme21.ru' => 'houme21.ru'])
            ->setSubject($subject)
            ->setHtmlBody($body)
            ->send();

        if ($success) {
//            die('hghhh');
            if ($this->validate()) {
//                die('gjgjgjgjgjjjjjjjjjjjjjjjjjjjjjjj');
                die('<h3 style="color:green">Спасибо, ' . $name . ', Мы Вам обязательно перезвоним</h3>');
            }
        } else
            die('<h3 style="color:red">Ошибка !</h3>');
    }
}