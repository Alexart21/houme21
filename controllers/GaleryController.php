<?php

namespace app\controllers;

use Yii;
use app\models\Galery;
use app\models\Content;
use yii\data\Pagination;

//use yii\web\Controller;


class GaleryController extends \yii\web\Controller
{

    public function actionIndex()
    {
        die;
        $query = Galery::find();
        $totalCount = $query->count();
        $pagination = new Pagination([
            'PageSize' => 5, // сколько показывать на странице
            'totalCount' => $totalCount, // общее кол-во (в данном случае все)
            'forcePageParam' => false, // для ЧПУ
            'pageSizeParam' => false,// убирает GET параметр per-page из адресной строки
        ]);
        /* макс. количестово кнопок (по умолчанию там 10) */
//        \Yii::$container->set('yii\widgets\LinkPager', ['maxButtonCount' => 5]);
        $imgData = Galery::getAllImg($pagination->offset, $pagination->limit);

        return $this->render('index', [
            'pagination' => $pagination,
            'imgData' => $imgData,
        ]);
    }


    /* Отдельная картинка */
    public function actionAjax($id)
    {
        /*$lastSql = "C M Y H:i:s \G\M\T", $imgData['timestamp']));
//        debug(gmdate("D, d M Y H:i:s \G\M\T", $imgData['0']));
        die;ALL getLastFromContent('$id')";
        $last = ActiveRecord::findBySql($lastSql)->asArray()->one();
        $last = $last['timestamp'];*/

        $imgData = Galery::getImg($id);
//        debug($imgData);
//        die;
        return $this->renderAjax('ajax', ['imgData' => $imgData]);

    }


    public function actionKitchen()
    {
        $totalCount = Galery::find()->where(['category' => 'kitchen'])->count();
        $pagination = new Pagination([
            'PageSize' => 10, // сколько показывать на странице
            'totalCount' => $totalCount, // общее кол-во (в данном случае все)
            'forcePageParam' => false, // для ЧПУ
            'pageSizeParam' => false,// убирает GET параметр per-page из адресной строки
        ]);
        /* макс. количестово кнопок (по умолчанию там 10) */
//        \Yii::$container->set('yii\widgets\LinkPager', ['maxButtonCount' => 5]);
        $imgData = Galery::getKitchen($pagination->offset, $pagination->limit);

        $model = new Content();
        $content = $model->getContent();

        return $this->render('kitchen', [
            'pagination' => $pagination,
            'imgData' => $imgData,
            'content' => $content,
        ]);
    }

    public function actionKupe()
    {
        $totalCount = Galery::find()->where(['category' => 'kupe'])->count();
        $pagination = new Pagination([
            'PageSize' => 10, // сколько показывать на странице
            'totalCount' => $totalCount, // общее кол-во (в данном случае все)
            'forcePageParam' => false, // для ЧПУ
            'pageSizeParam' => false,// убирает GET параметр per-page из адресной строки
        ]);
        /* макс. количестово кнопок (по умолчанию там 10) */
//        \Yii::$container->set('yii\widgets\LinkPager', ['maxButtonCount' => 5]);
        $imgData = Galery::getKupe($pagination->offset, $pagination->limit);

        $model = new Content();
        $content = $model->getContent();

        return $this->render('kupe', [
            'pagination' => $pagination,
            'imgData' => $imgData,
            'content' => $content,
        ]);
    }

    public function actionRacks()
    {
        $totalCount = Galery::find()->where(['category' => 'racks'])->count();
        $pagination = new Pagination([
            'PageSize' => 10, // сколько показывать на странице
            'totalCount' => $totalCount, // общее кол-во (в данном случае все)
            'forcePageParam' => false, // для ЧПУ
            'pageSizeParam' => false,// убирает GET параметр per-page из адресной строки
        ]);
        /* макс. количестово кнопок (по умолчанию там 10) */
//        \Yii::$container->set('yii\widgets\LinkPager', ['maxButtonCount' => 5]);
        $imgData = Galery::getRacks($pagination->offset, $pagination->limit);

        $model = new Content();
        $content = $model->getContent();

        return $this->render('racks', [
            'pagination' => $pagination,
            'imgData' => $imgData,
            'content' => $content,
        ]);
    }

    public function actionInterieur()
    {
        $totalCount = Galery::find()->where(['category' => 'interieur'])->count();
        $pagination = new Pagination([
            'PageSize' => 10, // сколько показывать на странице
            'totalCount' => $totalCount, // общее кол-во (в данном случае все)
            'forcePageParam' => false, // для ЧПУ
            'pageSizeParam' => false,// убирает GET параметр per-page из адресной строки
        ]);
        /* макс. количестово кнопок (по умолчанию там 10) */
//        \Yii::$container->set('yii\widgets\LinkPager', ['maxButtonCount' => 5]);
        $imgData = Galery::getInterieur($pagination->offset, $pagination->limit);

        $model = new Content();
        $content = $model->getContent();

        return $this->render('interieur', [
            'pagination' => $pagination,
            'imgData' => $imgData,
            'content' => $content,
        ]);
    }

    public function actionExterieur()
    {

        $totalCount = Galery::find()->where(['category' => 'exterieur'])->count();
        $pagination = new Pagination([
            'PageSize' => 10, // сколько показывать на странице
            'totalCount' => $totalCount, // общее кол-во (в данном случае все)
            'forcePageParam' => false, // для ЧПУ
            'pageSizeParam' => false,// убирает GET параметр per-page из адресной строки
        ]);
        /* макс. количестово кнопок (по умолчанию там 10) */
//        \Yii::$container->set('yii\widgets\LinkPager', ['maxButtonCount' => 5]);
        $imgData = Galery::getExterieur($pagination->offset, $pagination->limit);

        $model = new Content();
        $content = $model->getContent();

        return $this->render('exterieur', [
            'pagination' => $pagination,
            'imgData' => $imgData,
            'content' => $content,
        ]);
    }

}
