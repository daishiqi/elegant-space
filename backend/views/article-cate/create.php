<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ArticleCate */

$this->title = 'Create Article Cate';
$this->params['breadcrumbs'][] = ['label' => 'Article Cates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-cate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
