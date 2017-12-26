<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ArticleDetail */

$this->title = 'Create Article Detail';
$this->params['breadcrumbs'][] = ['label' => 'Article Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'cate_data' =>$cate_data,
    ]) ?>

</div>
