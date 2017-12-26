<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\markdown\MarkdownEditor;

/* @var $this yii\web\View */
/* @var $model backend\models\ArticleDetail */
/* @var $form yii\widgets\ActiveForm */

?>
<?php echo  Html::jsFile(Yii::$app->assetsUrl->scriptUrl.'/common/js/jquery-3.1.1.min.js') ?>
<?php echo  Html::jsFile(Yii::$app->assetsUrl->scriptUrl.'/common/js/layer/layer.js') ?>
<style>
    #articledetail-content {
        margin: 0 30px 0 30px;
        min-height:400px;
    }
</style>
<div class="card">
    <div class="card-body card-padding">
        <?php $form = ActiveForm::begin([
            'id' => $model->formName(),
            'options' => [
                'class' => 'form-horizontal'
            ],
        ]);?>
        <div class="col-sm-12">
            <div class="col-sm-6">
                <?php echo $form->field($model, 'cate_id')->widget(Select2::classname(), [
                    'data' => $cate_data,
                    'options' => ['placeholder' =>'请选择资讯分类'],
                ])->label('分类');?>
            </div>
        </div>
        <div class="col-sm-12" >
            <div class="col-sm-6">
                <?= $form->field($model, 'title')->textInput()->label("文章资讯标题") ?>
            </div>
        </div>
        <div class="col-sm-12" >
            <div class="col-sm-6">
                <?= $form->field($model, 'tags')->textInput()->label("标签") ?>
            </div>
        </div>
        <div class="field-goods-is_show">
            <div class=" goods"><label class="control-label"><span></span></label></div>
            <div id="goods-is_show" class="form-group">
               <?php
               echo MarkdownEditor::widget([
                   'model' => $model,
                   'attribute' => 'content',
               ]); ?>
            </div>
            <div class="help-block"></div>
        </div>
        <div class="form-group col-sm-12 text-center">
            <?= Html::button('提交', ['class' => 'btn btn-primary submit']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
<script>
    $('.submit').click(function(){
        var cate_name = $('#select2-articledetail-cate_id-container').html();
        var title = $('#articledetail-title').val();
        var tags = $('#articledetail-tags').val();
        var content = $('#articledetail-content').val();
        if(
            cate_name == '' || cate_name == undefined ||
            title == '' || title == undefined ||
            tags == '' || tags == undefined ||
            content == '' || content == undefined
        ) {
            layer.msg('信息填写不全,请重新填写~');
            return false;
        }

        $.ajax({
            url :'/article-detail/save-article',
            data:{'cate_name':cate_name,'title':title,'tags':tags,'content':content},
            type:'post',
            dataType:'json',
            success:function (res) {
                if(res.status==1) {
                    window.location.href = '/article-detail/index';
                }
                if(res.status==2) {
                    layer.msg(res.message);
                }
            }
        });
    });


</script>


