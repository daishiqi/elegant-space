<?php use yii\widgets\LinkPager;?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <link rel="alternative" href="/atom.xml" title="DAISY'S BLOG" type="application/atom+xml" />
    <link rel="icon" href="/favicon.png" />
    <title>DAISY'S BLOG</title>
    <link rel="stylesheet" href="<?php echo Yii::$app->assetsUrl->scriptUrl;?>/frontend/css/main.css" />
    <link rel="stylesheet" href="<?php echo Yii::$app->assetsUrl->scriptUrl;?>/frontend/js/fancybox/jquery.fancybox.min.css" />
    <!--[if lt IE 9]><script>(function(a,b){a="abbr article aside audio bdi canvas data datalist details dialog figcaption figure footer header hgroup main mark meter nav output progress section summary template time video".split(" ");for(b=a.length-1;b>=0;b--)document.createElement(a[b])})()</script><![endif]-->
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
    <?php foreach($data as $v) :?>
    <article class="post">

        <header class="post__head archive">
            <a href="<?php echo \yii\helpers\Url::to(['/article-list/detail','id'=>$v['id']])?>"><time class="post__time" datetime="<?php echo date('Y-m-d H:i:s',$v['create_time'])?>"><?php echo date('Y-m-d H:i:s',$v['create_time'])?></time></a>
            <h1 class="post__title archive"><a href="<?php echo \yii\helpers\Url::to(['/article-list/detail','id'=>$v['id']])?>"><?php echo $v['title']?></a></h1>
        </header>
        <!--<footer class="post__foot u-cf">
            <ul class="post__tag u-fl">
                <li class="post__tag__item"><a class="post__tag__link" href="/tags/mysql/">mysql</a></li>
                <li class="post__tag__item"><a class="post__tag__link" href="/tags/navicat/">navicat</a></li>
            </ul>
        </footer>-->

    </article>
    <?php endforeach;?>
</main>
<?php echo LinkPager::widget([
    'pagination' => $pag,
]);?>
<footer class="foot">
    <div class="foot-copy">
        &copy; 2016-2017 Daisy
        <a href="" target="view_window" style="color:#fff">蒙ICP备17001557号-1</a> &nbsp;| &nbsp;<a href="" id="count-guest" style="color:#fff"></a>
    </div>
</footer>
<script>!function(e,t,a,n,c,o){e.GoogleAnalyticsObject=n,e[n]||(e[n]=function(){(e[n].q=e[n].q||[]).push(arguments)}),e[n].l=+new Date,c=t.createElement(a),o=t.getElementsByTagName(a)[0],c.src="<?php echo Yii::$app->assetsUrl->scriptUrl;?>/frontend/js/analytics.js",o.parentNode.insertBefore(c,o)}(window,document,"script","ga"),ga("create","UA-73840162-1"),ga("send","pageview")</script>
<script src="<?php echo Yii::$app->assetsUrl->scriptUrl;?>/frontend/js/scroller.js"></script>
<script src="<?php echo Yii::$app->assetsUrl->scriptUrl;?>/frontend/js/main.js"></script>
</body>
</html>
<script type="text/javascript">
    var caution=false



    function setCookie(name,value,expires,path,domain,secure)
    {
        var curCookie=name+"="+escape(value) +
            ((expires)?";expires="+expires.toGMTString() : "") +
            ((path)?"; path=" + path : "") +
            ((domain)? "; domain=" + domain : "") +
            ((secure)?";secure" : "")
        if(!caution||(name + "=" + escape(value)).length <= 4000)
        {
            document.cookie = curCookie
        }
        else if(confirm("Cookie exceeds 4KB and will be cut!"))
        {
            document.cookie = curCookie
        }
    }
    function getCookie(name)
    {
        var prefix = name + "="
        var cookieStartIndex = document.cookie.indexOf(prefix)
        if (cookieStartIndex == -1)
        {
            return null
        }
        var cookieEndIndex=document.cookie.indexOf(";",cookieStartIndex+prefix.length)
        if(cookieEndIndex == -1)
        {
            cookieEndIndex = document.cookie.length
        }
        return unescape(document.cookie.substring(cookieStartIndex+prefix.length,cookieEndIndex))
    }
    function deleteCookie(name, path, domain)
    {
        if(getCookie(name))
        {
            document.cookie = name + "=" +
                ((path) ? "; path=" + path : "") +
                ((domain) ? "; domain=" + domain : "") +
                "; expires=Thu, 01-Jan-70 00:00:01 GMT"
        }
    }
    function fixDate(date)
    {
        var base=new Date(0)
        var skew=base.getTime()
        if(skew>0)
        {
            date.setTime(date.getTime()-skew)
        }
    }
    var now=new Date()
    fixDate(now)
    now.setTime(now.getTime()+365 * 24 * 60 * 60 * 1000)
    var visits = getCookie("counter")
    if(!visits)
    {
        visits=1;
    }
    else
    {
        visits=parseInt(visits)+1;
        $.ajax({
            url:'visit-record',
            type:'post',
            data:{'num':visits},
            success:function(res){
                if(res.status==0) {
                    $('#count-guest').html("您是本站第" + res.data + "位童鞋~")
                }
            }
        });

    }
    setCookie("counter", visits, now);

</script>
