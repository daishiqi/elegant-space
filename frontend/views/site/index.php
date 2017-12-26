<?php

/* @var $this yii\web\View */

$this->title = 'daisy';
?>
<!DOCTYPE html>
<html class="index" lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="google-site-verification" content="-zz_UiN3Z6szo1tjCMg8H66_XeAH2-dL2KLimiLJ0Ak" />
    <meta name="author" content="DAISY" />
    <meta name="keywords" content="博客,技术" />
    <meta name="description" conauthortent="这是我的博客。会记录平时遇到的技术问题~" />
    <link rel="alternative" href="/atom.xml" title="DAISY" type="application/atom+xml" />
    <link rel="icon" href="" />
    <title>DAISY'S BLOG</title>
    <link rel="stylesheet" href="<?php echo Yii::$app->assetsUrl->scriptUrl;?>/frontend/css/main.css" />
    <link rel="stylesheet" href="<?php echo Yii::$app->assetsUrl->scriptUrl;?>/frontend/js/fancybox/jquery.fancybox.min.css" />
    <!--[if lt IE 9]>
    <script>(function(a,b){a="abbr article aside audio bdi canvas data datalist details dialog figcaption figure footer header hgroup main mark meter nav output progress section summary template time video".split(" ");for(b=a.length-1;b>=0;b--)document.createElement(a[b])})()
    </script>
    <![endif]-->
    <script src="<?php echo Yii::$app->assetsUrl->scriptUrl;?>/frontend/js/jquery-3.1.1.min.js">
    </script>
    <script src="<?php echo Yii::$app->assetsUrl->scriptUrl;?>/frontend/js/fancybox/jquery.fancybox.min.js"></script>
</head>
<body>
<div class="hide" id="particles-oli-wrapper"></div>
<div class="index-wrapper">
    <header class="head index hide">
        <h1 class="head-title u-fl">DAISY</h1>
        <nav class="head-nav u-fr">
            <ul class="head-nav__list">
                <li class="head-nav__item">
                    <a class="head-nav__link" href="<?php echo \yii\helpers\Url::to(['article-list/index'])?>">LIST
                    </a>
                </li>
            </ul>
        </nav>
    </header>
</div>
<script src="<?php echo Yii::$app->assetsUrl->scriptUrl;?>/frontend/js/particles.min.js"></script>
<script src="<?php echo Yii::$app->assetsUrl->scriptUrl;?>/frontend/js/particles.oli.js"></script>
</body>
</html>
