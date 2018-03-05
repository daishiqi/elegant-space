
<?php
use yii\widgets\ActiveForm;
use yiichina\mdeditor\MdEditor;
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="google-site-verification" content="-zz_UiN3Z6szo1tjCMg8H66_XeAH2-dL2KLimiLJ0Ak" />
    <meta name="author" content="DAISY">
    <meta name="keywords" content="博客,技术" />
    <meta name="description" conauthortent="这是我的博客。会记录平时遇到的技术问题~" />
    <link rel="alternative" href="" title="" type="application/atom+xml">
    <link rel="icon" href="">
    <title><?php echo $data['title']?></title>
    <link rel="stylesheet" href="<?php echo Yii::$app->assetsUrl->scriptUrl;?>/frontend/css/main.css" />
    <link rel="stylesheet" href="<?php echo Yii::$app->assetsUrl->scriptUrl;?>/frontend/js/fancybox/jquery.fancybox.min.css" />
       <script src="<?php echo Yii::$app->assetsUrl->scriptUrl;?>/frontend/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo Yii::$app->assetsUrl->scriptUrl;?>/frontend/js/fancybox/jquery.fancybox.min.js"></script>
</head>
<body style="opacity:0">
<header class="head">
    <h1 class="head-title u-fl"><a href="<?php echo \yii\helpers\Url::to(['/'])?>">DAISY</a></h1>
    <nav class="head-nav u-fr">
        <ul class="head-nav__list">
            <li class="head-nav__item"><a class="head-nav__link" href="/article-list/index">LIST</a></li>
        </ul>
    </nav>
</header>
<main class="main">
    <article class="post">
        <header class="post__head">
            <time class="post__time" datetime="<?php echo date('Y-m-d H:i:s',$data['create_time']);?>">June 1, 2017</time>
            <h1 class="post__title"><a href="#"><?php echo $data['title']?></a></h1>
            <div>
		<?php
                $parser = new \cebe\markdown\GithubMarkdown();
                echo $parser->parse($data['content']);?>
            </div>
        </header>
    </article>
    <section class="reward">
        <a class="btn-reward" href="#">打赏</a>
        <div class="reward-wrapper clearfix">
            <img src="<?php echo Yii::$app->assetsUrl->scriptUrl;?>/frontend/img/pay.jpg" title="微信" />
        </div>
    </section>
    <div class="comments" id="lv-container" data-id="city" data-uid="MTAyMC8yOTI0Ni81ODEz">
        <script>!function(e,t){var n,c=e.getElementsByTagName(t)[0];"function"!=typeof LivereTower&&(n=e.createElement(t),n.src="https://cdn-city.livere.com/js/embed.dist.js",n.async=!0,c.parentNode.insertBefore(n,c))}(document,"script")</script>
    </div>
</main>
<footer class="foot">
    <div class="foot-copy">
        © 2016-2017 Daisy
        <a href="#" target="view_window" style="color:#fff">蒙ICP备17001557号-1</a>
    </div>
</footer>
<script>!function(e,t,a,n,c,o){e.GoogleAnalyticsObject=n,e[n]||(e[n]=function(){(e[n].q=e[n].q||[]).push(arguments)}),e[n].l=+new Date,c=t.createElement(a),o=t.getElementsByTagName(a)[0],c.src="//www.google-analytics.com/analytics.js",o.parentNode.insertBefore(c,o)}(window,document,"script","ga"),ga("create","UA-73840162-1"),ga("send","pageview")</script>
<script src="<?php echo Yii::$app->assetsUrl->scriptUrl;?>/frontend/js/scroller.js"></script>
<script src="<?php echo Yii::$app->assetsUrl->scriptUrl;?>/frontend/js/main.js"></script>
</body>
</html>
