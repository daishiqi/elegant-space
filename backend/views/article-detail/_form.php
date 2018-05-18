<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ArticleDetail */
/* @var $form yii\widgets\ActiveForm */

?>
<script type="text/javascript" src="<?php echo Yii::$app->assetsUrl->scriptUrl;?>./common/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::$app->assetsUrl->scriptUrl;?>./common/js/layer/layer.js"></script>


<style type="text/css">
    div{
        width:100%;
    }
</style>
<div class="card-body card-padding">
    <?php $form = ActiveForm::begin([
        'id' => $model->formName(),
        'options' => [
            'class' => 'form-horizontal'
        ],
    ]);?>







        <div class="col-sm-12">
            <?= \yidashi\markdown\Markdown::widget(['name' => 'mark-down', 'language' => 'zh'])?>
    </div>
    <div class="col-sm-12">
        <div class="col-sm-6">
            <?= $form->field($model, 'cate_id',['options' => ['class' => 'select']])->dropDownList([$cate_data], ['prompt' => '请选择'])->label('请选择资讯分类') ?>
        </div>


    </div>
    <div class="col-sm-12"
    <div class="col-sm-6">
        <?= $form->field($model, 'title')->textInput()->label("文章资讯标题") ?>
    </div>
</div>
<div class="col-sm-12" >
    <div class="col-sm-6">

        <?= $form->field($model, 'tags')->textInput()->label("标签") ?></div>
</div>

<div class="col-sm-12" style="margin-top:5px">
    <?= Html::button('提交', ['class' => 'btn btn-primary submit']) ?>
</div>
<?php ActiveForm::end(); ?>
</div>


<script>

    $('.submit').click(function(){
        var cate_id = $('#articledetail-cate_id').val();
        var title = $('#articledetail-title').val();
        var tags = $('#articledetail-tags').val();
        var content = $('.md-input').val();
        if(
            cate_id == '' || cate_id == undefined ||
            title == '' || title == undefined ||
            tags == '' || tags == undefined ||
            content == '' || content == undefined
        ) {
            layer.msg('信息填写不全,请重新填写~');
            return false;
        }

        $.ajax({
            url :'/article-detail/save-article',
            data:{'cate_id':cate_id,'title':title,'tags':tags,'content':content},
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



