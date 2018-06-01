<?php
/**
 * Created by PhpStorm.
 * User: daishiqi
 * Date: 2017/12/26
 * Time: 9:25
 */

namespace frontend\controllers;


use backend\models\ArticleDetail;
use frontend\models\VisitRecord;
use yii\base\Controller;
use yii\data\Pagination;
use yii;

class ArticleListController extends Controller
{

    /**
     * @return string
     * @desc 列表页
     */
    public function actionIndex()
    {
        $data = ArticleDetail::find()->orderBy('create_time desc')->asArray()->all();
        $tags = (new \yii\db\Query())
            ->select(['tags'])
            ->from('article_detail')
            ->indexBy('id')
            ->column();
        array_unique($tags);
        $count = count($data);
        $pagination = new Pagination(['totalCount' => $count]);
        return $this->renderPartial('index',['data'=>$data,'tags'=>$tags,'pag'=>$pagination]);
    }

    /**
     * @return string
     * @desc 详情页
     */
    public function actionDetail()
    {
        $id = Yii::$app->request->get('id');
        $detail_data = ArticleDetail::find()->where(['id'=>$id])->asArray()->one();
        return $this->renderPartial('detail',['data'=>$detail_data]);
    }

    public function actionVisitRecord()
    {
        Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
        $ip = Yii::$app->request->userIP;
	$connection = Yii::$app->db;
	$sql = 'select max(num) as num from visit_record where 1';
	$id = $connection->createCommand($sql)->queryOne();
        $data = VisitRecord::findOne($id);
        $num = ($data->num) + 1;
        $model = new VisitRecord();
        $model->ip = $ip;
        $model->num = $num;
        $model->update_time = time();
        $model->save();
        return ['status'=>0,'msg'=>'','data'=>$num];
    }

}
