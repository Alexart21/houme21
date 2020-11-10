<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

//use rico\yii2images;

/**
 * This is the model class for table "galery".
 *
 * @property integer $id
 * @property string $path
 * @property integer $timestamp
 * @property string $alt
 */
class Galery extends ActiveRecord
{
//    public $image;

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'galery';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['path'], 'required'],
            [['timestamp'], 'integer'],
            [['path'], 'string', 'max' => 50],
            [['alt'], 'string', 'max' => 200],
            //            [['image'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'path' => 'Path',
            'timestamp' => 'Timestamp',
            'alt' => 'Alt',
        ];
    }

    /* Постраничный вывод картинок */
    public static function getAllImg($offset, $limit)
    {
        /* Чистый SQL */
        /*$sql = "SELECT galery.id, galery.title, galery.price, galery.description, image.filePath, image.urlAlias, image.isMain, image.itemId FROM galery
                INNER JOIN image
        ON (galery.id = image.itemId) AND isMain=1 LIMIT $limit OFFSET $offset";
        $data = ActiveRecord::findBySql($sql)->asArray()->all();*/

        /* Хранимая процедура */
        $sql = "CALL getAllImg($offset, $limit)";
        $data = ActiveRecord::findBySql($sql)->asArray()->all();

        return $data;
    }

    public static function getInterieur($offset, $limit)
    {
        /* Чистый SQL */
        /*$sql = "SELECT galery.id, galery.category, galery.title, galery.price, galery.description, image.filePath, image.urlAlias, image.isMain, image.itemId FROM galery
                INNER JOIN image
        ON (galery.id = image.itemId) AND isMain=1 WHERE galery.category = 'interieur' LIMIT $limit OFFSET $offset";
        $data = ActiveRecord::findBySql($sql)->asArray()->all();*/

        /* Хранимая процедура */
        $sql = "CALL getInterieur($offset, $limit)";
        $data = ActiveRecord::findBySql($sql)->asArray()->all();

        return $data;
    }

    public static function getExterieur($offset, $limit)
    {
        /* Чистый SQL */
        /*$sql = "SELECT galery.id, galery.category, galery.title, galery.price, galery.description, image.filePath, image.urlAlias, image.isMain, image.itemId FROM galery
                INNER JOIN image
        ON (galery.id = image.itemId) AND isMain=1 WHERE galery.category = 'exterieur' LIMIT $limit OFFSET $offset";
        $data = ActiveRecord::findBySql($sql)->asArray()->all();*/

        /* Хранимая процедура */
        $sql = "CALL getExterieur($offset, $limit)";
        $data = ActiveRecord::findBySql($sql)->asArray()->all();

        return $data;
    }

    public static function getKitchen($offset, $limit)
    {
        /* Чистый SQL */
        /*$sql = "SELECT galery.id, galery.category, galery.title, galery.price, galery.description, image.filePath, image.urlAlias, image.isMain, image.itemId FROM galery
                INNER JOIN image
        ON (galery.id = image.itemId) AND isMain=1 WHERE galery.category = 'kitchen' LIMIT $limit OFFSET $offset";
        $data = ActiveRecord::findBySql($sql)->asArray()->all();*/

        /* Хранимая процедура */
        $sql = "CALL getKitchen($offset, $limit)";
        $data = ActiveRecord::findBySql($sql)->asArray()->all();

        return $data;
    }

    public static function getKupe($offset, $limit)
    {
        /* Чистый SQL */
        /*$sql = "SELECT galery.id, galery.category, galery.title, galery.price, galery.description, image.filePath, image.urlAlias, image.isMain, image.itemId FROM galery
                INNER JOIN image
        ON (galery.id = image.itemId) AND isMain=1 WHERE galery.category = 'kupe' LIMIT $limit OFFSET $offset";
        $data = ActiveRecord::findBySql($sql)->asArray()->all();*/

        /* Хранимая процедура */
        $sql = "CALL getKupe($offset, $limit)";
        $data = ActiveRecord::findBySql($sql)->asArray()->all();

        return $data;
    }

    public static function getRacks($offset, $limit)
    {
        /* Чистый SQL */
        /*$sql = "SELECT galery.id, galery.category, galery.title, galery.price, galery.description, image.filePath, image.urlAlias, image.isMain, image.itemId FROM galery
                INNER JOIN image
        ON (galery.id = image.itemId) AND isMain=1 WHERE galery.category = 'racks' LIMIT $limit OFFSET $offset";
        $data = ActiveRecord::findBySql($sql)->asArray()->all();*/

        $sql = "CALL getRacks($offset, $limit)";
        $data = ActiveRecord::findBySql($sql)->asArray()->all();

        return $data;
    }

    /* Вывод отдельной картинки */
    public static function getImg($id)
    {
        $id = intval($id);

        $lastSql = "CALL getLastFromImg('$id')";
        $last = ActiveRecord::findBySql($lastSql)->asArray()->one();
        $last = $last['timestamp'];

        // дергаем кэш
        $imgData = Yii::$app->cache->get($id);
//        echo gmdate("D, d M Y H:i:s \G\M\T", $imgData['timestamp']);
//        die;
        if ($imgData) {
            array_push($imgData, $last);
            return $imgData;
        }

        /* Чистый SQL без подготовленного запроса */
        /*$sql = "SELECT galery.id, galery.title, galery.price, galery.description, galery.full_text, galery.timestamp, image.filePath, image.isMain, image.itemId FROM galery
                INNER JOIN image
                ON (galery.id = $id AND image.itemId = $id) AND isMain=1";
        $data = ActiveRecord::findBySql($sql)->asArray()->one();*/


        /* Подготовленный запрос */
        /*$sql = "SELECT galery.id, galery.title, galery.price, galery.description, galery.full_text, galery.timestamp, image.filePath, image.isMain, image.itemId FROM galery
                INNER JOIN image
                ON (galery.id = :id AND image.itemId = :id) AND image.isMain=1";
        $data = ActiveRecord::findBySql($sql, [':id' => $id])->asArray()->one();*/

        /* Хранимая процедура */
        $sql = "CALL getImgById($id)";
        $imgData = ActiveRecord::findBySql($sql)->asArray()->one();

//         set cache
//         86400 - сутки
//         604800 - неделя
//         15552000 - 180 суток
        Yii::$app->cache->set($id, $imgData, 15552000);
        array_push($imgData, $last);
        return $imgData;
    }
}
