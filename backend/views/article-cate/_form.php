<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ArticleCate */
/* @var $form yii\widgets\ActiveForm */
$this->title = '文章分类管理';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="article-cate-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cate_name')->textInput(['maxlength' => true])->label('分类') ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '保存' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
