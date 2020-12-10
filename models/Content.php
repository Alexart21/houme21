<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "content".
 *
 * @property integer $id
 * @property string $page
 * @property string $content
 */
class Content extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'content';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['page', 'content'], 'required'],
            [['content'], 'string'],
            [['page'], 'string', 'max' => 50],
            [['page'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'page' => 'Page',
            'content' => 'Content',
        ];
    }

    /**
     * @return string
     */
    public function getContent()
    {
        // имя экшена
        $act = Yii::$app->requestedAction->id;
        /* Без хранимой процедуры */
//        $sql = "SELECT * FROM content WHERE page = '$act'";
        /* Хранимая процедура */
        $sql = "CALL getContent('$act')";
        $data = ActiveRecord::findBySql($sql)->asArray()->all();

        return $data;
    }
}
