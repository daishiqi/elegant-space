<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ArticleDetail */
/* @var $form yii\widgets\ActiveForm */

?>
<script type="text/javascript" src="<?php echo Yii::$app->assetsUrl->scriptUrl;?>./common/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::$app->assetsUrl->scriptUrl;?>./common/js/layer/layer.js"></script>
<script type="text/javascript" src="<?php echo Yii::$app->assetsUrl->scriptUrl;?>./lib/ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="<?php echo Yii::$app->assetsUrl->scriptUrl;?>./lib/ueditor/ueditor.all.js"></script>

<div class="card-body card-padding">
    <?php $form = ActiveForm::begin([
        'id' => $model->formName(),
        'options' => [
            'class' => 'form-horizontal'
        ],
    ]);?>

    <div class="col-sm-12" style="margin-top:5px;display: block">
        <?= Html::button('提交', ['class' => 'btn btn-primary submit']) ?>
    </div>
    <div class="col-sm-12">
        <div class="col-sm-6">
            <?= $form->field($model, 'cate_id',['options' => ['class' => 'select']])->dropDownList([$cate_data], ['prompt' => '请选择'])->label('请选择资讯分类') ?>
        </div>
    </div>
    <div class="col-sm-12">
    <div class="col-sm-6">
        <?= $form->field($model, 'title')->textInput()->label("文章资讯标题") ?>
    </div>
    </div>
    <div class="col-sm-12" >
    <div class="col-sm-6">
        <?= $form->field($model, 'tags')->textInput()->label("标签") ?>
    </div>
    </div>
    <div class=" col-sm-6">
        <div style="width: 800px;height: 400px; display: block">
            <!-- 加载编辑器的容器 -->
            <script id="container" name="content" type="text/plain">
    </script>
        </div>
    </div>

<?php ActiveForm::end(); ?>
</div>




<script>
    var ue = UE.getEditor('container');

    $('.submit').click(function(){
        var cate_id = $('#articledetail-cate_id').val();
        var title = $('#articledetail-title').val();
        var tags = $('#articledetail-tags').val();
        var content = ue.getContent();
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



