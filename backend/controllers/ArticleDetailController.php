<?php

namespace backend\controllers;

use backend\models\ArticleCate;
use Yii;
use backend\models\ArticleDetail;
use backend\models\ArticleDetailSearch;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArticleDetailController implements the CRUD actions for ArticleDetail model.
 */
class ArticleDetailController extends Controller
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
     * Lists all ArticleDetail models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticleDetailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

        ]);
    }

    /**
     * Displays a single ArticleDetail model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ArticleDetail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ArticleDetail();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $cate_data = (new Query())->select(['cate_name'])->from('article_cate')->indexBy('id')->column();
            return $this->render('create', [
                'model' => $model,
                'cate_data' =>$cate_data,
            ]);
        }
    }

    /**
     * Updates an existing ArticleDetail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ArticleDetail model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ArticleDetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ArticleDetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ArticleDetail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionSaveArticle()
    {
        if(Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $cate_name = ArticleCate::find()->where(['id'=>$data['cate_id']])->asArray()->one()['cate_name'];
            $model = new ArticleDetail();
            $model->cate_id = $data['cate_id'];
            $model->title = $data['title'];
            $model->content = $data['content'];
            $model->cate_name = $cate_name;
            $model->tags = $data['tags'];
            $model->create_time = time();
            $model->update_time = time();
            if($model->save()) {
                return json_encode(['status'=>1,'message'=>'添加成功']);
            }

            return json_encode(['status'=>2,'message'=>$model->getErrors()]);
        }
        return json_encode(['status'=>2,'message'=>'请求方式不正确']);
    }
}
