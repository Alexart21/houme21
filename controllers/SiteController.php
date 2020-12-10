<?php

namespace app\controllers;

use app\models\ContactForm;
use app\models\Content;
use app\models\DesignerForm;
use app\models\LoginForm;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use app\models\callForm;

//use yii\imagine\Image;

class SiteController extends Controller
{
    /*public function actionError()
    {
        $errorCode = Yii::$app->errorHandler->exception->statusCode;
        $errorMsg = Yii::$app->errorHandler->exception->getMessage();
            if ($errorCode == 404) {
                $this->layout = '_404';
               return $this->render('_404', ['errorMsg' => $errorMsg]);
            }
    }*/
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            /*'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],*/
            /*'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],*/
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    /*public function actionIndex()
    {
        return $this->render('index');
    }*/
    public function actionIndex()
    {
        $act = Yii::$app->requestedAction->id;
        /* Проверяем кэш */
        $data = Yii::$app->cache->get($act);
        if ($data) {
            return $this->render('index', compact('data'));
        }
        $model = new Content();
        $data = $model->getContent();

        //15552000 - 180 суток
        Yii::$app->cache->set($act, $data, 15552000);
        return $this->render('index', compact('data'));
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = 'login';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();

        if ($model->load(Yii::$app->request->post())) { // данные пришли
//            sleep(2);
            $model->contactSend(); // валидация, отправка почты, вывод сообщения об успехе(ошибке) и завершение скрипта

        }
        //  выводим контактную форму
        return $this->renderAjax('contact', ['model' => $model]);
    }

    public function actionCall()
    {
//        die('dgdg');
        $model = new callForm();
//        die('qqqqqq');

        if ($model->load(Yii::$app->request->post())) { // данные пришли
            $model->callSend(); // валидация, отправка почты, вывод сообщения об успехе(ошибке) и завершение скрипта
        }

        return $this->renderAjax('call', ['model' => $model]);
    }

}
