<?php

namespace app\controllers;

use Yii;
use yii\caching\DbDependency;
use yii\filters\AccessControl;
use yii\filters\PageCache;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\tables\Users;
use app\models\tables\Tasks;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
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
                    'sighUp' => ['post'],
                ],
            ],
            'cache'=>[
                'class'=>PageCache::className(),
                'only'=>['personal'],
                'duration'=>3600,
                'dependency'=>[
                    'class'=>DbDependency::className(),
                    'sql'=>"select * from tasks",
                ],

            ],
        ];
    }

    /**
     * {@inheritdoc}
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
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionRegistration()
    {
        $model = new Users();

        return $this->render('registration', [
            'model' => $model,
        ]);
    }

    public function actionSighup()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $params = Yii::$app->request->post();
        $user = new Users();
        if ($user->load($params) && $user->validate()) {
            if ($user->save()) {
                return $this->redirect(['login']);
            }
        }
        return $this->render('registration', ['model' => $user]);
    }

    public function actionPersonal()
    {
        $user = Yii::$app->user->getIdentity();
//        $username = $user->username;
        $user_id=$user->id;
        $month = date('n');
        $year = date('Y');
        $firstDay = '01';
        $lastDay = date('t');
        $firstDayOfMonth = $year . '-' . $month . '-' . $firstDay;
        $lastDayOfMonth = $year . '-' . $month . '-' . $lastDay;
        $tasks = Tasks::find()
            ->where(['between', 'start', $firstDayOfMonth, $lastDayOfMonth])
            ->andWhere(['user_id' => $user_id])
            ->asArray()
            ->all();
        $this->layout='personal';
        return $this->render('@app/views/task/task.php', ['tasks' => $tasks]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('/index.php?r=site/personal');
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
