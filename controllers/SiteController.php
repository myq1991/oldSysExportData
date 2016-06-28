<?php

namespace app\controllers;

use app\models\SearchMemberInfo;
use app\models\SearchTraineeInfo;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\HttpException;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

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

    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionMember()
    {
        return $this->render('member');
    }

    public function actionTrainee()
    {
        return $this->render('trainee');
    }


    public function actionMemberResult()
    {
        if (Yii::$app->request->isPost) {
            $model = new SearchMemberInfo();
            if ($model->load(Yii::$app->request->post(), '') && $model->validate()) {
                return $this->render('member-result', [
                    'result' => $model->search(),
                ]);
            }
            throw new HttpException(403, '非法的访问参数');
        }
        throw new HttpException(403, '非法的访问请求');
    }

    public function actionTraineeResult()
    {
        if (Yii::$app->request->isPost) {
            $model = new SearchTraineeInfo();
            if ($model->load(Yii::$app->request->post(), '') && $model->validate()) {
                return $this->render('trainee-result', [
                    'result' => $model->search(),
                ]);
            }
        }
        throw new HttpException(403, '非法的访问请求');
    }
}
