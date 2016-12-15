<?php

namespace frontend\controllers;

use common\models\User;
use Yii;
use common\models\News;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all News models.
     * @return mixed
     */
    public function actionIndex()
    {

        $news = News::find()->orderBy('id desc')->limit(3)->all();

        return $this->render('index', [
            'news' => $news,
            'authors' => User::find()->all(),
        ]);
    }

    public function actionAuthor()
    {
        $id = (int)Yii::$app->request->get('id');

        if ($id <= 0) {
            return $this->redirect(['index']);
        }

        $author = User::find()->where(['id' => $id])->one();

        if (empty($author)) {
            return $this->redirect(['index']);
        }

        return $this->render('index', [
            'news' => $author->news,
            'authors' => User::find()->all(),
            'title' => 'Все новости автора: ' . $author->username,
        ]);
    }

    /**
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new News();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
}
