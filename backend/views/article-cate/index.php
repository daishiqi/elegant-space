<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ArticleCateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '分类管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-cate-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增分类', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            [
                'label'=>'序号',
                'filter' => false, //不显示搜索框
                'attribute' => 'id',
            ],
            [
                'label'=>'分类',
                'attribute' => 'cate_name',
            ],
            [
                'label'=>'创建时间',
                'attribute' => 'create_time',
                'filter' => false, //不显示搜索框
                'value' => function($data) {
                    return date('Y-m-d H:i:s',$data->create_time); }
            ],
            [
                'label'=>'修改时间',
                'attribute' => 'update_time',
                'filter' => false, //不显示搜索框
                'value' => function($data) {
                    return date('Y-m-d H:i:s',$data->create_time); }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => '操作',
            ],
        ],
    ]); ?>
</div>
