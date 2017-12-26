<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ArticleCate */

$this->title = $model->cate_name;
$this->params['breadcrumbs'][] = ['label' => 'Article Cates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-cate-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确认删除吗？',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            ['label'=>'序号','value'=>$model->id],
            ['label'=>'分类名称','value'=>$model->cate_name],
            ['label'=>'创建时间','value'=>date('Y-m-d H:i:s',$model->create_time)],
            ['label'=>'修改时间','value'=>date('Y-m-d H:i:s',$model->update_time)],
        ],
    ]) ?>

</div>
