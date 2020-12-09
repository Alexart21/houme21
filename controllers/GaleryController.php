<?php

namespace app\controllers;

use Yii;
use app\models\Galery;
use app\models\Content;
use yii\data\Pagination;
use yii\web\HttpException;

//use yii\web\Controller;


class GaleryController extends \yii\web\Controller
{

    public function actionIndex()
    {
        throw new HttpException(404, 'Страница не найдена');
    }


    /* Отдельная картинка */
    public function actionAjax($id)
    {
        $imgData = Galery::getImg($id);
        return $this->renderAjax('ajax', ['imgData' => $imgData]);
    }


    public function actionKitchen()
    {
        $pageNum = !empty($_GET['page']) ? (int) $_GET['page'] : null;
        $key = Yii::$app->requestedAction->id . $pageNum;
        /* Проверяем кэш */
        $data = Yii::$app->cache->get($key);
        if ($data) {
            return $this->render('kitchen', $data);
        }

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
        $data = [
            'pagination' => $pagination,
            'imgData' => $imgData,
            'content' => $content,
            'pageNum' => $pageNum,
        ];
        // set cache
        // 86400 - сутки
        // 604800 - неделя
        // 18144000 - 30 дней
        //15552000 - 180 суток
        Yii::$app->cache->set($key, $data, 15552000);
        return $this->render('kitchen', $data);
    }

    public function actionKupe()
    {
        $pageNum = !empty($_GET['page']) ? (int) $_GET['page'] : null;
        $key = Yii::$app->requestedAction->id . $pageNum;
        /* Проверяем кэш */
        $data = Yii::$app->cache->get($key);
        if ($data) {
            return $this->render('kupe', $data);
        }

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
        $data = [
            'pagination' => $pagination,
            'imgData' => $imgData,
            'content' => $content,
            'pageNum' => $pageNum,
        ];
        // set cache
        // 86400 - сутки
        // 604800 - неделя
        // 18144000 - 30 дней
        //15552000 - 180 суток
        Yii::$app->cache->set($key, $data, 15552000);
        return $this->render('kupe', $data);
    }

    public function actionRacks()
    {
        $pageNum = !empty($_GET['page']) ? (int) $_GET['page'] : null;
        $key = Yii::$app->requestedAction->id . $pageNum;
        /* Проверяем кэш */
        $data = Yii::$app->cache->get($key);
        if ($data) {
            return $this->render('racks', $data);
        }

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
        $data = [
            'pagination' => $pagination,
            'imgData' => $imgData,
            'content' => $content,
            'pageNum' => $pageNum,
        ];
        // set cache
        // 86400 - сутки
        // 604800 - неделя
        // 18144000 - 30 дней
        //15552000 - 180 суток
        Yii::$app->cache->set($key, $data, 15552000);
        return $this->render('racks', $data);
    }

    public function actionInterieur()
    {
        $pageNum = !empty($_GET['page']) ? (int) $_GET['page'] : null;
        $key = Yii::$app->requestedAction->id . $pageNum;
        /* Проверяем кэш */
        $data = Yii::$app->cache->get($key);
        if ($data) {
            return $this->render('interieur', $data);
        }

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
        $data = [
            'pagination' => $pagination,
            'imgData' => $imgData,
            'content' => $content,
            'pageNum' => $pageNum,
        ];
        // set cache
        // 86400 - сутки
        // 604800 - неделя
        // 18144000 - 30 дней
        //15552000 - 180 суток
        Yii::$app->cache->set($key, $data, 15552000);
        return $this->render('interieur', $data);
    }

    public function actionExterieur()
    {
        $pageNum = !empty($_GET['page']) ? (int) $_GET['page'] : null;
        $key = Yii::$app->requestedAction->id . $pageNum;
        /* Проверяем кэш */
        $data = Yii::$app->cache->get($key);
        if ($data) {
            return $this->render('exterieur', $data);
        }

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
        $data = [
            'pagination' => $pagination,
            'imgData' => $imgData,
            'content' => $content,
            'pageNum' => $pageNum,
        ];
        // set cache
        // 86400 - сутки
        // 604800 - неделя
        // 18144000 - 30 дней
        //15552000 - 180 суток
        Yii::$app->cache->set($key, $data, 15552000);
        return $this->render('exterieur', $data);
    }

}
