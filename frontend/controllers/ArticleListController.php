<?php
/**
 * Created by PhpStorm.
 * User: daishiqi
 * Date: 2017/12/26
 * Time: 9:25
 */

namespace frontend\controllers;


use backend\models\ArticleDetail;
use yii\base\Controller;
use yii;

class ArticleListController extends Controller
{
    public function actionIndex()
    {
        $data = ArticleDetail::find()->asArray()->all();
        return $this->renderPartial('index',['data'=>$data]);
    }
    public function actionDetail()
    {
        $id = Yii::$app->request->get('id');
        $detail_data = ArticleDetail::find()->where(['id'=>$id])->asArray()->one();
        return $this->renderPartial('detail',['data'=>$detail_data]);
    }
}