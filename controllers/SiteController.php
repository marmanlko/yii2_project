<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\todo;
use app\models\category;

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
   

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $todo=todo::find()
        // ->select('todo.*,category.*')
        // ->leftJoin('todo','category.id=todo.category_id')
        // ->where(['todo.id'=>10])
        // ->with('category')
        ->all();
        $category=category::find()->all();
        $model = new Todo();
        return $this->render('login', [
            'model' => $model,
            'todo'=>$todo,
            'category'=>$category,
        ]);
        $model =new Todo();
        $formData=Yii::$app->request->post();
        if($model->load($formData)){
            if($model->save()){
                Yii::$app->getSession()->setFlash('message',"Successfull");
                return $this->redirect(['login']);
            }
            else
            {
                Yii::$app->getSession()->setFlash('message',"Successfull"); 
                return $this->redirect(['index']);  
            }
        }
        return $this->render('login',['post'=>$model]);
    }
    public function actionDelete($id)
    {
        $todo=todo::findOne($id)->delete();
        if($todo)
        {
            Yii::$app->getSession()->setFlash('message',"Deleted Successfully!!");
            return $this->redirect(['login']);
        }
    }
    public function actionCreate()
    {

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
